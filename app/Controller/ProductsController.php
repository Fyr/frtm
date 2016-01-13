<?php
App::uses('AppController', 'Controller');
App::uses('AppModel', 'Model');
App::uses('PMFormData', 'Form.Model');
App::uses('Product', 'Model');
App::uses('Media', 'Media.Model');
App::uses('PHMediaHelper', 'Media.View/Helper');
App::uses('PHTimeHelper', 'Core.View/Helper');

class ProductsController extends AppController {
	public $name = 'Products';
	public $uses = array('Media.Media', 'CategoryProduct', 'Product', 'Form.PMFormData');
	public $components = array('Recaptcha.Recaptcha');
	public $helpers = array('Media.PHMedia', 'Core.PHTime', 'Recaptcha.Recaptcha');
	
	const PER_PAGE = 9;
	
	public function beforeFilter() {
		$this->objectType = $this->getObjectType();
		$this->set('objectType', $this->objectType);
		parent::beforeFilter();
	}

	public function index($catSlug = '') {
		$this->paginate = array(
			'conditions' => array('Product.published' => 1),
			'limit' => self::PER_PAGE, 
			'page' => $this->request->param('page'),
			'order' => array('Product.created' => 'DESC')
		);
		
		if ($filter = $this->request->query('filter')) {
			if (isset($filter['title']) && $filter['title']) {
				$this->paginate['conditions']['Product.title LIKE '] = '%'.$filter['title'].'%';
			}

			$cat_id = 0;
			if (isset($filter['cat_id']) && $cat_id = intval(trim($filter['cat_id']))) {
				$this->paginate['conditions']['Product.cat_id'] = $cat_id;
			}
			if (isset($filter['price_from']) && $filter['price_from']) {
				$this->paginate['conditions']['Product.price > '] = intval($filter['price_from']);
			}
			if (isset($filter['price_to']) && $filter['price_to']) {
				$this->paginate['conditions']['Product.price < '] = intval($filter['price_to']);
			}

			if ($cat_id) {
				foreach($this->aProductParams[$cat_id] as $field) {
					$fk_id = $field['PMFormField']['id'];
					$val = $this->request->query('data.PMFormData.fk_'.$fk_id);
					if ($field['PMFormField']['field_type'] == FieldTypes::INT) {
						$val = intval($val);
					} elseif ($field['PMFormField']['field_type'] == FieldTypes::FLOAT) {
						$val = floatval($val);
					}
					if ($val) {
						$this->paginate['conditions']['PMFormData.fk_'.$fk_id] = $val;
					}
				}
			}
		} elseif ($catSlug) {
			$this->paginate['conditions']['CategoryProduct.slug'] = $catSlug;
			$this->set('category', $this->CategoryProduct->findBySlug($catSlug));
		}
		$aProducts = $this->paginate('Product');
		if (!$aProducts) {
			return $this->redirect404();
		}
		
		$this->set('aProducts', $aProducts);
		$this->set('objectType', 'Product');
	}
	
	public function view($slug) {
		$article = $this->Product->findBySlug($slug);
		if (!$article) {
			return $this->redirect404();
		}
		$id = $article['Product']['id'];
		unset($article['Media']);
		$aMedia = $this->Media->getObjectList('Product', $id);
		if ($aMedia) {
			$article['Media'] = Hash::extract($aMedia, '{n}.Media');
		}
		$this->set('article', $article);
		$this->set('category', array('CategoryProduct' => $article['CategoryProduct']));

		if ($this->request->is(array('put', 'post'))) {
			$cat_id = $article['Product']['cat_id'];
			if ($cat_id) {
				$this->set('calcData', $this->PMFormData->postFormula($this->request->data, $this->aProductParams[$cat_id]));
			}

		}
	}
	
}

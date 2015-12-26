<?php
App::uses('AppController', 'Controller');
App::uses('AppModel', 'Model');
App::uses('Product', 'Model');
App::uses('Media', 'Media.Model');
App::uses('PHMediaHelper', 'Media.View/Helper');
App::uses('PHTimeHelper', 'Core.View/Helper');

class ProductsController extends AppController {
	public $name = 'Products';
	public $uses = array('Media.Media', 'CategoryProduct', 'Product');
	public $components = array('Recaptcha.Recaptcha');
	public $helpers = array('Media.PHMedia', 'Core.PHTime', 'Recaptcha.Recaptcha');
	
	const PER_PAGE = 3;
	
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
		
		if ($q = $this->request->query('q')) {
			$this->paginate['conditions']['Product.title LIKE '] = '%'.$q.'%';
		} elseif ($catSlug) {
			$this->paginate['conditions']['CategoryProduct.slug'] = $catSlug;
			$this->set('category', $this->CategoryProduct->findBySlug($catSlug));
		}
		$this->set('q', $q);
		
		
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

	}
	
}

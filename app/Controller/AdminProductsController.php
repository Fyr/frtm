<?php
App::uses('AdminController', 'Controller');
App::uses('Product', 'Model');
App::uses('FieldTypes', 'Form.Vendor');
class AdminProductsController extends AdminController {
	
    public $name = 'AdminProducts';
    public $components = array('Auth', 'Table.PCTableGrid', 'Article.PCArticle');
    public $uses = array('Product', 'Form.PMFormField', 'Form.PMFormData');
    public $helpers = array('ObjectType', 'Form.PHFormData');
    
    public function beforeRender() {
    	parent::beforeRender();
    	$this->set('objectType', $this->Product->objectType);
    }
    
    public function index() {
		$this->paginate = array(
			'Product' => array(
				'fields' => array('created', 'title', 'slug', 'price', 'featured'),
			)
		);
        $aRowset = $this->PCTableGrid->paginate('Product');
        $this->set('aRowset', $aRowset);
    }
    
	public function edit($id = 0) {
		if (!$id) {
			// выставляем типы для записей
			$this->request->data('Product.object_type', $this->Product->objectType);
			$this->request->data('Seo.object_type', $this->Product->objectType);
			$this->request->data('PMFormData.object_type', 'ProductParam');
		}
		
		$fields = $this->PMFormField->getObjectList('CategoryParam', '');
		
		$this->PCArticle->setModel('Product')->edit(&$id, &$lSaved);
		if ($lSaved) {
			$this->PMFormData->recalcFormula($this->PMFormData->id, $fields);
			$baseRoute = array('action' => 'index');
			return $this->redirect(($this->request->data('apply')) ? $baseRoute : array($id));
		}

		$this->set('form', $fields);
		$this->set('aCategoryOptions', $this->CategoryProduct->getObjectOptions('CategoryProduct'));

		if (!$id) {
			// выставляем значения по умолчанию
			$this->request->data('Product.status', array('published'));
			$this->request->data('Product.price', '0');
		}
	}
	
}

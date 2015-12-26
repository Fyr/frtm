<?php
App::uses('Controller', 'Controller');
App::uses('SiteRouter', 'Lib/Routing');
App::uses('AppModel', 'Model');
App::uses('Article', 'Article.Model');
App::uses('Media', 'Media.Model');
App::uses('CategoryProduct', 'Model');
App::uses('Settings', 'Model');
App::uses('SiteArticle', 'Model');
App::uses('Page', 'Model');
App::uses('Product', 'Model');

class AppController extends Controller {
	public $uses = array('Article.Article', 'Media.Media', 'CategoryProduct', 'Settings', 'SiteArticle', 'Page', 'Product');
	
	public $paginate;
	public $aNavBar = array(), $aBottomLinks = array(), $currMenu = '', $currLink = '', 
		$currCat, $pageTitle = '', $aBreadCrumbs = array(), $seo;
	
	public function __construct($request = null, $response = null) {
		$this->_beforeInit();
		parent::__construct($request, $response);
		$this->_afterInit();
	}
	
	protected function _beforeInit() {
	    $this->helpers = array_merge(array('Html', 'Form', 'Paginator', 'Media', 'ArticleVars'), $this->helpers);
	}

	protected function _afterInit() {
	    // after construct actions here
	}
	
	public function isAuthorized($user) {
    	$this->set('currUser', $user);
		return Hash::get($user, 'active');
	}
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->beforeFilterLayout();
	}
	
	protected function beforeFilterLayout() {
		$this->loadModel('Settings');
		$this->Settings->initData();
		
		$this->aNavBar = array(
			'Home' => array('label' => __('Home'), 'href' => array('controller' => 'Pages', 'action' => 'home')),
			'Articles' => array('label' => __('Articles'), 'href' => array('controller' => 'Articles', 'action' => 'index')),
			'Products' => array('label' => __('Products'), 'href' => '', 'submenu' => array()),
			'klientam' => array('label' => '', 'href' => array('controller' => 'Pages', 'action' => 'view', 'klientam')),
			'onas' => array('label' => '', 'href' => array('controller' => 'Pages', 'action' => 'view', 'onas')),
			'Contacts' => array('label' => __('Contacts'), 'href' => array('controller' => 'Contacts', 'action' => 'index')),
			// 'Sitemap' => array('label' => __('Site map'), 'href' => array('controller' => 'Sitemap', 'action' => 'index'))
		);
		$this->aBottomLinks = $this->aNavBar;
		
		$this->currMenu = $this->_getCurrMenu();
	    $this->currLink = $this->currMenu;
	    
	}
	
	protected function _getCurrMenu() {
		$curr_menu = strtolower(str_ireplace('Site', '', $this->request->controller)); // By default curr.menu is the same as controller name
		/*
		foreach($this->aNavBar as $currMenu => $item) {
			if (isset($item['submenu'])) {
				foreach($item['submenu'] as $_currMenu => $_item) {
					if (strtolower($_currMenu) === $curr_menu) {
						return $currMenu;
					}
				}
			}
		}
		*/
		return $curr_menu;
	}
	
	public function beforeRender() {
		$this->set('aNavBar', $this->aNavBar);
		$this->set('currMenu', $this->currMenu);
		$this->set('aBottomLinks', $this->aBottomLinks);
		$this->set('currLink', $this->currLink);
		$this->set('pageTitle', $this->pageTitle);
		$this->set('aBreadCrumbs', $this->aBreadCrumbs);
		
		$this->beforeRenderLayout();
	}
	
	protected function beforeRenderLayout() {
		$this->loadModel('CategoryProduct');
		// ??? на странице если явно не указать objectType - загружаются все статьи - BUG!!!
		$conditions = array('CategoryProduct.object_type' => 'CategoryProduct');
		$order = 'CategoryProduct.sorting ASC';
		$aCategories = $this->CategoryProduct->find('all', compact('conditions', 'order'));
		$this->set('aCategories', $aCategories);

		foreach ($aCategories as $article) {
			$url = SiteRouter::url($article);
			$this->aNavBar['Products']['submenu'][] = array('href' => $url, 'label' => $article['CategoryProduct']['title']);
		}

		$this->set('aSlider', $this->Media->getObjectList('Slider'));

		$this->loadModel('Page');
		$page = $this->Page->findBySlug('klientam');
		$this->aNavBar['klientam']['label'] = $page['Page']['title'];
		$page = $this->Page->findBySlug('onas');
		$this->aNavBar['onas']['label'] = $page['Page']['title'];

		$aFeatured = $this->Product->getRandomRows(3, array('object_type' => 'Product', 'published' => 1, 'featured' => 1));
		$this->set('aFeatured', $aFeatured);

		$this->set('aNavBar', $this->aNavBar);
		$this->set('seo', $this->seo);
		$this->set('currCat', $this->currCat);
	}
	
	protected function getObjectType() {
		$objectType = $this->request->param('objectType');
		return ($objectType && in_array($objectType, array('SiteArticle', 'News'))) ? $objectType : 'SiteArticle';
	}
	
		/**
	 * Sets flashing message
	 *
	 * @param str $msg
	 * @param str $type - must be 'success', 'error' or empty
	 */
	protected function setFlash($msg, $type = 'info') {
		$this->Session->setFlash($msg, 'default', array(), $type);
	}

	public function redirect404() {
		// return $this->redirect(array('controller' => 'pages', 'action' => 'notExists'), 404);
		throw new NotFoundException();
	}

}

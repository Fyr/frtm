<?php
App::uses('AppController', 'Controller');
class PagesController extends AppController {
	public $name = 'Pages';
	public $uses = array('Page', 'Product', 'News', 'Media.Media');
	public $helpers = array('ArticleVars', 'Core.PHTime');

	public function home() {
		// Welcome block
		$article = $this->Page->findBySlug('home');
		$this->set('home_article', $article);

		// Featured articles
		$conditions = array('SiteArticle.published' => 1, 'SiteArticle.featured' => 1);
		$order = 'SiteArticle.created DESC';
		$limit = 3;
		$aArticles = $this->SiteArticle->find('all', compact('conditions', 'order', 'limit'));
		$this->set('aArticles', $aArticles);

		// New products
		$conditions = array('Product.published' => 1); // , 'Media.main' => 1
		$order = 'Product.created DESC';
		$limit = 3;
		$aProducts = $this->Product->find('all', compact('conditions', 'order', 'limit'));
		$this->set('aProducts', $aProducts);

		$this->currMenu = 'Home';
	}
	
	public function view($slug) {
		$article = $this->Page->findBySlug($slug);
		if (!$article) {
			$this->redirect404();
			return;
		}
		$this->set('article', $article);
		$this->seo = $article['Seo'];
		$this->currMenu = $slug;
	}
}

<?
App::uses('Router', 'Cake/Routing');
class SiteRouter extends Router {

	static public function getObjectType($article) {
		list($objectType) = array_keys($article);
		return $objectType;
	}
	
	static public function url($article, $lFull = false) {
		$objectType = self::getObjectType($article);
		$aControllers = array(
			'SiteArticle' => 'Articles',
			'Product' => 'Products',
			'News' => 'News',
			'Page' => 'Pages'
		);
		$controller = (isset($aControllers[$objectType])) ? $aControllers[$objectType] : 'Articles';
		$url = array('controller' => $controller, 'action' => 'view');
		if ($slug = $article[$objectType]['slug']) {
			$url[] = $slug;
			// $url['ext'] = 'html';
			// $url['ext'] = 'html';
			// $url['objectType'] = $objectType;
			// $url[] = $slug.'.html';
			// $url['ext'] = 'html';
		} else {
			$url[] = $article[$objectType]['id'];
		}

		if ($objectType == 'Product') {
			fdebug($url);
		}

		return parent::url($url, $lFull);
	}
	
}
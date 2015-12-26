<?php
Router::parseExtensions('json', 'xml');

Router::connect('/', array('controller' => 'Pages', 'action' => 'home'));

Router::connect('/pages/view/:slug.html',
	array(
		'controller' => 'pages',
		'action' => 'view',
	),
	array(
		'pass' => array('slug')
	)
);

Router::connect('/articles', array(
	'controller' => 'Articles',
	'action' => 'index',
	'objectType' => 'SiteArticle',
),
	array('named' => array('page' => 1))
);
Router::connect('/articles/:slug',
	array(
		'controller' => 'Articles',
		'action' => 'view',
		'objectType' => 'SiteArticle'
	),
	array('pass' => array('slug'))
);
Router::connect('/articles/page/:page', array(
	'controller' => 'Articles',
	'action' => 'index',
	'objectType' => 'SiteArticle'
),
	array('named' => array('page' => '[\d]*'))
);
/*
Router::connect('/products',
	array(
		'controller' => 'Products',
		'action' => 'index',
		'objectType' => 'Product',
	),
	array('named' => array('page' => 1))
);
Router::connect('/products/:category',
	array(
		'controller' => 'Products',
		'action' => 'index',
		'objectType' => 'Product',
	),
	array('pass' => array('category'))
);
Router::connect('/products/page/:page',
	array(
		'controller' => 'Products',
		'action' => 'index',
		'objectType' => 'Product',
	),
	array('named' => array('page' => '[\d]*'))
);
Router::connect('/products/:category/page/:page',
	array(
		'controller' => 'Products',
		'action' => 'index',
		'objectType' => 'Product',
	),
	array(
		'pass' => array('category'),
		'named' => array('page' => '[\d]*')
	)
);
Router::connect('/products/:category/:slug',
	array(
		'controller' => 'Products',
		'action' => 'view',
		'objectType' => 'Product',
	),
	array('pass' => array('slug'))
);
*/

Router::connect('/products',
	array(
		'controller' => 'Products',
		'action' => 'index',
		'objectType' => 'Product',
	),
	array('named' => array('page' => 1))
);
Router::connect('/products/:category',
	array(
		'controller' => 'Products',
		'action' => 'index',
		'objectType' => 'Product',
	),
	array('pass' => array('category'))
);
Router::connect('/products/page/:page',
	array(
		'controller' => 'Products',
		'action' => 'index',
		'objectType' => 'Product',
	),
	array('named' => array('page' => '[\d]*'))
);
Router::connect('/products/:category/page/:page',
	array(
		'controller' => 'Products',
		'action' => 'index',
		'objectType' => 'Product',
	),
	array(
		'pass' => array('category'),
		'named' => array('page' => '[\d]*')
	)
);
Router::connect('/products/:category/:slug',
	array(
		'controller' => 'Products',
		'action' => 'view',
		'objectType' => 'Product',
	),
	array('pass' => array('slug'))
);


CakePlugin::routes();

require CAKE.'Config'.DS.'routes.php';

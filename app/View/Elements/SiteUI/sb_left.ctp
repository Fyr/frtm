<?
	echo $this->element('SiteUI/sb_block', array(
		'title' => 'Каталог',
		'content' => $this->element('SiteUI/categories')
	));

	echo $this->element('SiteUI/sb_block', array(
		'title' => 'Поиск',
		'content' => $this->element('SiteUI/search')
	));

	echo $this->element('SiteUI/sb_block', array(
		'title' => 'Особые предложения',
		'content' => $this->element('SiteUI/featured')
	));
?>

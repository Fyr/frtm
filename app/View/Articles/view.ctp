<?
	$objectType = $this->ArticleVars->getObjectType($article);
	// $title = $this->ObjectType->getTitle('view', $objectType);
	/*
	echo $this->element('bread_crumbs', array('aBreadCrumbs' => array(
		__('Home') => '/',
		$this->ObjectType->getTitle('index', $objectType) => array('controller' => 'Articles', 'action' => 'index'),
		$this->ObjectType->getTitle('view', $objectType) => ''
	)));
	*/
?>
<div class="casket">
	<?=$this->element('title', array('title' => $article[$objectType]['title']))?>
	<div class="carcass">
		<div class="adminText">
			<?=$this->ArticleVars->body($article)?>
		</div>
	</div>
</div>

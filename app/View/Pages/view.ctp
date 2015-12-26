<?
	$title = $article['Page']['title'];
	/*
	echo $this->element('bread_crumbs', array('aBreadCrumbs' => array(
		__('Home') => '/',
		$title => ''
	)));
	*/
?>
<div class="casket">
	<?=$this->element('title', array('title' => $title))?>
	<div class="carcass">
		<div class="adminText">
			<?=$this->ArticleVars->body($article)?>
		</div>
	</div>
</div>

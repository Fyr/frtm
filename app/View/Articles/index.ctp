<?
	$title = $this->ObjectType->getTitle('index', $objectType);/*
	echo $this->element('bread_crumbs', array('aBreadCrumbs' => array(
		__('Home') => '/',
		$title => ''
	)));
	*/
?>
<div class="casket">
	<?=$this->element('title', array('title' => $title))?>
	<div class="carcass">
<?
	foreach($aArticles as $article) {
		$this->ArticleVars->init($article, $url, $title, $teaser, $src, '400x');
?>
		<div class="articleItem">
<?
		if ($src) {
?>
			<a href="<?=$url?>"><img src="<?=$src?>" class="thumb"  alt="<?=$title?>" /></a>
<?
		}
?>

		<div class="description">
			<a href="<?=$url?>" class="title"><?=$title?></a>
			<div class="date">
				<span class="icon icon-date"></span>
				<span class="value"><?=$this->PHTime->niceShort($article['SiteArticle']['created'])?></span>
			</div>
			<div class="text"><?=$teaser?></div>
			<?=$this->element('more', compact('url'))?>
		</div>
	</div>
<?
	}
?>
	</div>
</div>
<?
echo $this->element('paginate');
?>
<div class="block">
	<?=$this->element('title', array('pageTitle' => $article['Page']['title']))?>
	<?=$this->ArticleVars->body($article)?>
</div>
<div class="block">
	<?=$this->element('title', array('pageTitle' => __('News')))?>
	<div class="news">
<?
	foreach($news as $article) {
		$this->ArticleVars->init($article, $url, $title, $teaser, $src, '200x');
?>
		<div class="newsItem">
<?
		if ($src) {
?>
			<a href="<?=$url?>"><img class="thumb" src="<?=$src?>" alt="<?=$title?>" /></a>
<?
		}
?>
			<div class="description">
				<a href="<?=$url?>" class="title"><?=$title?></a>
				<?=$teaser?>
				<?=$this->element('more', compact('url'))?>
			</div>
		</div>
<?
	}
?>
	</div>
</div>
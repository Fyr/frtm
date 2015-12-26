<div class="casket">
	<?=$this->element('title', array('title' => 'Новинки'))?>
	<div class="carcass">
		<ul class="catalog">
<?
	foreach($aProducts as $article) {
		$this->ArticleVars->init($article, $url, $title, $teaser, $src, 'thumb400x400');
?>
			<li>
				<a href="<?=$url?>" class="outerImg">
					<div class="title"><?=$title?></div>
					<img src="<?=$src?>" alt="<?=$title?>" class="img-responsive"/>
				</a>

				<div class="description ellipsis"><?=$teaser?></div>
				<?=$this->element('more', compact('url'))?>
			</li>
<?
	}
?>
		</ul>
	</div>
</div>

<div class="casket">
	<?=$this->element('title', array('title' => 'Полезные статьи'))?>
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

<div class="casket">
	<?=$this->element('title', array('title' => $home_article['Page']['title']))?>
	<div class="carcass">
		<div class="adminText">
			<?=$this->ArticleVars->body($home_article)?>
		</div>
	</div>
</div>
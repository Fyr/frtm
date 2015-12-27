<?
	$title = (isset($category) && $category) ? $category['CategoryProduct']['title'] : 'Каталог продукции';
	if ($this->request->query('filter')) {
		$title = 'Результаты поиска';
	}
?>
<div class="casket">
	<?=$this->element('title', array('title' => $title))?>
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
<?
	echo $this->element('paginate');
?>
	</div>
</div>
<?
	if (isset($category) && $category) {
		echo $this->ArticleVars->body($category);
	}
?>

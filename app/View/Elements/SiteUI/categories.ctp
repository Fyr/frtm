<ul class="rubrikator">
<?
	foreach($aCategories as $article) {
		$url = SiteRouter::url($article);
		$title = $article['CategoryProduct']['title'];
		$active = (isset($category) && $category['CategoryProduct']['id'] == $article['CategoryProduct']['id']) ? ' class="active"' : '';
?>
	<li<?=$active?>>
		<span class="icon icon-point-vinous"></span>
		<?=$this->Html->link($title, $url)?>
	</li>
<?
	}
?>
</ul>
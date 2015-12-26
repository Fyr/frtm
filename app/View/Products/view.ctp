<?
	$this->Html->css('jquery.fancybox', array('inline' => false));
	$this->Html->script('vendor/jquery/jquery.fancybox.pack', array('inline' => false));
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
	<?=$this->element('title', array('title' => $article['Product']['title']))?>
	<div class="carcass">
		<div class="adminText">
			<?=$this->ArticleVars->body($article)?>
		</div>
		<div class="gallery">
<?
	if (isset($article['Media']) && $article['Media']) {
		foreach($article['Media'] as $media) {
			$src = $this->Media->imageUrl(array('Media' => $media), '400x'); // $this->Media->imageUrl($media['object_type'], $media['id'], '400x', $media['file'].$media['ext'].'.png');
			$orig = $this->Media->imageUrl(array('Media' => $media), 'noresize'); // $this->Media->imageUrl($media['object_type'], $media['id'], 'noresize', $media['file'].$media['ext'].'.png');
?>
			<div class="image" style="text-align:center">
				<a class="fancybox" href="<?=$orig?>" rel="photoalobum"><img alt="" src="<?=$src?>" /></a>
			</div>
<?
		}
	}
?>
		</div>
	</div>
</div>

<script type="text/javascript">
$(function(){
	$('.fancybox').fancybox({
		padding: 5
	});
});
</script>
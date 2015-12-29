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
			$src = $this->Media->imageUrl(array('Media' => $media), 'thumb400x400'); // $this->Media->imageUrl($media['object_type'], $media['id'], '400x', $media['file'].$media['ext'].'.png');
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

<?
	$cat_id = $article['Product']['cat_id'];
	if (isset($aProductParams[$cat_id])) {
		$form = $aProductParams[$cat_id];
		$data = $this->request->data('PMFormData');
		if (!$data) {
			$data = $article['PMFormData'];
		}
?>
<div class="casket">
	<?=$this->element('title', array('title' => 'Онлайн-калькулятор для изделия'))?>
	<div class="carcass">
		<a name="calc"></a>
		<form action="#calc" method="post">
		<table width="100%">
			<tr>
				<td width="50%" valign="top"><?=$this->PHFormData->render($form, $data)?></td>
				<td valign="top">
<?
		foreach($form as $_form) {
			$fk_id = 'fk_'.$_form['PMFormField']['id'];
			if ($_form['PMFormField']['field_type'] == FieldTypes::FORMULA && $_form['PMFormField']['for_calc']) {
				$val = (isset($calcData)) ? $calcData['PMFormData'][$fk_id] : $article['PMFormData'][$fk_id];
				echo $_form['PMFormField']['label'].': '.$val.'<br />';
			}
		}
?>
				</td>
			</tr>
		</table>

		<div class="outerBtn">
			<input type="submit" value="Рассчитать" class="styler gradient" />
		</div>
		</form>
	</div>
</div>
<?
	}
?>

<script type="text/javascript">
$(function(){
	$('.fancybox').fancybox({
		padding: 5
	});
});
</script>
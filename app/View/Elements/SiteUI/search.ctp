<form action="<?=Router::url(array('controller' => 'Products', 'action' => 'index'))?>" method="get">
	<?//$this->Form->input('title', array('class' => 'style', 'placeholder' => 'Введите название...', 'style' => 'width: 100%'))?>
	<label>Название:</label>
	<input type="text" class="styler" name="filter[title]" value="<?=$this->request->query('filter.title')?>" style="width: 100%" placeholder="Введите название..." />
	<hr />
	<label>Диапазон цен:</label>
	<span class="small">от</span>
	<input class="styler from" type="text" name="filter[price_from]" value="<?=$this->request->query('filter.price_from')?>">
	<span class="small">до</span>
	<input class="styler until" type="text" name="filter[price_to]" value="<?=$this->request->query('filter.price_to')?>">
	<hr>
<?
	$categories = Hash::combine($aCategories, '{n}.CategoryProduct.id', '{n}.CategoryProduct.title');
	$arr = array_reverse($categories, true);
	$arr[' '] = ' - любая категория - ';
	$categories = array_reverse($arr, true);
	echo $this->Form->input('cat_id', array(
			'name' => 'filter[cat_id]',
			'value' => $this->request->query('filter.cat_id'),
			'options' => $categories,
			'label' => 'Категория',
			'autocomplete' => 'off')
	);
?>
	<hr />
	<div align="center">
		<b>Доп.условия поиска по категории</b>
	</div>
<?
	$data = $this->request->query('data.PMFormData');
	if (!$data) {
		$data = array();
	}
	foreach($aProductParams as $cat_id => $_form) {
?>
		<div id="form_<?=$cat_id?>" class="paramForms">
			<?=$this->PHFormData->render($_form, $data)?>
		</div>
<?
	}
?>
	<div class="outerBtn">
		<input type="submit" value="Подобрать" class="styler gradient" />
	</div>
</form>
<script type="text/javascript">
	$(function(){
		$('#cat_id').change(function(){
			$('.paramForms').hide();
			$('#form_' + $(this).val()).show();
		});
		$('#cat_id').change();
	});
</script>

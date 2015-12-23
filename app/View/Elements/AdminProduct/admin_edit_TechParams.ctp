<?
	$forms = Hash::combine($form, '{n}.PMFormField.id', '{n}', '{n}.PMFormField.object_id');
?>
	<table border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="50%" valign="top">
<?
	foreach($forms as $cat_id => $_form) {
?>
		<div id="form_<?= $cat_id ?>" class="paramForms">
			<?= $this->PHFormData->render($_form, $this->request->data('PMFormData')) ?>
		</div>
<?
	}
?>
		</td>
		<td valign="top" style="padding-left: 20px;">
<?
	foreach($form as $_form) {
		if ($_form['PMFormField']['field_type'] == FieldTypes::FORMULA) {
			$val = $this->request->data('PMFormData.fk_'.$_form['PMFormField']['id']);
			echo $_form['PMFormField']['label'].': '.$val.'<br />';
		}
	}
?>
		</td>
	</tr>
	</table>
<script type="text/javascript">
$(function(){
	$('#ProductCatId').change(function(){
		$('.paramForms').hide();
		$('#form_' + $(this).val()).show();
	});
	$('#ProductCatId').change();
});
</script>

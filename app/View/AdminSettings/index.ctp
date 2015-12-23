<?=$this->element('admin_title', array('title' => 'Настройки: '.__(ucfirst($tpl))))?>
<div class="span8 offset2">
<?
	echo $this->PHForm->create('Settings');
	echo $this->element('admin_content');
	echo $this->element('AdminSettings/'.$tpl);
	echo $this->element('admin_content_end');
	echo $this->element('Form.btn_save');
	echo $this->PHForm->end();
?>
</div>
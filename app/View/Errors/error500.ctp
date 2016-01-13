<?php
/**

?>
<h2>#<?php echo $name; ?></h2>
<p class="error">
	<strong><?php echo __d('cake', 'Error'); ?>: </strong>
	<?php echo __d('cake', 'An Internal Error Has Occurred.'); ?>
</p>
<?php
if (Configure::read('debug') > 0):
	echo $this->element('exception_stack_trace');
endif;
 */
?>
<div class="casket">
	<?=$this->element('title', array('title' => __('Page not found')));?>
	<div class="carcass" style="margin-top: 20px">
		<p><b>Внимание!</b> По вашему запросу произошла ошибка сервера.<br />
			Наши специалисты уже занимаются ей, в ближайее время ошибка будет исправлена.<br />
			<br />
			<a href="/">На главную</a>
		</p>
	</div>
</div>

<ul class="menu menuDesktop">
<?
	foreach($aNavBar as $id => $item) {
		$active = (strtolower($id) == strtolower($currMenu)) ? ' class="active"' : '';
		$url = ($item['href']) ? Router::url($item['href']) : 'javascript:void(0)';
?>
	<li<?=$active?>>
		<?=$this->Html->link($item['label'], $url)?>
<?
		if (isset($item['submenu'])) {
?>
			<ul style="display: none">
<?
			foreach ($item['submenu'] as $_item) {
?>
					<li>
						<span class="icon icon-point-vinous"></span>
						<?= $this->Html->link($_item['label'], $_item['href']) ?>
					</li>
<?
			}
?>
			</ul>
<?
		}
?>
	</li>
<?
	}
?>
</ul>
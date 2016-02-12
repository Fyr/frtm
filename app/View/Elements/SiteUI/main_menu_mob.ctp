<ul class="menu menuMobile">
	<li>
		<a href="javascript:;">Меню</a>
		<ul style="display: none">
<?
	$aMenu = array(
		'Главная' => '/',
		'Статьи' => array('controller' => 'Articles'),
		'Каталог' => array('controller' => 'Products'),
		'Клиентам' => array('controller' => 'Pages', 'action' => 'view', 'klientam'),
		'О нас' => array('controller' => 'Pages', 'action' => 'view', 'onas'),
		'Контакты' => array('controller' => 'Contacts', 'action' => 'index')
	);
	foreach($aMenu as $title => $url) {
		echo $this->Html->tag('li', $this->Html->link($title, $url));
	}
?>
		</ul>
	</li>
</ul>
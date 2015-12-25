<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, user-scalable=no, maximum-scale=1.0, initial-scale=1.0, minimum-scale=1.0">
<?
	echo $this->Html->charset();
	echo $this->element('Seo.seo_info', array('data' => $seo));
	echo $this->Html->meta('icon');

	echo $this->Html->css(array('style', 'owl.carousel', 'owl.theme', 'jquery.formstyler', 'extra'));

	$aScripts = array(
		'vendor/jquery/jquery-1.10.2.min',
		'vendor/jquery/jquery.formstyler.min',
		'vendor/jquery/jquery.dotdotdot.min',
		'vendor/owl.carousel.min',
		'rego_custom'
	);
	echo $this->Html->script($aScripts);

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
?>
<!--[if gte IE 9]>
<style type="text/css">
	.gradient { filter: none; }
</style>
<![endif]-->
</head>
<body>
<div class="header">
	<div class="wrapper clearfix">
		<a href="#" class="logo"></a>
		<ul class="menu menuMobile">
			<li>
				<a href="javascript: void(0)">Меню</a>
				<ul style="display: none">
					<li><a href="javascript: void(0)">Главная</a></li>
					<li><a href="javascript: void(0)">Статьи</a></li>
					<li><a href="javascript: void(0)">Каталог</a></li>
					<li><a href="javascript: void(0)">Клиентам</a></li>
					<li><a href="javascript: void(0)">О нас</a></li>
					<li><a href="javascript: void(0)">Контакты</a></li>
				</ul>
			</li>
		</ul>
		<div class="info">

			<div class="address">
						<span class="round">
							<span class="icon icon-map-brown"></span>
							<i class="vert"></i>
						</span>
						<span class="text">
						Беларусь, Брестская обл., Брестул, Героев  Обороны Брестской Крепости, д. 48-62 п.2224018</span>
			</div>
			<div class="contacts">
				<div class="phone">
							<span class="round">
								<span class="icon icon-phone-brown"></span>
								<i class="vert"></i>
							</span>
					<span class="text">+37529527-74-33<br />+37529527-74-33</span>
				</div>
				<div class="email">
							<span class="round">
								<span class="icon icon-email-brown"></span>
								<i class="vert"></i>
							</span>
					<span class="text">formetrum@mail.ru</span>
				</div>
			</div>

		</div>
	</div>
</div>
<div class="outerMenu">
	<div class="wrapper">
		<?=$this->element('SiteUI/main_menu')?>
	</div>
</div>

<div class="wrapper clearfix">
	<div id="owl-carousel" class="owl-carousel">
<?
	if (isset($aSlider)) {
		foreach($aSlider as $media) {
?>
		<div class="item"><img class="lazyOwl" data-src="<?=$this->Media->imageUrl($media, 'thumb1200x350')?>" alt="" /></div>
<?
		}
	}
?>
	</div>
</div>

<div class="wrapper back clearfix">

	<div class="leftSidebar">
		<?=$this->element('SiteUI/sb_left')?>
	</div>

	<div class="mainContent">

		<div class="breadcrumps">
			<a href="javascript: void(0)">Главная</a>
			<span>Ограды для могил</span>
		</div>

		<div class="casket">
			<div class="head">
				<span class="icon icon-uzorL"></span>
				<span class="text">Новинки</span>
				<span class="icon icon-uzorR"></span>
			</div>
			<div class="carcass">
				<ul class="catalog">
					<li>
						<a href="javascript: void(0)" class="outerImg">
							<div class="title">Комплект памятника №12 (дополнительное описан.)</div>
							<img src="/img/temp/temp4.jpg" alt="" class="img-responsive" />
						</a>
						<div class="description ellipsis">Vel sem aliquam proin sit ut erat etiam, duis condimentum hendrerit nisl risus erat, congue. Vel sem aliquam proin sit ut erat etiam, duis condimentum hendrerit nisl risus erat, congue condimentum hendrerit nislrisus erat.
						</div>
						<div class="more">
							<a href="javascript: void(0)">Подробнее</a>
						</div>
					</li>
					<li>
						<a href="javascript: void(0)" class="outerImg">
							<div class="title">Комплект памятника №12 (дополнительное описан.)</div>
							<img src="/img/temp/temp4.jpg" alt="" class="img-responsive" />
						</a>
						<div class="description ellipsis">Vel sem aliquam proin sit </div>
						<div class="more">
							<a href="javascript: void(0)">Подробнее</a>
						</div>
					</li>
					<li>
						<a href="javascript: void(0)" class="outerImg">
							<div class="title">Комплект памятника №12 (дополнительное описан.)</div>
							<img src="/img/temp/temp4.jpg" alt="" class="img-responsive" />
						</a>
						<div class="description ellipsis">Vel sem aliquam proin sit  Vel sem aliquam proin sit  Vel sem aliquam proin sit</div>
						<div class="more">
							<a href="javascript: void(0)">Подробнее</a>
						</div>
					</li>
				</ul>
			</div>
		</div>

		<div class="casket">
			<div class="head">
				<span class="icon icon-uzorL"></span>
				<span class="text">Полезные статьи</span>
				<span class="icon icon-uzorR"></span>
			</div>
			<div class="carcass">
				<div class="articleItem">
					<a href="javascript: void(0)"><img src="./img/temp/temp3.jpg" class="thumb"  alt="" /></a>
					<div class="description">
						<a href="javascript: void(0)" class="title">Изготовление памятников из гранита. Граверные работы</a>
						<div class="date">
							<span class="icon icon-date"></span>
							<span class="value">25.12.2015</span>
						</div>
						<div class="text">Dolor varius senectus fames a sociosqu, lacus imperdiet hac dictum sit, auctor convallis enim venenatis suspendisse ornare taciti mollis litora facilisis euismod semper vitae litora viverra aenean lacinia. Dolor varius senectus fames a sociosqu, lacus imperdiet hac dictum sit, auctor convallis enim venenatis suspendisse ornare taciti</div>
						<div class="more">
							<a href="javascript: void(0)">Подробнее</a>
						</div>
					</div>
				</div>
				<div class="articleItem">
					<a href="javascript: void(0)"><img src="./img/temp/temp1.jpg" class="thumb"  alt="" /></a>
					<div class="description">
						<a href="javascript: void(0)" class="title">Изготовление памятников из гранита. Граверные работы</a>
						<div class="date">
							<span class="icon icon-date"></span>
							<span class="value">25.12.2015</span>
						</div>
						<div class="text">Dolor varius senectus fames a sociosqu, lacus imperdiet hac dictum sit, auctor convallis enim venenatis suspendisse ornare taciti mollis litora facilisis euismod semper vitae litora viverra aenean lacinia. Dolor varius senectus fames a sociosqu, lacus imperdiet hac dictum sit, auctor convallis enim venenatis suspendisse ornare taciti</div>
						<div class="more">
							<a href="javascript: void(0)">Подробнее</a>
						</div>
					</div>
				</div>
				<div class="articleItem">
					<a href="javascript: void(0)"><img src="./img/temp/temp2.jpg" class="thumb"  alt="" /></a>
					<div class="description">
						<a href="javascript: void(0)" class="title">Изготовление памятников из гранита. Граверные работы</a>
						<div class="date">
							<span class="icon icon-date"></span>
							<span class="value">25.12.2015</span>
						</div>
						<div class="text">Dolor varius senectus fames a sociosqu, lacus imperdiet hac dictum sit, auctor convallis enim venenatis suspendisse ornare taciti mollis litora facilisis euismod semper vitae litora viverra aenean lacinia. Dolor varius senectus fames a sociosqu, lacus imperdiet hac dictum sit, auctor convallis enim venenatis suspendisse ornare taciti</div>
						<div class="more">
							<a href="javascript: void(0)">Подробнее</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="casket">
			<div class="head">
				<span class="icon icon-uzorL"></span>
						<span class="text">Изготовление памятников из гранита. Граверные работы
Изготовление памятников из гранита</span>
				<span class="icon icon-uzorR"></span>
			</div>
			<div class="carcass">
				<div class="adminText">
					<p>Lorem ipsum blandit sollicitudin mi commodo habitant aliquam curae aliquam, elit donec ligula suscipit nec donec euismod fringilla, tellus rutrum proin dictum platea vulputate non accumsan feugiat nisl urna sapien tellus integer fames suscipit, adipiscing euismod malesuada elementum litora luctus sit.</p>
					<img src="/img/temp/temp3.jpg" alt="" style="float:left" />
					<h1>Изготовление памятников из гранита. Граверные работы. Изготовление памятников из гранита. Граверные работы.</h1>
					<p>Lorem ipsum <a href="javascript: void(0)">blandit sollicitudin</a> mi commodo habitant aliquam curae aliquam, elit donec ligula suscipit nec donec euismod fringilla, tellus rutrum proin dictum platea vulputate non accumsan feugiat nisl urna sapien tellus integer fames suscipit, adipiscing euismod malesuada elementum litora luctus sit.</p>
					<h2>Изготовление памятников из гранита. Граверные работы. Изготовление памятников из гранита. Граверные работы.</h2>
					<ul>
						<li>dictumst himenaeos et cras, dapibus faucibus scelerisque aptent ut ligula;</li>
						<li>dictumst himenaeos et cras, dapibus faucibus scelerisque aptent ut ligula;</li>
						<li>dictumst himenaeos et cras, dapibus faucibus scelerisque aptent ut ligula;</li>
						<li>dictumst himenaeos et cras, dapibus faucibus scelerisque aptent ut ligula;</li>
						<li>dictumst himenaeos et cras, dapibus faucibus scelerisque aptent ut ligula;</li>
						<li>dictumst himenaeos et cras, dapibus faucibus scelerisque aptent ut ligula;</li>
					</ul>
					<p>Lorem ipsum <a href="javascript: void(0)">blandit sollicitudin</a> mi commodo habitant aliquam curae aliquam, elit donec ligula suscipit nec donec euismod fringilla, tellus rutrum proin dictum platea vulputate non accumsan feugiat nisl urna sapien tellus integer fames suscipit, adipiscing euismod malesuada elementum litora luctus sit.</p>
					<p>Lorem ipsum blandit sollicitudin mi commodo habitant aliquam curae aliquam, elit donec ligula suscipit nec donec euismod fringilla, tellus rutrum proin dictum platea vulputate non accumsan feugiat nisl urna sapien tellus integer fames suscipit, adipiscing euismod malesuada elementum litora luctus sit.</p>
					<img src="/img/temp/temp3.jpg" alt="" style="float:right" />
					<h1>Изготовление памятников из гранита. Граверные работы. Изготовление памятников из гранита. Граверные работы.</h1>
					<p>Lorem ipsum <a href="javascript: void(0)">blandit sollicitudin</a> mi commodo habitant aliquam curae aliquam, elit donec ligula suscipit nec donec euismod fringilla, tellus rutrum proin dictum platea vulputate non accumsan feugiat nisl urna sapien tellus integer fames suscipit, adipiscing euismod malesuada elementum litora luctus sit.</p>
					<h2>Изготовление памятников из гранита. Граверные работы. Изготовление памятников из гранита. Граверные работы.</h2>
					<img src="/img/temp/temp2.jpg" alt="" />
				</div>
			</div>
		</div>

	</div>

</div>


<div class="footer">
	<div class="wrapper clearfix">
		<a href="javascript: void(0)" class="logo"></a>
		<ul class="menu clearfix">
			<li class="active"><span class="icon icon-point-grey"></span><a href="#">Главная</a></li>
			<li><span class="icon icon-point-grey"></span><a href="#">Каталог</a></li>
			<li><span class="icon icon-point-grey"></span><a href="#">О нас</a></li>
			<li><span class="icon icon-point-grey"></span><a href="#">Статьи</a></li>
			<li><span class="icon icon-point-grey"></span><a href="#">Клиентам</a></li>
			<li><span class="icon icon-point-grey"></span><a href="#">Контакты</a></li>
		</ul>
		<div class="info">
			<div class="address">
				<span class="icon icon-map-grey"></span>
				<span class="text">Беларусь, Брестская обл., Брестул, Героев  Обороны Брестской Крепости, д. 48-62 п.2224018</span>
			</div>
			<div class="contacts">
				<div class="phone">
					<span class="icon icon-phone-grey"></span>
					<span class="text">+37529527-74-33<br>+37529527-74-33</span>
				</div>
				<div class="email">
					<span class="icon icon-email-grey"></span>
					<span class="text">formetrum@mail.ru</span>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="copyright">
	<div class="wrapper">© Copyright 2014 – 2015 “Фор Метрум”</div>
</div>
</body>
</html>

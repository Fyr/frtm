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
		<a href="/" class="logo"></a>
		<?=$this->element('SiteUI/main_menu_mob')?>
		<div class="info">

			<div class="address">
						<span class="round">
							<span class="icon icon-map-brown"></span>
							<i class="vert"></i>
						</span>
						<span class="text"><?=Configure::read('Settings.office_address')?></span>
			</div>
			<div class="contacts">
				<div class="phone">
					<span class="round">
						<span class="icon icon-phone-brown"></span>
						<i class="vert"></i>
					</span>
					<span class="text"><?=Configure::read('Settings.phone1')?><br /><?=Configure::read('Settings.phone2')?></span>
				</div>
				<div class="email">
					<span class="round">
						<span class="icon icon-email-brown"></span>
						<i class="vert"></i>
					</span>
					<span class="text"><a href="mailto:<?=Configure::read('Settings.admin_email')?>"><?=Configure::read('Settings.admin_email')?></a></span>
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
		<?=$this->fetch('content')?>
	</div>

</div>


<div class="footer">
	<div class="wrapper clearfix">
		<a href="/" class="logo"></a>
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
				<span class="text"><?=Configure::read('Settings.office_address')?></span>
			</div>
			<div class="contacts">
				<div class="phone">
					<span class="icon icon-phone-grey"></span>
					<span class="text"><?=Configure::read('Settings.phone1')?><br /><?=Configure::read('Settings.phone2')?></span>
				</div>
				<div class="email">
					<span class="icon icon-email-grey"></span>
					<span class="text"><a href="mailto:<?=Configure::read('Settings.admin_email')?>"><?=Configure::read('Settings.admin_email')?></a></span>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="copyright">
	<div class="wrapper">© Copyright <?=date('Y')?> “Фор Метрум”</div>
</div>
<?
	if (!TEST_ENV) {
?>
		<!-- BEGIN JIVOSITE CODE {literal} -->
		<script type='text/javascript'>
			(function(){ var widget_id = '2SvdxDg6iv';
				var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();</script>
		<!-- {/literal} END JIVOSITE CODE -->

		<!-- Yandex.Metrika counter --> <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter35856870 = new Ya.Metrika({ id:35856870, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, trackHash:true, ecommerce:"dataLayer" }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");
		</script> <noscript><div><img src="https://mc.yandex.ru/watch/35856870" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->

<?
	}
?>
<?//$this->element('sql_dump')?>
</body>
</html>

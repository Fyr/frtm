<div class="casket">
	<?=$this->element('title', array('title' => $article['Page']['title']))?>
	<div class="carcass">
		<div class="adminText">
			<?=$this->ArticleVars->body($article)?>
		</div>
	</div>
</div>

<div class="casket">
	<?=$this->element('title', array('title' => 'Отправить сообщение'))?>
	<div class="carcass">
<?
	echo $this->Form->create('Contact');
	echo $this->Form->input('Contact.username', array('label' => array('text' => 'Ваше имя')));
	echo $this->Form->input('Contact.email', array('label' => array('text' => 'Ваш e-mail для обратной связи')));
	echo $this->Form->input('Contact.body', array('type' => 'textarea', 'label' => array('text' => __('Your message'))));
	echo $this->Form->label(__('Spam protection'));
	echo $this->element('recaptcha');
	echo $this->Form->submit(__('Send'));
	echo $this->Form->end();
?>
	</div>
</div>
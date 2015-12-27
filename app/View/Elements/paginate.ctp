<?
	// fdebug($this->request->param('objectType').'!'.$this->request->param('category'));
	if ($this->Paginator->numbers()) {
		$this->Paginator->options(array('url' => array(
			'objectType' => $this->request->param('objectType'),
			'category' => $this->request->param('category'),
			'?' => $this->request->query
		)));
?>
<div class="pagination">
	Страницы: <?=$this->Paginator->numbers(array('separator' => ' '))?>
</div>
<?
	}
?>
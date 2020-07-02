<?php
namespace project\template;
use Rain\Tpl;

class Page{

	private $tpl;
	private $options = [];
	private $default = [
		'header' => true,
		'footer' => true,
		'data' => []
	];

	public function __construct($opt = array(),$dir = "/anne_doces/application/project/view/")
	{
		$this->options = array_merge($this->default , $opt);
		$config = array(
			'tpl_dir' => $_SERVER['DOCUMENT_ROOT'] . $dir ,
			'cache_dir' => $_SERVER['DOCUMENT_ROOT'] . '/anne_doces/view-cache/',
			'debug' => true
		);
		Tpl::configure($config);
		$this->tpl = new Tpl();
		$this->setData($this->options['data']);
		if($this->options['header'])$this->tpl->draw('header');
	}
	
	public function setTpl($name='',$data=array())
	{
		$this->setData($data);
		//$this->tpl->assign($var,$data);
		$this->tpl->draw($name);
	}

	public function setData($data = array())
	{
		foreach ($data as $key => $value) {
			$this->tpl->assign($key,$value);
		}
	}

	public function __destruct()
	{
		if($this->options['footer'])$this->tpl->draw("footer");
	}

}
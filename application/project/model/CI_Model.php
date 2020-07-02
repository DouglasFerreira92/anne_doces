<?php
namespace project\model;

class CI_Model{

	private $values = [];

	public function __call($nome,$args)
	{
		$method = substr($nome,0,3);
		$prop = substr($nome,3,strlen($nome));

		switch ($method) {
			case 'set':
				$this->values[$prop] = $args;
				break;
			
			case 'get':
				return $this->values[$prop];
				break;
		}

	}

	public function setData($data)
	{
		foreach ($data as $key => $value) {
			$this->{'set'.$key}($value);
		}
	}

	public function getValues()
	{
		return $this->values;
	}

}

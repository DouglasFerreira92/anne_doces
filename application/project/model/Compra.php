<?php
namespace project\model;
use project\DB\Sql;

class Compra extends CI_Model{
	
	public function compraInsert()
	{
		$sql = new Sql();

		$comp = $sql->select("CALL sp_save_compra(:desc, :desqtn , :desvalor , :fidclient)",array(
			":desc" => implode($this->getdescricao()),
			":desqtn" => implode($this->getdesqtn()),
			":desvalor" => implode($this->getdesvalor()),
			":fidclient" => implode($this->getfidclient())
		));

		//$this->setData($comp);

		return $comp;
	}

}

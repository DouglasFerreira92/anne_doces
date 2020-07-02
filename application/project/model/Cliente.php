<?php
namespace project\model;
use project\DB\Sql;

class Cliente extends CI_Model{

	public static function clientSearch($id)
	{
		$sql = new Sql();
		$cliente = $sql->select("SELECT * from tb_client left outer join tb_ender on fidender = idender  where idclient = :ID ",array(":ID" => $id));
		return $cliente ;
	}



}
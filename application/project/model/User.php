<?php
namespace project\model;
use project\DB\Sql;

class User extends CI_Model{
	
	const SESSION = 'User_user';

	public static function login($login,$senha)
	{
		$sql = new Sql();
		$usuario = $sql->select("SELECT * FROM tb_admin WHERE deslogin = :LOGIN",array(':LOGIN'=>$login));



		if(count($usuario) === 0 )
		{
			throw new Exception("Usuário inexistente ou senha inválida",2);
			exit;
		}

		$data = $usuario[0];

		//if(password_verify($senha,$data['dessenha']))
		if(isset($data['dessenha']))
		{
			$user = new User();
			$user->setData($data);
			$_SESSION[User::SESSION] = $user->getValues();
			return $user->getValues();

		}else{
			throw new \Exception("Usuário inexistente ou senha inválida",1);
		}

	}

	public static function verifyLogin($inadmin = true)
	{
		if(
			!isset($_SESSION[User::SESSION]) ||
			!$_SESSION[User::SESSION] ||
			!(int)$_SESSION[User::SESSION]['idadmin'] > 0 ||
			(bool)$_SESSION[User::SESSION]['inadmin'] != $inadmin 
		)
		{
			header("Location: /anne_doces/admin/login");
			exit;
		}
	} 

	//-------------ACABA COM SESSÃO--------------------------
	public static function logout()
	{
		$_SESSION[User::SESSION] = NULL ;
	}
	//-------------------------------------------------------


	public function userSearch($search,$reg_pg,$offset)
	{
		$sql = new Sql();

		$usuario = $sql->select("SELECT * FROM tb_client WHERE desnome LIKE '%$search%' LIMIT $reg_pg OFFSET $offset");

		if(count($usuario) > 0)return $usuario;			
	}

	public function searchCount($search)
	{
		$sql = new Sql();

		$usuario = $sql->select("SELECT * FROM tb_client WHERE desnome LIKE '%$search%'");

		if(count($usuario) > 0)
		{
			 $valor = count($usuario);
			 return $valor;
		} 
	}

	public static function insert($login,$senha)
	{

		$sql = new Sql();
		$sql->query("INSERT INTO tb_usuario (deslogin,dessenha) VALUES(:log , :senha)",array(
			':log' => $login ,
			':senha' => $senha
		));

	}




}
<?php
namespace project\controller;
use project\template\Page;
use project\model\User;
use project\model\Cliente;
use project\model\Compra;

class Admin{


//----------------CHAMA VIEWS---------------------------
//======================================================


	public function loginView() // VIEW LOGIN
	{
		$page = new Page(array(
			'header' => false,
			'footer' => false
		));
		$page->setTpl("login");
	}

	public function adminView() // ADMIN VIEW
	{
		User::verifyLogin();
		$page = new Page();
		$page->setTpl("index");
	}
	
	public function calcView() // CALC VIEW
	{
		User::verifyLogin();
		$page = new Page();
		$page->setTpl("calculadora2.0");
	}

	public function compraView() //MOSTRA VIEW PARA CRIAR A COMPRA RELACIONADA A UM USUARIO
	{
		User::verifyLogin();

		$id = $_POST['id'];
		$cliente = Cliente::clientSearch($id);
		$page = new Page(array(
			'header' => false,
			'footer' => false
		));
		$page->setTpl('venda-create',array("cliente" => $cliente));

	}
	public function compraViewSolo() // VIEW SOMENTE COMPRAR
	{
		User::verifyLogin();
		$page = new Page();
		$page->setTpl("venda-create-solo");
	}
//-------------------------------------------------------
//========================================================



//------------------EXECUTA-------------------------------
//========================================================

	public function compraInsert() // INSERE A COMPRA
	{
		User::verifyLogin();
		$descricao = $_POST['descricao'];
		$desqtn = $_POST['desqtn'];
		$desvalor = $_POST['desvalor'];
		$fidclient = $_POST['fidclient'];


		$data = array(
			'descricao' => $descricao,
			'desqtn' => $desqtn,
			'desvalor' => $desvalor,
			'fidclient' => $fidclient
		);

		$compra = new Compra();
		$compra->setData($data);
	
		$result = $compra->compraInsert();

		$page = new Page(array(
			'header' => false,
			'footer' => false
		));

		$page->setTpl('venda-view',array(
			'result' => $result
		));	
	}

	public function logar() // EFETUA O LOGIN
	{

		$login = $_POST['login'];
		$senha = $_POST['password'];
		User::login($login,$senha);
		return "http://localhost/anne_doces/admin/page";
		exit;
	}

	public function logout() // FAZ LOGOUT 
	{
		User::logout();
		header("Location: /anne_doces/admin/login");
		exit;
	}


	public function search() // FAZ A PROCURA
	{
		User::verifyLogin();
		$search = $_POST['palavra'];
		$reg_pg = $_POST['pagina_reg'];
		$offset = $_POST['offset'];

		$user = new User();
		$registros = $user->searchCount($search);
		$usuario = $user->userSearch($search,$reg_pg,$offset);
		$offset++ ;
		$quantia_paginas = ceil($registros / $reg_pg) ; 
		$pagina_atual =  ceil($offset / $reg_pg); 

		$pg_esquerda = 3 ;
		$pg_direita = 6 ;

		$page = new Page(array(
			'header' => false,
			'footer' => false
		));

		
		if(is_array($usuario)){
			$page->setTpl('users',array(
					'user' => $usuario
				));
		}else{
			return "Não encontrado";
		}

		$this->paginar($quantia_paginas,$pagina_atual,$pg_direita,$pg_esquerda);

	}



//---------------------------------------------------------------------------------
//=================================================================================	


//---------------------------------PAGINAÇÃO----------------------------------------
//==================================================================================

	public function paginar($quantia_paginas,$pagina_atual,$pg_direita,$pg_esquerda) //FAZ PAGINAÇÃO
	{

			User::verifyLogin();


			if($pagina_atual > 1){
				$pg_anterior = $pagina_atual - 1 ;
				echo "<button class='alert-success paginar' data-pagina_clicada='". $pg_anterior ."'>Anterior</button>";
			}

			$display = max(1 , $pagina_atual-$pg_esquerda);

				while($display < $pagina_atual){

		 		$classe_botao = $pagina_atual == $display ? 'btn-primary' : 'btn-default';
				echo "<button class='" .$classe_botao. " paginar' data-pagina_clicada='".$display."'>" .$display."</button>";
				$display++;

			}

			 $classe_botao = $pagina_atual == $display ? 'btn-primary' : 'btn-default';
				echo "<button class='" .$classe_botao. " paginar' data-pagina_clicada='".$display."'>" .$display."</button>";

			if($pagina_atual != $quantia_paginas){

			$display = min($quantia_paginas , $pagina_atual + 1 );

			while($display <= min($quantia_paginas,$pagina_atual+$pg_direita)){
				$classe_botao = $pagina_atual == $display ? 'btn-primary' : 'btn-default';
				echo "<button class='" .$classe_botao. " paginar' data-pagina_clicada='".$display."'>" .$display."</button>";
				$display++;

			}

			$pg_posterior = $pagina_atual + 1 ;
			echo "<button class='alert-success paginar' data-pagina_clicada='". $pg_posterior ."'>Próximo</button>";

			}
	}


//--------------------------------FIM PAGINAÇÃO--------------------------------------
//===================================================================================
}
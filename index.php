<?php
session_start();
require_once("vendor/autoload.php");
use Slim\App ;
use project\controller\Admin;

$app = new App();

$container = $app->getContainer();


//HOME PRINCIPAL
$container['Admin'] = function(){
	return new Admin();
}; 
$app->get('/admin/page' , 'Admin:adminView')->setName('Admin');// ROTA PRINCIPAL PARA APLICAÇÃO
//------------------------------------------------------------


//-------------LOGIN------------------------------------------

$app->post('/admin/logar' , "Admin:logar")->setName('Logar');// RECEBE VALORES PARA LOGAR
$app->get('/admin/login' , "Admin:loginView")->setName('Login');// MOSTRA VISUALIZAÇÃO DO LOGIN

//-------------------------------------------------------------

//-------------CALCULADORA-------------------------------------

$app->get('/admin/calc' , "Admin:calcView")->setName('Calc'); // MOSTRA A CALCULADORA

//--------------------------------------------------------------

//-------------LOGOUT--------------------------------------
$app->get('/admin/logout' , "Admin:logout")->setName('Logout'); // FAZ LOGOUT
//---------------------------------------------------------

//-------------VENDA CRIAR--------------------------------------
$app->post('/admin/compraView' , "Admin:compraView")->setName('VendaView'); // CHAMA VIEW VENDA

$app->post('/admin/compraInsert' , "Admin:compraInsert")->setName('CompraInsert');//INSERE A COMPRA

$app->GET('/admin/compraViewsSolo' , "Admin:compraViewSolo")->setName('VendaViewSolo'); // CHAMA VIEW VENDA
//-----------------------------------------------------------

//----------------EXIBIR USUARIOS-----------------------------
$app->post('/admin/search' , "Admin:search")->setName('Search'); // FAZ UMA PESQUISA
//---------------------------------------------------------

$app->run();
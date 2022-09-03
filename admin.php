<?php

use \Slim\Slim;
use \SBAC\Page;
use \SBAC\Mailer;
use \SBAC\Model\User;
use \SBAC\Model\Aluno;
use \SBAC\Model\Item;
use \SBAC\Model\Emprestimo;
use \SBAC\PageAdmin;


$_SESSION['config']['numLoan'] = Emprestimo::verifyLoan();


$app->get('/admin', function() {

	// if($_SESSION['config']['numLoan'] > 0){
		
	// 	Emprestimo::submitEmail();
	// }

	
	User::verifyLogin();
    
	$page2 = new PageAdmin();

	$page2->setTpl('index');

});

$app->get('/admin/login', function(){

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl('login');

});

$app->post('/admin/login', function(){

	//print_r($_POST);exit;

	
	User::login($_POST['login'],$_POST['password']);


	// header("Location: /admin");
	// exit;

});



$app->get('/admin/logout',function(){

	User::logout();
	
	header("Location: /admin/login");
	exit;

});

$app->get('/admin/perfil',function(){

	User::verifyLogin();
	
	$page = new PageAdmin();

	$page->setTpl('perfil_bibliotecario',[
		"bibliotecario"=>$_SESSION[User::SESSION]
	]);

});

$app->post('/admin/atualiza/bibliotecario',function(){
	
	//print_r($_POST);exit;

	if($_FILES['file']['name'] == ''){

		header("Location: /admin/perfil");
		exit;

	}
	
	$user = new User();

	$user->setData($_POST);

	$user->setFileArchive($_FILES);

	header("Location: /admin/perfil");
	exit;

});
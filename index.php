<?php

session_start();

require_once("vendor/autoload.php");

use \Slim\Slim;
use \SBAC\Page;
use \SBAC\Model\User;
use \SBAC\Model\Aluno;
use \SBAC\Model\Item;
use \SBAC\PageAdmin;
use \SBAC\Model\Emprestimo;

$app = new Slim();

$_SESSION['config']['numLoan'] = Emprestimo::verifyLoan();

$app->config('debug',true);

$app->get('/', function(){
	
	$page = new Page();

	$page->setTpl("index");

});

// <---- Rotas do site do abel ---->

$app->get('/eventos',function(){

	$page = new Page();

	$page->setTpl("eventos");

});

$app->get('/aboutus',function(){

	$page = new Page();

	$page->setTpl("aboutus");

});

$app->get('/course',function(){

	$page = new Page();

	$page->setTpl("course");

});
$app->get('/ensinomedio',function(){

	$page = new Page();

	$page->setTpl("ensinomedio");

});
$app->get('/contatos',function(){

	$page = new Page();

	$page->setTpl("contatos");

});
$app->get('/radio',function(){

	$page = new Page();

	$page->setTpl("radio");

});
$app->get('/contact',function(){

	$page = (isset($_GET['page']) ? (int)$_GET['page'] : 1);

	$item = new Item();

	$pagination = $item->getPages($page,6);

	$pages = [];

	for ($i=1; $i < $pagination['pages'] ; $i++) { 
		array_push($pages, [
			"link"=>'/contact?page='.$i,
			"page"=>$i

		]);

	}

	//print_r($pages);exit;

	$page = new Page();

	$page->setTpl('contact',[
		"itens"=>$pagination['data'],
		"pages"=>$pages,
		"full_pages"=>count($pages)
	]);

});

$app->get('/contact/busca/item',function(){

	//print_r($_GET);exit;

	$page = (isset($_GET['page']) ? (int)$_GET['page'] : 1);


	$item = new Item();

	$item->setData($_GET);

	$pagination = $item->searchItem($page,6);

	$pages = [];

	for ($i=1; $i < $pagination['pages'] ; $i++) { 
		array_push($pages, [
			'link'=>'page='.$i,
			"page"=>$i
		]);
	}


	

	$page = new Page();
	
		
	$page->setTpl("contact",[
		"itens"=>$pagination['data'],
		"pages"=>$pages,
		"full_pages"=>count($pages)
	]);
		
	

});

require_once('admin_aluno.php');
require_once('admin_item.php');
require_once('admin_emprestimo.php');
require_once('admin.php');

$app->run();

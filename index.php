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

	$page = new Page();

	$page->setTpl("contact");

});

require_once('admin_aluno.php');
require_once('admin_item.php');
require_once('admin_emprestimo.php');
require_once('admin.php');

$app->run();

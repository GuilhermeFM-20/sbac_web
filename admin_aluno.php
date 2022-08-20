<?php

use \Slim\Slim;
use \SBAC\Page;
use \SBAC\Model\User;
use \SBAC\Model\Aluno;
use \SBAC\Model\Item;
use \SBAC\PageAdmin;


// <---- Rotas do menu de alunos ---->

$app->get('/admin/aluno', function(){

	User::verifyLogin();

	$_GET = array(
		"nome"=>'',
		"matricula"=>''
	);

	$page = (isset($_GET['page']) ? (int)$_GET['page'] : 1);

	$aluno = new Aluno();

	$pagination = $aluno->getPages($page,7);

	$pages = [];

	for ($i=1; $i < $pagination['pages'] ; $i++) { 
		array_push($pages, [
			'link'=>'page='.$i,
			"page"=>$i
		]);
	}

	$page = new PageAdmin();

	$page->setTpl("aluno",[
		"alunos"=>$pagination['data'],
		"pages"=>$pages,
		"full_pages"=>count($pages)
	]);

	///print_r($alunos);
});

$app->get('/admin/busca/aluno',function(){

	//print_r($_POST);exit;


	User::verifyLogin();

	$page = (isset($_GET['page']) ? (int)$_GET['page'] : 1);


	$aluno = new Aluno();

	$aluno->setData($_GET);

	$pagination = $aluno->searchAluno($page,7);

	$pages = [];

	for ($i=1; $i < $pagination['pages'] ; $i++) { 
		array_push($pages, [
			'link'=>'page='.$i,
			"page"=>$i
		]);
	}

	$page = new PageAdmin();


	
	
		
		$page->setTpl("aluno",[
			"alunos"=>$pagination['data'],
			"pages"=>$pages,
			"full_pages"=>count($pages)
		]);
		
	

	

});



$app->get('/admin/cadastro/aluno', function(){

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl('cadastro_aluno');

});


$app->post('/admin/cadastra/aluno',function(){

	User::verifyLogin();
	 
	$aluno = new Aluno();

	//print_r($_POST);exit;

	$aluno->setData($_POST);

	$aluno->save();

	header("Location: /admin/aluno");
	exit;
	
});

$app->get('/admin/aluno/:leitor_id/delete',function($leitor_id){

	User::verifyLogin();

	$aluno = new Aluno();

	$aluno->delet((int)$leitor_id);

	header("Location: /admin/aluno");
	exit;

});

$app->get('/admin/aluno/:leiotr_id',function($leitor_id){

	User::verifyLogin();

	$aluno = new Aluno();

	$aluno->get((int)$leitor_id);

	$page = new PageAdmin();

	$page->setTpl('modifica_aluno',[
		"aluno"=>$aluno->getValues()
	]);

	//print_r($aluno->getValues());

});

$app->post('/admin/aluno/:leiotr_id',function($leiotr_id){

	//print_r($_POST);exit;

	User::verifyLogin();

	$aluno = new Aluno();

	$aluno->get((int)$leiotr_id);

	$aluno->setData($_POST);

	$aluno->update((int)$leiotr_id);

	header('Location: /admin/aluno');
	
	exit;


});

$app->get('/admin/aluno/cadastro/verifica/:matricula_leitor',function($matricula_leitor){

	User::verifyLogin();

	$aluno = new Aluno();

	$num = $aluno->verifyMatricula($matricula_leitor);

	 echo "<script> 

	 	if(".$num." > 0){

			alert('Matrícula já cadastrada no sistema!');

			parent.document.getElementById('matricula').value = '';
		
		}
	 </script>";

	//print_r($aluno->getValues());

});

$app->get('/admin/aluno/card/:leiotr_id',function($leitor_id){

	
	User::verifyLogin();


	$aluno = new Aluno();

	$aluno->get((int)$leitor_id);

	$data = $aluno->getValues();

	//print_r($data);exit;

	$uri = "nome=".base64_encode($data['nome_leitor'])."&turma=".base64_encode($data['turma'])."&matricula=".base64_encode($data['matricula_leitor']);

	echo '<script>window.location.assign("http://www.abelcoelho.com.br/gera_imagem.php?'.$uri.'");</script>';

});

// <---- Final ---->
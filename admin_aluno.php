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

	$page = (isset($_GET['page']) ? (int)$_GET['page'] : 1);

	$_GET = array(
		"nome"=>'',
		"matricula"=>''
	);

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
		"full_pages"=>count($pages),
		'setMsg'=> User::getMessage()
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
		"full_pages"=>count($pages),
		'setMsg'=> User::getMessage()
	]);
	

});



$app->get('/admin/cadastro/aluno', function(){

	//$_SESSION['alunoValues'] = array('nome'=>'','matricula'=>'','turma'=>'','telefone'=>'','turma'=>'','sexo'=>'','email'=>'');

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl('cadastro_aluno',[
		'setMsg'=> Aluno::getMessage(),
		'aluno'=>(isset($_SESSION['alunoValues'])) ? $_SESSION['alunoValues'] : ['nome'=>'','matricula'=>'','turma'=>'','telefone'=>'','turma'=>'','sexo'=>'','email'=>'']
		//'aluno'=>array('nome'=>'','matricula'=>'','turma'=>'','telefone'=>'','turma'=>'','sexo'=>'','email'=>'')
	]);

	unset($_SESSION['alunoValues']);

});


$app->post('/admin/cadastra/aluno',function(){
	
	

	User::verifyLogin();
	 
	$aluno = new Aluno();

	//print_r($_POST);exit;

	$aluno->setData($_POST);


	if($aluno->save()){
		//Aluno::setMessage("/admin/busca/aluno","",3);

		Aluno::setMessage("Leitor cadastrado com sucesso.",'Sucesso');
		header('Location: /admin/aluno');
		exit;		

	}else{

		$_POST['matricula'] = '';

		$_SESSION['alunoValues'] = $_POST;
		
		Aluno::setMessage("Matrícula já cadastrada no sistema.",'Aviso');
		header('Location: /admin/cadastro/aluno');
		exit;
		//Aluno::setMessage("/admin/cadastro/aluno","",2);
	}
	
});

$app->get('/admin/aluno/:leitor_id/delete',function($leitor_id){

	User::verifyLogin();

	$aluno = new Aluno();

	$aluno->delete((int)$leitor_id);
	
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

	Aluno::setMessage("Registro atualizado com sucesso.",'Sucesso');

	header('Location: /admin/aluno');
	
	exit;


});


$app->get('/admin/aluno/card/:leiotr_id',function($leitor_id){
	
	User::verifyLogin();

	$aluno = new Aluno();

	$aluno->get((int)$leitor_id);

	$data = $aluno->getValues();

	//print_r($data);exit;

	$uri = "nome=".base64_encode($data['nome_leitor'])."&turma=".base64_encode($data['turma'])."&matricula=".base64_encode($data['matricula_leitor']);

	echo '<script>window.location.assign("http://127.0.0.1/gera_imagem.php?'.$uri.'");</script>';

});

// <---- Final ---->
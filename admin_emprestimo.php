<?php 

use \Slim\Slim;
use \SBAC\Page;
use \SBAC\Model\User;
use \SBAC\Model\Aluno;
use \SBAC\Model\Item;
use \SBAC\Model\Emprestimo;
use \SBAC\PageAdmin;


$app->get('/admin/emprestimo',function(){
	

	User::verifyLogin();

	$page = (isset($_GET['page']) ? (int)$_GET['page'] : 1);

	$empr = new Emprestimo();

	$pagination = $empr->getPages($page,4);

	$pages = [];

	for ($i=1; $i < $pagination['pages'] ; $i++) { 
		array_push($pages, [
			"link"=>'page='.$i,
			"page"=>$i

		]);

	}

	$page = new PageAdmin();

	$page->setTpl('emprestimo_item',[
		"emprestimos"=>$pagination['data'],
		"pages"=>$pages,
		"full_pages"=>count($pages)
	]);

});

$app->get('/admin/busca/emprestimo',function(){

	//print_r($_POST);exit;


	User::verifyLogin();

	$page = (isset($_GET['page']) ? (int)$_GET['page'] : 1);


	$empr = new Emprestimo();

	$empr->setData($_GET);

	$pagination = $empr->searchItens($page,4);

	$pages = [];

	for ($i=1; $i < $pagination['pages'] ; $i++) { 
		array_push($pages, [
			'link'=>'page='.$i,
			"page"=>$i
		]);
	}

	$page = new PageAdmin();
	
		
	$page->setTpl("emprestimo_item",[
		"emprestimos"=>$pagination['data'],
		"pages"=>$pages,
		"full_pages"=>count($pages)
	]);
		
	

});

$app->get('/admin/cadastro/emprestimo/item',function(){

    User::verifyLogin();

    $page2 = new PageAdmin();

    $itens = Item::listAll();

    $page2->setTpl('cadastro_emprestimo_item',[
        "itens"=>$itens
    ]);

});

// $app->get('/admin/emprestimo/item/:item_id',function($item_id){

//     User::verifyLogin();

//     $page = new PageAdmin();

//     $alunos = Aluno::listAll();

//     $page->setTpl('cadastro_emprestimo_aluno',[
//         "alunos"=>$alunos,
//         "item"=>$item_id
//     ]);

// });

$app->get('/admin/emprestimo/item/:item_id',function($item_id){

	//print_r($_POST);exit;

	User::verifyLogin();

	$page = (isset($_GET['page']) ? (int)$_GET['page'] : 1);

	$aluno = new Aluno();

	$aluno->setData($_GET);

	$pagination = $aluno->searchAluno($page,6);


	$pages = [];

	for ($i=1; $i < $pagination['pages'] ; $i++) { 
		array_push($pages, [
			'link'=>'page='.$i,
			"page"=>$i
		]);
	}

	$page = new PageAdmin();

		
    $page->setTpl("cadastro_emprestimo_aluno",[
        "alunos"=>$pagination['data'],
        "pages"=>$pages,
        "full_pages"=>count($pages),
        "item"=>$item_id
    ]);
		

});

$app->get('/admin/cadastro/emprestimo/aluno/:laitor_id/:item_id',function($leitor_id,$item_id){

    // $item = Item::getItem((int)$item_id);

    // print_r($item);exit;

    User::verifyLogin();

    $page = new PageAdmin();

    $aluno = Aluno::getAluno((int)$leitor_id);

    $item = Item::getItem((int)$item_id);

    $page->setTpl('cadastro_emprestimo_final',array(
        "aluno"=>$aluno[0],
        "item"=>$item[0]
    ));


});

$app->get('/admin/cadastro/emprestimo/aluno/:laitor_id/:item_id/:veri',function($leitor_id,$item_id,$veri){

    // $item = Item::getItem((int)$item_id);

    // print_r($item);exit;


    User::verifyLogin();

    $page = new PageAdmin();

    $aluno = Aluno::getAluno((int)$leitor_id);

    $item = Item::getItem((int)$item_id);
    

    $page->setTpl('cadastro_emprestimo_final',array(
        "aluno"=>$aluno[0],
        "item"=>$item[0],
        "veri"=>$veri
    ));


});

// $app->post('/admin/emprestimo/buscar',function(){

//     //print_r($_POST);exit;
        
//     User::verifyLogin();

//     $empr = new Emprestimo();

//     $empr->setData($_POST);

//     $page = new PageAdmin();
    
//     $page->setTpl('emprestimo_item',[
//         "emprestimos"=>$empr->searchEmprestimo()
//     ]);

// });


// $app->post('/admin/emprestimo/buscar/item',function(){

// 	//print_r($_POST);exit;

//     User::verifyLogin();

// 	$item = new Item();

// 	$page = new PageAdmin();

// 	$item->setData($_POST);

//     //print_r($item->searchItem());exit;

// 	$page->setTpl("cadastro_emprestimo_item",[
// 		"itens"=>$item->searchItem()
// 	]);


// });

$app->get('/admin/emprestimo/buscar/item',function(){

	//print_r($_POST);exit;


	User::verifyLogin();

	$page = (isset($_GET['page']) ? (int)$_GET['page'] : 1);


	$item = new Item();

	$item->setData($_GET);

	$pagination = $item->searchItem($page,3);

	$pages = [];

	for ($i=1; $i < $pagination['pages'] ; $i++) { 
		array_push($pages, [
			'link'=>'page='.$i,
			"page"=>$i
		]);
	}

	$page = new PageAdmin();
	
		
	$page->setTpl("cadastro_emprestimo_item",[
		"itens"=>$pagination['data'],
		"pages"=>$pages,
		"full_pages"=>count($pages)
	]);
		
	

});

$app->post('/admin/emprestimo/buscar/aluno',function(){

	//print_r($_POST);exit;

    User::verifyLogin();

	$alunos = new Aluno();

	$page = new PageAdmin();

	$alunos->setData($_POST);

	$page->setTpl("cadastro_emprestimo_aluno",[
		"alunos"=>$alunos->searchAluno()
	]);

});

$app->post('/admin/cadastra/emprestimo/:item_id/:leitor_id',function($item_id,$leitor_id){

   // print_r($_POST);exit;

    User::verifyLogin();

    $empr = new Emprestimo();

    $empr->setData($_POST);

    $verify = $empr->save($item_id,$leitor_id);


    if($verify){

        //header("Location: /admin/cadastro/emprestimo/aluno/$leitor_id/$item_id/1?erro=Erro: Livro ou Leitor com empréstimo ativo!&tipo=Aviso");
       
		Emprestimo::setMessage("/admin/cadastro/emprestimo/aluno/$leitor_id/$item_id/1","Livro ou Leitor com empréstimo ativo!",1);

        exit;

    }

    header('Location: /admin/emprestimo');
    exit;

});


$app->get('/admin/devolucao/:empr_id',function($empr_id){

    User::verifyLogin();

    $empr = new Emprestimo();

    $empr->returnItem((int)$empr_id);

    header('Location: /admin/emprestimo');
    exit;

});


$app->get('/admin/renovacao/:empr_id',function($empr_id){

    User::verifyLogin();

    $page = new PageAdmin();

    $empr = Emprestimo::getEmpr((int)$empr_id);

    //print_r($empr);exit;

    $page->setTpl('renovacao_item',[
        "empr"=>$empr[0]
    ]);

});

$app->post('/admin/renovacao/item',function(){

   //print_r($_POST);exit;

    User::verifyLogin();

    $empr = new Emprestimo();

    $empr->setData($_POST);

    $empr->update($_POST['empr_id']);

    header('Location: /admin/emprestimo');
    exit;

});

$app->get('/admin/emprestimo/:id_empr/delete',function($empr_id){

    User::verifyLogin();

    $empr = new Emprestimo();

    $empr->delet((int)$empr_id);

    header('Location: /admin/emprestimo');
    exit;

});

// $app->get('/admin/emprestimo/buscar/encerrados',function(){

// 	//print_r($_POST);exit;

//     $_GET['encerrados'] = 'Sim';

//     User::verifyLogin();

// 	$empr = new Emprestimo();

// 	$page = new PageAdmin();

// 	$empr->setData($_GET);

// 	$page->setTpl("emprestimo_item",[
// 		"emprestimos"=>$empr->searchEmprestimo()
// 	]);

// });

$app->get('/admin/emprestimo/buscar/encerrados',function(){

	//print_r($_POST);exit;

	$_GET['encerrados'] = 'Sim';

	User::verifyLogin();

	$page = (isset($_GET['page']) ? (int)$_GET['page'] : 1);


	$empr = new Emprestimo();

	$empr->setData($_GET);

	$pagination = $empr->searchItens($page,4);

	$pages = [];

	for ($i=1; $i < $pagination['pages'] ; $i++) { 
		array_push($pages, [
			'link'=>'page='.$i,
			"page"=>$i
		]);
	}

	$page = new PageAdmin();
	
		
	$page->setTpl("emprestimo_item",[
		"emprestimos"=>$pagination['data'],
		"pages"=>$pages,
		"full_pages"=>count($pages)
	]);
		
	

});

$app->get('/admin/relatorios/emprestimos',function(){

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl('relatorio_emprestimos');

});

$app->post('/admin/relatorios/emprestimos/buscar',function(){

	//print_r($_POST);exit;

	User::verifyLogin();

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$empr = new Emprestimo();

	$empr->setData($_POST);

	$page->setTpl('planilha_emprestimos',[
		"emprestimos"=>$empr->searchEmprestimo(),
		"data"=>date('d/m/Y H:m')
	]);

});



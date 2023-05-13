<?php

use \Slim\Slim;
use \SBAC\Page;
use \SBAC\Model\User;
use \SBAC\Model\Aluno;
use \SBAC\Model\Item;
use \SBAC\PageAdmin;


// <---- Rotas do cadastro de itens ---->

$app->get('/admin/item',function(){
	
	

	User::verifyLogin();

	$page = (isset($_GET['page']) ? (int)$_GET['page'] : 1);

	$item = new Item();

	$pagination = $item->getPages($page,4);

	$pages = [];

	for ($i=1; $i < $pagination['pages'] ; $i++) { 
		array_push($pages, [
			"link"=>'page='.$i,
			"page"=>$i

		]);

	}

	$page = new PageAdmin();

	$page->setTpl('item',[
		"itens"=>$pagination['data'],
		"pages"=>$pages,
		"full_pages"=>count($pages),
		'setMsg'=> User::getMessage()
	]);

});

$app->get('/admin/busca/item',function(){

	//print_r($_POST);exit;


	User::verifyLogin();

	$page = (isset($_GET['page']) ? (int)$_GET['page'] : 1);


	$item = new Item();

	$item->setData($_GET);

	$pagination = $item->searchItem($page,4);

	$pages = [];

	for ($i=1; $i < $pagination['pages'] ; $i++) { 
		array_push($pages, [
			'link'=>'page='.$i,
			"page"=>$i
		]);
	}

	$page = new PageAdmin();
	
		
	$page->setTpl("item",[
		"itens"=>$pagination['data'],
		"pages"=>$pages,
		"full_pages"=>count($pages),
		'setMsg'=> User::getMessage()
	]);
		
	

});

$app->get('/admin/cadastro/item',function(){

	
	//print_r($_SESSION['itemValues']);

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl('cadastro_item',[
		'setMsg'=>Item::getMessage(),
		'item'=>(isset($_SESSION['itemValues'])) ? $_SESSION['itemValues'] : ['titulo'=>'','cod_tomb'=>'','origem'=>'','data_aq'=>'','editora'=>'','data_publ'=>'','foto'=>'','descricao'=>'','autor'=>'']

	]);

	unset($_SESSION['itemValues']);

});

$app->get('/admin/cadastro/item/net',function(){

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl('cadastro_item_net');

});


$app->post('/admin/cadastra/item',function(){

   //	print_r($_POST);exit;


	User::verifyLogin();

	$item = new Item();

	$item->setData($_POST);

	if($item->save()){
		//Aluno::setMessage("/admin/busca/aluno","",3);

		Item::setMessage("Item cadastrado com sucesso.",'Sucesso');
		header('Location: /admin/item');
		exit;		

	}else{

		$_POST['cod_tomb'] = '';

		$_SESSION['itemValues'] = $_POST;
		
		Item::setMessage("Código de tombamento já cadastrado no sistema!",'Aviso');
		header('Location: /admin/cadastro/item');
		exit;
		//Aluno::setMessage("/admin/cadastro/aluno","",2);
	}	

});

$app->get('/admin/item/cadastro/verifica/:cod_tomb',function($cod_tomb){

	User::verifyLogin();

	$item = new Item();

	$num = $item->verifyCodTomb($cod_tomb);

	 echo "<script> 

	 	if(".$num." > 0){

			alert('Código já cadastrado no sistema!');

			parent.document.getElementById('cod_tomb').value = '';
		
		}
	 </script>";

	//print_r($item->getValues());

});



$app->get('/admin/item/:item_id',function($item_id){

	User::verifyLogin();

	$item = new Item();

	$item->get((int)$item_id);

	$page = new PageAdmin();
	
	$page->setTpl('modifica_item',[
		"itens"=>$item->getValues()
	]);

	//print_r($item->getValues());

});

$app->post('/admin/item/:item_id',function($item_id){

	//print_r($_POST);exit;

	User::verifyLogin();

	$item = new Item();

	$item->get((int)$item_id);

	$item->setData($_POST);

	$item->update((int)$item_id);

	header('Location: /admin/item');
	
	exit;

});

$app->get('/admin/cadastro/item/net/:livro',function($livro){

	User::verifyLogin();

	$livro = urlencode($livro);

    $link = "https://www.googleapis.com/books/v1/volumes?q=$livro";

    $ch = curl_init($link);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);

    $response = curl_exec($ch);

    curl_close($ch);

    $data =  json_decode($response, true);

	//print_r($data);

		
        $livros = array(
			"id"=>!array_key_exists('id',$data) ? $data['items'][0]['id'] : '', 
            "titulo"=>!array_key_exists('title' ,$data) ? $data['items'][0]['volumeInfo']['title'] : '' , 
            "autor"=>!array_key_exists('authors',$data) ? $data['items'][0]['volumeInfo']['authors'][0] : '' , 
            "origem"=>!array_key_exists('country' ,$data) ? $data['items'][0]['saleInfo']['country'] : '', 
            "editora"=>!array_key_exists('publisher' ,$data) ? $data['items'][0]['volumeInfo']['publisher'] : '' , 
            "data_publ"=>!array_key_exists('publishedDate' ,$data) ? $data['items'][0]['volumeInfo']['publishedDate'] : '', 
			"descricao"=>!array_key_exists('description',$data) ? $data['items'][0]['volumeInfo']['description'] : '', 
            "foto"=> !array_key_exists('thumbnail' ,$data) ? $data['items'][0]['volumeInfo']['imageLinks']['thumbnail' ] : ''
        );

    //print_r($livros);exit;
	
	$page = new PageAdmin();

	$page->setTpl('modifica_item_net',[
		"livros"=>$livros
	]);

	//print_r($item->getValues());

});

$app->post('/admin/item/cadastro/buscar',function(){

    User::verifyLogin();
	

    $livro = urlencode($_POST['titulo']);

    $link = "https://www.googleapis.com/books/v1/volumes?q=$livro";

    $ch = curl_init($link);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);

    $response = curl_exec($ch);

    curl_close($ch);


    $data = json_decode($response, true);

	//print_r($data);exit;
    

		for($i = 0; $i < count($data['items']); $i++){		

			try{

				$livros[] = array(
					"id"=>$data['items'][$i]['id'],
					"titulo"=>$data['items'][$i]['volumeInfo']['title'],
					"autor"=>$data['items'][$i]['volumeInfo']['authors'][0],
					"origem"=>$data['items'][$i]['saleInfo']['country'],
					"editora"=>$data['items'][$i]['volumeInfo']['publisher'],
					"data_publ"=>$data['items'][$i]['volumeInfo']['publishedDate'],
					"foto"=>$data['items'][$i]['volumeInfo']['imageLinks']['thumbnail']
				
				);

			}catch(Exception $e){

				continue;

			}
		
		}
	
    //print_r($livros);exit;

    $page = new PageAdmin();

    $page->setTpl('cadastro_item_net',[
        "livros"=>$livros

    ]);


});

$app->get('/admin/item/:item_id/delete',function($item_id){

	User::verifyLogin();

	$item = new Item();

	$item->delet((int)$item_id);

	header("Location: /admin/item");
	exit;

});

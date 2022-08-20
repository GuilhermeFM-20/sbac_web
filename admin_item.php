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
		"full_pages"=>count($pages)
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
		"full_pages"=>count($pages)
	]);
		
	

});

$app->get('/admin/cadastro/item',function(){

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl('cadastro_item');

});

$app->get('/admin/cadastro/item/net',function(){

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl('cadastro_item_net');

});


$app->post('/admin/cadastra/item',function(){

   	///print_r($_POST);exit;

	User::verifyLogin();

	$item = new Item();

	$item->setData($_POST);

	$item->save();

	header('Location: /admin/item');
	exit;

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
			"id"=>$data['items'][0]['id'],
            "titulo"=>$data['items'][0]['volumeInfo']['title'],
            "autor"=>$data['items'][0]['volumeInfo']['authors'][0],
            "origem"=>$data['items'][0]['saleInfo']['country'],
            "editora"=>$data['items'][0]['volumeInfo']['publisher'],
            "data_publ"=>$data['items'][0]['volumeInfo']['publishedDate'],
			"descricao"=>$data['items'][0]['volumeInfo']['description'],
            "foto"=>$data['items'][0]['volumeInfo']['imageLinks']['thumbnail']

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

			if(!array_key_exists("publisher",$data['items'][$i]['volumeInfo'])){
				continue;
			}
			if(!array_key_exists("publishedDate",$data['items'][$i]['volumeInfo'])){
				continue;
			}
			if(!array_key_exists("imageLinks",$data['items'][$i]['volumeInfo'])){
				continue;
			}
			if(!array_key_exists("country",$data['items'][$i]['saleInfo'])){
				continue;
			}
			if(!array_key_exists("thumbnail",$data['items'][$i]['volumeInfo']['imageLinks'])){
				continue;
			}
			if(!array_key_exists("description",$data['items'][$i]['volumeInfo'])){
				continue;
			}
			if(!array_key_exists("authors",$data['items'][$i]['volumeInfo'])){
				continue;
			}

			$livros[] = array(
				"id"=>$data['items'][$i]['id'],
				"titulo"=>$data['items'][$i]['volumeInfo']['title'],
				"autor"=>$data['items'][$i]['volumeInfo']['authors'][0],
				"origem"=>$data['items'][$i]['saleInfo']['country'],
				"editora"=>$data['items'][$i]['volumeInfo']['publisher'],
				"data_publ"=>$data['items'][$i]['volumeInfo']['publishedDate'],
				"foto"=>$data['items'][$i]['volumeInfo']['imageLinks']['thumbnail']
			
			);
		
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

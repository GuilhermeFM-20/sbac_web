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

	$page = new PageAdmin();

	$item = Item::listAll();

	$page->setTpl('item',[
		"itens"=>$item
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

	$aluno = new Item();

	$num = $aluno->verifyCodTomb($cod_tomb);

	 echo "<script> 

	 	if(".$num." > 0){

			alert('Código já cadastrado no sistema!');

			parent.document.getElementById('cod_tomb').value = '';
		
		}
	 </script>";

	//print_r($aluno->getValues());

});

$app->post('/admin/item/buscar',function(){

	//print_r($_POST);exit;

	User::verifyLogin();

	$item = new Item();

	$page = new PageAdmin();

	$item->setData($_POST);

	$page->setTpl("item",[
		"itens"=>$item->searchItem()
	]);

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

	$aluno = new Item();

	$aluno->get((int)$item_id);

	$aluno->setData($_POST);

	$aluno->update((int)$item_id);

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
            "foto"=>$data['items'][0]['volumeInfo']['imageLinks']['thumbnail']

        );

    //print_r($livros);exit;
	
	$page = new PageAdmin();

	$page->setTpl('modifica_item_net',[
		"livros"=>$livros
	]);

	//print_r($aluno->getValues());

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

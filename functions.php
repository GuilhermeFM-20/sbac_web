<?php

use \Hcode\Model\User;
use \Hcode\Model\Cart;

function formatPrice(float $vlprice){

    $valor = 0;
    if($vlprice > 0){
        $valor = number_format($vlprice ,2 , ",",".");
    }

    return $valor;

}

function checkLogin($inadmin = true){

    return User::checkLogin($inadmin);

}

function getUserName(){

    $user = User::getFromSession();

    return utf8_decode($user->getdesperson());

}

function getCartNrQtd(){

    $cart = Cart::getFromSession();

    $totals = $cart->getProductsTotals();

    return $totals['nrqtd'];

}

function getCartVlSubTotal(){

    $cart = Cart::getFromSession();

    $totals = $cart->getProductsTotals();

    return formatPrice($totals['vlprice']);

}


function formatDate($data){

    $verifica_tipo = strpos((string)$data,"-");

    $formatada = $data;

    if($verifica_tipo != false){

        $formatada = date('d/m/Y',strtotime($data)); 

    }

    return $formatada;

}


function showMessage($msg,$tipo){

    if($msg != '' && $tipo != ''){
    
        switch($tipo){
            case 'Aviso': 
                $type = "warning";
                break;
            case 'Erro': 
                $type = "error";
                break;
            case 'Sucesso': 
                $type = "success";
                break;
            default:
                $type = "warning";
                break; 
        }

        echo'

        <script>
        function modalMsg(){
        
            let modal = document.getElementById("modal");
            let modal_h = document.getElementById("modal-content");
            
            modal.style.display = "block";
            
            const timer = setInterval(function() {
                modal.style.display = "none";
            }, 3000);

        }

        </script> 

        <div class="modal modal-'.$type.' fade in" id="modal" style="display: none; padding-right: 15px;">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"></span></button>
                <h4 class="modal-title">'.$tipo.'</h4>
                </div>
                <div class="modal-body">
                <p>'.$msg.'</p>
                </div>
                <div class="modal-footer">
            </div>
            </div>
        </div>
        </div>
        <script>
            modalMsg();
        </script>
        ';

    
    }
       
    
}


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
            }, 5000);

        }

        function closeModal(){
            let modal = document.getElementById("modal");        
            modal.style.display = "none";
        }

        </script> 

        <div class="modal modal-'.$type.' fade in" id="modal" style="display: none; padding-right: 15px;">
            
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header" style="display:flex;">
                        <h4 class="modal-title">'.$tipo.'</h4>
                        <button type="button" class="close" data-dismiss="modal" onClick="closeModal()" aria-label="Close" style="    text-align: right;
                        padding-left: 86%;">
                        <span aria-hidden="true">×</span>
                        </button>
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


function showMessageInput($msg,$tipo,$rota,$id,$estilo,$icone,$titulo,$texto){

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


        $rota = str_replace('[id]',$id,$rota);

        echo'

        <script>

            function modalMsgInput'.$id.'(){
            
                let modal = document.getElementById("modal'.$id.'");
            
                modal.style.display = "block";

            }

            function closeModal'.$id.'(){

                let modal = document.getElementById("modal'.$id.'");        
                modal.style.display = "none";

            }

        </script> 

        <style>

            #btn_alert{

                background:#db8b0b; 
                border-color:white;
                width:10%;

            }

            #btn_alert:hover{

                background:white !important;

            }

            a{

                color:white;

            }
        
        </style>

        <div class="modal modal-'.$type.' fade in" id="modal'.$id.'" style="display: none; padding-right: 15px;">          
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="display:flex;">
                        <h4 class="modal-title">'.$tipo.'</h4>
                        <button type="button" class="close" data-dismiss="modal'.$id.'" onClick="closeModal'.$id.'()" aria-label="Close" style="    text-align: right;
                        padding-left: 90%;">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">
                    <p>'.$msg.'</p>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <a  href="'.$rota.'" id="btn_alert" class="btn btn-outline-light" data-dismiss="modal">Sim</a>
                        <button type="button" onClick="closeModal'.$id.'()" id="btn_alert" class="btn btn-outline-light">Não</button>
                    </div>
                </div>
            </div>
        </div>

        <button onclick="javascript:modalMsgInput'.$id.'();" class="btn '.$estilo.' btn-xs" title="'.$titulo.'"><i class="fa '.$icone.'"></i> '.$texto.'</button>
            
        ';

    
    }
       
    
}



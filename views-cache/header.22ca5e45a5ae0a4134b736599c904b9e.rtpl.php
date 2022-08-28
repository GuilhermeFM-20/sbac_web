<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>E.E Professor Abel Freire Coelho </title>

    <!-- Favicon -->
    <link rel="icon" href="/views/img/icon.png">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="/views/style.css">
    
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
  
    -->
  
    <link rel="icon" href="/views/img/core-img/icon2.png">
  
    <link rel="stylesheet" href="/views/adm/admin/dist/css/skins/skin-blue.min.css">

    <style>
        .input-group{
               width: 70%;
               margin-left: 15%;
               margin-bottom: 8%;

        }
        .form-control{
            border-radius: 16px 0 0 16px;
            border-right: white;
        }
        .btn{
            border-radius: 0  16px  16px 0;
            background: none;
            border-width: 1px;
            border-color: gainsboro;
            border-left: white;
        }



        #img_bib{
            width: 110px;
            height: 164px;
            overflow: hidden;
          
        }
        .row_books{
            background-color: rgb(240, 240, 240);
            margin: 0 10px 20px 0;
            width: 560px;
            height: 164px;

            border-radius: 0 4px 4px 0;
            
        }
        .row .row_books .label_books{

            /* width: 100%; */
            color: #1b2cc5;
            margin: none;
            

        }
        .div_img{
            /* margin-right: 4px; */
            display: inline-block;
        }
        .div_label{
            margin-top: 10px;
            display: inline-block;
            margin-left: 10px;
            margin-right: 10px;
            width:  13%;
            position: absolute;
            

        }
        .div_label_2{
            margin-top: 10px;
            display: inline-block;
            margin-left: 230px;
            width: 13%;
            
            position: absolute;
        }

        #row-grid-scroll{
        font-family: "Montserrat", sans-serif;
        font-size: 14px;
    }

    #row-grid-scroll::-webkit-scrollbar {
        width: 13px;
        background: #e9ebff;
    }

    #row-grid-scroll::-webkit-scrollbar-thumb {
        background: #1b2cc1;
        border-radius: 10px;
    }
    #row-grid-scroll{
      overflow-y: scroll;
      height:350px;
    }

    #row-grid{
      /* overflow-y: scroll;  */
      height:70%;
    } 
    
    #row-pages{

      height: 5px;

      position: relative;

    }
    

    </style>

</head>

<body>
    <!-- ##### Preloader ##### -->
    <div id="preloader">
        <i class="circle-preloader"></i>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <div class="header-content h-100 d-flex align-items-center justify-content-between">
                            <div class="academy-logo">
                                <a href="/views/index.html"><img src="/views/img/core-img/logo.png" alt=""></a>
                            </div>
                            <div class="login-content">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="academy-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="academyNav">

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="/">Inicio</a></li>
                                    <li><a href="#">Sobre</a>
                                        <ul class="dropdown">
                                            <li><a href="/aboutus">Espaços</a></li>
                                            <li><a href="/course">Informações</a></li>
                                            <li><a href="/ensinomedio">Ensino</a></li>
                                            <li><a href="/contatos">Contatos</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="/eventos">Eventos</a></li>
                                    <li><a href="/radio">Rádio</a></li>
                                    <li><a href="/contact">Biblioteca</a></li>
                                </ul>

                            </div>
                            <!-- Nav End -->
                        </div>
                        <!-- Rede sociais-->
                        <div class="redesSociais">
                            <table>
                             <tr>   
                            <td><div class="redes">
                                    <a href="https://www.facebook.com/pages/Escola-Estadual-Professor-Abel-Freire-Coelho/693309054135861" target="_blank"><img src="/views/img/core-img/iconf2.png" alt="" width="50" height="50" style="border-radius: 15px;"></a>
                            </div></td>
                            <td><div class="redes">
                                    <a href="https://www.instagram.com/geam_ac/?hl=pt-br" target="_blank"><img src="/views/img/core-img/iconi.png" alt="" width="50" height="50" style="border-radius: 15px;"></a>
                            </div></td>
                            </tr>
                            </table>
                        </div>
                        <!--Redes fim-->
                        <!-- Calling Info -->
                        <div class="calling-info">
                            <div class="call-center">
                                <a href="tel:+654563325568889"><i class="icon-telephone-2"></i> <span>(84) 3315-5668 </span></a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->
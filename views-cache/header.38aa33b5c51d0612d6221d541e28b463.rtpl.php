<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SBAC - Sistema Bibliotecário Abel Coelho</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/views/adm/admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/views/adm/admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.

  -->

  <link rel="icon" href="/views/img/core-img/icon2.png">

  <link rel="stylesheet" href="/views/adm/admin/dist/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.compond/1.4.2pond.min.js"></script>
  <![endif]-->

    <style>
    #row-grid{
        font-family: "Montserrat", sans-serif;
        font-size: 14px;
    }

    #row-grid::-webkit-scrollbar {
        width: 13px;
        background: #e9ebff;
    }

    #row-grid::-webkit-scrollbar-thumb {
        background: #1b2cc1;
        border-radius: 10px;
    }

    #row-grid{
      overflow-y: scroll; 
      height:500px;
    } 

    #row-grid{
      overflow-y: scroll; 
      height:374px;
    }
    
    

    .campos_form{
      display: inline-block;
      width:100%;
    }

    .form-group{
      display: inline-block;
      margin-left: 10px;
      width: 49%;
    }

    .form-group{
      display: inline-block;
      width: 49%;
    }
    #btn-sb{
      width:14%;
    } 

    .content{
      min-height: 1px;
      padding-bottom: 1px;
      padding-top: 1px;
      
    }

    .modalsb {
      position: fixed;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      font-family: Arial, Helvetica, sans-serif;
      background: rgba(0,0,0,0.8);
      z-index: 99999;
      opacity:0;
      -webkit-transition: opacity 400ms ease-in;
      -moz-transition: opacity 400ms ease-in;
      transition: opacity 400ms ease-in;
      pointer-events: none;
    }

    .modalsb:target {
      opacity: 1;
      pointer-events: auto;
    } 

    .modaldiv > div {
      width: 80%;
      height: 700px;
      position: relative;
      margin: 10% auto;
      padding: 15px 20px;
      /* background: rgb(215, 38, 38); */
    }
    
    .fechar {
      position: absolute;
      width: 30px;
      right: 150px;
      top: 200px;
      text-align: center;
      line-height: 30px;
      margin-top: 5px;
      background: #1b2cc1;
      border-radius: 50%;
      font-size: 16px;
      color: #ffffff;
    }

    #foto_liv{

      width: 10%;

    }
    #foto_liv:hover{

    width: 60%;

    }

    #foto_liv_item{

    width: 87px;

    }

    
    
    

    </style>

    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="path-para-seu-script"></script>
    <script>

      function abreModal(type,text){

          //alert('123');exit;

          $('#exampleModalLive').modal('show');

          // var modal = document.getElementById('modal-content');

          // switch(type){

          // case 'Aviso':
          
          //     modal.style.backgroundColor = '#F7DC6F';

          // break;
          // case 'Error':

          //     modal.style.backgroundColor = '#E74C3C';

          // break;
          // case 'Sucesso':

          //     modal.style.backgroundColor = '#2ECC71';

          // break;

          // }

      }


    </script>

</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini" style=" overflow: hidden;">

  <div id="exampleModalLive" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" id="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLiveLabel">Título do modal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Aêêê! Você tá vendo esse texto, dentro do modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>

  
  <div class="wrapper">

  <!-- Main Header -->
  <header class="main-header" >

    <!-- Logo -->
    <a href="../admin/index2.html" class="logo" style="background-color:#2952ac">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      

      <span class="logo-mini"><img src="/views/icon2.png" style="width: 80%;"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="/views/logo_sbac.png" style="width: 90%;"></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation" style="background-color:#182ad2;">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu" >
        <ul class="nav navbar-nav" >
          <!-- Messages: style can be found in dropdown.less-->
          <!-- <li class="dropdown messages-menu" >
          
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu" >
              <li class="header">You have 4 messages</li>
              <li>
                
                <ul class="menu" style="height: 40px;">
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        
                        <img src="/views/adm/admin/dist/img/pda.png" class="img-circle" alt="User Image">
                      </div>
                      
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  
                </ul>
                
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li> -->
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"><?php echo htmlspecialchars( $_SESSION["config"]["numLoan"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Notificações do sistema</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <?php if( $_SESSION["config"]["numLoan"] > 0 ){ ?>
                  <li><!-- start notification -->
                    <a href="/admin/emprestimo/buscar/encerrados">
                      <i class="fa fa-book text-aqua" style="margin-left: 10%;"></i>Empréstimos encerrados 
                      <button type="button" class="btn btn-default" style="display: inline-block; margin-left: 10%;"><?php echo htmlspecialchars( $_SESSION["config"]["numLoan"], ENT_COMPAT, 'UTF-8', FALSE ); ?></button>
                    </a>
                  </li>
                  <?php } ?>
                  <!-- end notification -->
                </ul>
              </li>
              <!-- <li class="footer"><a href="#">View all</a></li> -->
            </ul>
          </li>
          <!-- Tasks Menu -->
          <!-- <li class="dropdown tasks-menu">
            
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                
                <ul class="menu">
                  <li>
                    <a href="#">
                      
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      
                      <div class="progress xs">
                        
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li> -->
          <!-- User Account Menu -->
          <li class="dropdown user user-menu" >
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="/views/adm/admin/dist/img/pda.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo htmlspecialchars( $_SESSION["User"]["nome_bib"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
            </a>
            <ul class="dropdown-menu"  style="height:100px;">
              <!-- The user image in the menu -->
              <li class="user-header" style="background-color: #101fa3;">
                <img src="/views/adm/admin/dist/img/pda.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo htmlspecialchars( $_SESSION["User"]["nome_bib"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                  <small>Matrícula: <?php echo htmlspecialchars( $_SESSION["User"]["matricula_bib"], ENT_COMPAT, 'UTF-8', FALSE ); ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                 /.row 
              </li> -->
              <!-- Menu Footer-->
              <li class="user-footer" style="background-color: #d5e6f0;">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="/admin/logout" class="btn btn-default btn-flat">Sair</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/views/adm/admin/dist/img/pda.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info" style="margin-top: 5%;">
          <p><?php echo htmlspecialchars( $_SESSION["User"]["nome_bib"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
          <!-- Status -->
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">Menus</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="treeview">
          <a href="#"><i class="fa fa-users"></i> <span>Cadastros</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/aluno">Alunos</a></li>
            <li><a href="/admin/item">Livros</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-book"></i> <span>Processos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/emprestimo">Empréstimo</a></li>
          </ul>
        </li>
        <!-- <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li> -->
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
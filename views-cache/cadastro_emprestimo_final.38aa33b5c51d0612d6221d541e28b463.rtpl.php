<?php if(!class_exists('Rain\Tpl')){exit;}?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cadastro de Empréstimos
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="/admin/item">Empréstimos</a></li>
        <li class="active">Cadastrar Empréstimo</li>
      </ol>
    </section>
    
    <!-- <iframe src="" id="frame_tomb" style="display: none;"></iframe>

        <div id="abrirModal" class="modalsb">
            <div class="modaldiv" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title">Título do modal</h5>
                    <a href="#fechar" class="close" title="Fechar" class="fechar" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </a>
                    </div>
                    <div class="modal-body">

                        

                        <form role="form" action="/admin/item/cadastro/buscar" method="post">
                            <label for="titulo">Título</label><br>
                            <input type="text" class="form-control" style="width:100%;" name="titulo" placeholder="Digite o título">


                            </div>
                            <div class="modal-footer">
                                <div class="box-footer">
                                    <a href="/admin/cadastro/item" id="btn-sb"  class="btn btn-default">Voltar</a>
                                    <button type="submit" id="btn-sb" class="btn btn-primary">Buscar</button>
                                </div>
                            </div>
                        </form>

                </div>
                </div>
            </div>
        </div> -->

   
    <!-- Main content -->
   
    <section class="content" >
    
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                <div class="box-header with-border">
                <h3 class="box-title">Novo Empréstimos</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
            <form role="form" action="/admin/cadastra/emprestimo/<?php echo htmlspecialchars( $item["item_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $aluno["leitor_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">

                        <div class="box-body" >

                                <!-- <div class="campos_form">
                                    <div class="form-group">
                                        <label for="titulo">Foto</label><br>
                                        <img src="<?php echo htmlspecialchars( $item["url_img"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="width: 10%;"><br>
                                        <label for="titulo">Título</label><br>
                                        <p><?php echo htmlspecialchars( $item["titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                        <label for="titulo">Código de Tombamento</label><br>
                                        <p><?php echo htmlspecialchars( $item["cod_tomb"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                    </div>

                                    <div class="form-group">
                                        <label for="titulo">Nome do Aluno</label><br>
                                        <p><?php echo htmlspecialchars( $aluno["nome_leitor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                        <label for="titulo">Matrícula</label><br>
                                        <p><?php echo htmlspecialchars( $aluno["matricula_leitor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                        <label for="titulo">Turma</label><br>
                                        <p><?php echo htmlspecialchars( $aluno["turma"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                    </div>

                                </div> -->

                                <div class="campos_form"  style="display: flex;">

                                    <div class="form-group">
                                        <label for="titulo">Foto:</label><br>
                                        <img src="<?php echo htmlspecialchars( $item["url_img"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="width: 25%;"><br>
                                    </div>
                
                                    <div class="form-group">
                                        
                                        <label for="titulo">Título:</label><br>
                                        <p><?php echo htmlspecialchars( $item["titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                        <label for="titulo">Código de Tombamento:</label><br>
                                        <p><?php echo htmlspecialchars( $item["cod_tomb"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                    </div>
                
                                    <div class="form-group">
                                        <label for="titulo">Nome do Aluno:</label><br>
                                        <p><?php echo htmlspecialchars( $aluno["nome_leitor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                        <label for="titulo">Matrícula:</label><br>
                                        <p><?php echo htmlspecialchars( $aluno["matricula_leitor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                    </div>
                
                                    <div class="form-group">
                                        <label for="titulo">Turma:</label><br>
                                        <p><?php echo htmlspecialchars( $aluno["turma"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                    </div>
                
                                </div>
                                
                                <div class="form-group">
                                <label for="data_devol">Data de Devolução</label>
                                <input type="date" class="form-control" id="data_devol" name="data_devol"  placeholder="Digite a data de devolução" required>
                                </div>
                                

                        </div>
                        <!-- /.box-body -->
                        
                        
                    </div>
                    </div>
                </div>

                <div class="box-footer">
                    <a href="/admin/emprestimo"><button type="button" id="btn-sb" class="btn btn-primary">Voltar</button></a>
                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLive">Abrir modal de demonstração</button> -->
                    
                    
                    <button type="submit" id="btn-sb" class="btn btn-success">Cadastrar</button>
                </div>
            </form>
    </section>
    
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    
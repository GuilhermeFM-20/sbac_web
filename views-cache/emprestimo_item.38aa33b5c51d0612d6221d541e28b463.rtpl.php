<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  

    <div id="abrirModal" class="modalsb">
      <div class="modaldiv" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title">Título do modal</h5>

              <img src="" alt="">

              <a href="/admin/item" class="close" title="Fechar" class="fechar" data-dismiss="modal" aria-label="Fechar">
                 <span aria-hidden="true">&times;</span> 
              </a>
              </div>
          </div>
          </div>
      </div>
    </div>


    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Empréstimos</li>
      </ol>
    </section>
  
    <section class="content" style=" margin-top: 2%;">
    
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
  
            <div class="box-header" >
              <h4><b>Buscar Empréstimo</b></h4>
              <!-- <a href="/admin/cadastro/aluno" style="width:14%;" class="btn btn-success">Cadastrar Aluno</a> -->
            </div>  
                <form role="form" action="/admin/busca/emprestimo" method="get">
                    <div class="campos_form" >

                      <div class="form-group" style="width: 20%;">
                        <label for="titulo">Título</label><br>
                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Digite o título" <?php if( isset($_GET["titulo"]) ){ ?>value="<?php echo htmlspecialchars( $_GET["titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"<?php } ?>>
                      </div>

                      <div class="form-group"style="width: 20%;">
                        <label for="cod_tomb">Cód Tombamento</label><br>
                        <input type="value" class="form-control" id="cod_tomb" name="cod_tomb" placeholder="Digite o código de tombamento" <?php if( isset($_GET["cod_tomb"]) ){ ?>value="<?php echo htmlspecialchars( $_GET["cod_tomb"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"<?php } ?>>
                      </div>

                      <div class="form-group"style="width: 20%;">
                        <label for="nome">Nome do Aluno</label><br>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do aluno" <?php if( isset($_GET["nome"]) ){ ?>value="<?php echo htmlspecialchars( $_GET["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"<?php } ?>>
                      </div>

                      <div class="form-group"style="width: 20%;">
                        <label for="matricula">Matrícula</label><br>
                        <input type="value" class="form-control" id="matricula" name="matricula" placeholder="Digite a matrícula" <?php if( isset($_GET["matricula"]) ){ ?>value="<?php echo htmlspecialchars( $_GET["matricula"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"<?php } ?>>
                      </div>

                      <div class="form-group"style="width: 15%;">
                        <label for="matricula">Encerrados</label><br>
                        <select name="encerrados" class="form-control" id="encerrados">
                          <option value=""></option>
                          <option value="Nao">Não</option>
                          <option value="Sim">Sim</option>
                        </select>
                      </div>

                    </div>
  
                    <div class="box-footer">
                      <button type="submit" id="btn-sb" class="btn btn-primary">Buscar</button>
                      <a href="/admin/emprestimo/buscar/item" id="btn-sb"  class="btn btn-success">Cadastrar</a>
                    </div>
                  </form>
                <!-- /.box-body -->
              </div>
        </div>
      </div>
    
    </section>
  
    
    
    <!-- Main content -->
    <section class="content">
    
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
                 
                <div class="box-body no-padding" id="row-grid" style=" height:71%;">
                  <table class="table table-striped" style="border-width:1px;">
                        <thead>
                          <tr>
                            <th>Foto</th>
                            <th>Nome</th>
                            <th>Matrícula</th>
                            <th>Título</th>
                            <th>Cód Tombamento</th>
                            <th>Data Empréstimo</th>
                            <th>Data Devolução</th>
                            <th style="width: 150px"></th>
                          </tr>
                          </thead>
                          <tbody>
                        <?php $counter1=-1;  if( isset($emprestimos) && ( is_array($emprestimos) || $emprestimos instanceof Traversable ) && sizeof($emprestimos) ) foreach( $emprestimos as $key1 => $value1 ){ $counter1++; ?>
                            <tr>
                            <td><img src="<?php echo htmlspecialchars( $value1["url_img"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="foto_liv_item"alt=""></td>
                            <td><?php echo htmlspecialchars( $value1["nome_leitor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["matricula_leitor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["cod_tomb"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo formatDate($value1["dat_emp"]); ?></td>
                            <td><?php echo formatDate($value1["dat_dev"]); ?></td>
                            <td>
                              <!-- <a href="/admin/devolucao_email/<?php echo htmlspecialchars( $value1["id_emp"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-success btn-xs" title="Email Devolução"><i class="fa fa-calendar-plus-o"></i></a> -->
                              <?php if( $value1["status_devo"] == 0  ){ ?>
                              <a href="/admin/renovacao/<?php echo htmlspecialchars( $value1["id_emp"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-success btn-xs" title="Renovação"><i class="fa fa-calendar-plus-o"></i></a>
                              <?php } ?>

                              <?php if( $value1["status_devo"] == 0  ){ ?>
                              <!-- <a href="/admin/devolucao/<?php echo htmlspecialchars( $value1["id_emp"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-info  btn-xs" onclick="confirm('Será efetuada a devolução do item.')"title="Devolução"><i class="fa  fa-dropbox"></i></a>  -->
                              <?php echo showMessageInput('Deseja efetuar a devolução do item?','Aviso','/admin/devolucao/[id]',$value1["id_emp"],'btn-info','fa-dropbox','Devolução',''); ?>
                              <?php } ?>
                              <?php echo showMessageInput('Deseja realmente excluir este registro?','Aviso','/admin/emprestimo/[id]/delete',$value1["id_emp"],'btn-danger','fa-trash','Excluir','Excluir'); ?>
                              <!-- <a href="/admin/emprestimo/<?php echo htmlspecialchars( $value1["id_emp"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a> -->
                            </td>
                            </tr>
                        <?php } ?>
                      </tbody>
                  </table>
                </div> 
    
                <!-- /.box-body -->
              </div>
        </div>
      </div>
      <div class="row" id="row-pages">
        <div class="col-md-12">
            <div class="product-pagination text-center">
                <nav class="nav-pages">
                    <ul class="pagination">

                          
                          <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>

                                <?php if( isset($_GET['page']) && $_GET['page'] == $value1["page"] ){ ?>

                                    <?php if( isset($_GET["nome"]) && isset($_GET["matricula"]) && isset($_GET["titulo"]) && isset($_GET["cod_tomb"]) && isset($_GET["encerrados"]) ){ ?>
                                      <li><a href="?titulo=<?php echo htmlspecialchars( $_GET["titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&cod_tomb=<?php echo htmlspecialchars( $_GET["cod_tomb"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nome=<?php echo htmlspecialchars( $_GET["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&matricula=<?php echo htmlspecialchars( $_GET["matricula"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="background-color: #E7E7E7;" ><?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                                    <?php }else{ ?>
                                      <li><a href="/admin/busca/emprestimo?<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="background-color: #E7E7E7;"  ><?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                                    <?php } ?>

                                <?php }else{ ?>

                                    <?php if( isset($_GET["nome"]) && isset($_GET["matricula"]) && isset($_GET["titulo"]) && isset($_GET["cod_tomb"]) && isset($_GET["encerrados"]) ){ ?>
                                      <li><a href="?titulo=<?php echo htmlspecialchars( $_GET["titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&cod_tomb=<?php echo htmlspecialchars( $_GET["cod_tomb"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nome=<?php echo htmlspecialchars( $_GET["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&matricula=<?php echo htmlspecialchars( $_GET["matricula"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                                    <?php }else{ ?>
                                      <li><a href="/admin/busca/emprestimo?<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                                    <?php } ?>

                                <?php } ?>
                            
                          <?php } ?>
                          
                      
                    </ul>
                </nav>                        
            </div>
        </div>
      </div>
    
    </section>
  
    
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
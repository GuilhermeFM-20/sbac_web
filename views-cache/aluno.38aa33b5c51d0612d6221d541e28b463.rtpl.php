<?php if(!class_exists('Rain\Tpl')){exit;}?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Alunos</li>
    </ol>
  </section>

  <section class="content" style=" margin-top: 2%;">

    <?php echo showMessage($setMsg["msg"],$setMsg["tipo"]); ?>
  
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">

          

          <div class="box-header" >
            <h4><b>Buscar Alunos</b></h4>
            <!-- <a href="/admin/cadastro/aluno" style="width:14%;" class="btn btn-success">Cadastrar Aluno</a> -->
          </div> 

              <form role="form" action="/admin/busca/aluno" method="get">
                  <div class="campos_form" >
                    <div class="form-group">
                    <label for="desproduct">Nome</label><br>
                    <input type="text" class="form-control" id="desproduct" name="nome" placeholder="Digite o nome" <?php if( isset($_GET["nome"]) ){ ?>value="<?php echo htmlspecialchars( $_GET["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"<?php } ?>>
                    </div>
                    <div class="form-group">
                    <label for="vlprice">Matrícula</label><br>
                    <input type="value" class="form-control" id="vlprice" name="matricula" placeholder="Digite a matrícula escolar" <?php if( isset($_GET["matricula"]) ){ ?>value="<?php echo htmlspecialchars( $_GET["matricula"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"<?php } ?>>
                    </div>
                  </div>

                  <div class="box-footer">
                    <button type="submit" id="btn-sb" class="btn btn-primary">Buscar</button>
                    <a href="/admin/cadastro/aluno" id="btn-sb"  class="btn btn-success">Cadastrar</a>
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
               
              <div class="box-body no-padding" id="row-grid">
                <table class="table table-striped" style="border-width:1px;">
                      <thead>
                        <tr>
                          <th>Nome do Aluno</th>
                          <th>Matrícula</th>
                          <th>Email</th>
                          <th>Sexo</th>
                          <th>Turma</th>
                          <th>Telefone</th>
                          <th style="width: 170px"></th>
                        </tr>
                        </thead>
                        <tbody>
                      <?php $counter1=-1;  if( isset($alunos) && ( is_array($alunos) || $alunos instanceof Traversable ) && sizeof($alunos) ) foreach( $alunos as $key1 => $value1 ){ $counter1++; ?>
                          <tr>
                          <td><?php echo htmlspecialchars( $value1["nome_leitor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                          <td><?php echo htmlspecialchars( $value1["matricula_leitor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                          <td><?php echo htmlspecialchars( $value1["email_leitor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                          <td><?php echo htmlspecialchars( $value1["sexo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                          <td><?php echo htmlspecialchars( $value1["turma"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                          <td><?php echo htmlspecialchars( $value1["telefone_leitor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                          <td>
                            <a href="/admin/aluno/card/<?php echo htmlspecialchars( $value1["leitor_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-credit-card"></i></a>
                            <a href="/admin/aluno/<?php echo htmlspecialchars( $value1["leitor_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                            <?php echo showMessageInput('Deseja realmente excluir este registro?','Aviso','/admin/aluno/[id]/delete',$value1["leitor_id"]); ?>
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

                                      <?php if( isset($_GET["nome"]) && isset($_GET["matricula"])  ){ ?>
                                        <li><a href="?nome=<?php echo htmlspecialchars( $_GET["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&matricula=<?php echo htmlspecialchars( $_GET["matricula"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="background-color: #E7E7E7;" ><?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                                      <?php }else{ ?>
                                        <li><a href="/admin/busca/aluno?<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="background-color: #E7E7E7;"  ><?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                                      <?php } ?>

                                  <?php }else{ ?>

                                      <?php if( isset($_GET["nome"]) && isset($_GET["matricula"])  ){ ?>
                                        <li><a href="?nome=<?php echo htmlspecialchars( $_GET["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&matricula=<?php echo htmlspecialchars( $_GET["matricula"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                                      <?php }else{ ?>
                                        <li><a href="/admin/busca/aluno?<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
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
  
  
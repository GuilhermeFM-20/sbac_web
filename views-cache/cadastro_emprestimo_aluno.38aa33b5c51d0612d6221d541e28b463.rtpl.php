<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  
    <section class="content-header">
        <h1>
            Cadastro de Empréstimos
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="/admin/item">Empréstimos</a></li>
            <li class="active"><a href="/admin/cadastro/emprestimo/item">Selecionar Item do Empréstimo</a></li>
            <li class="active">Selecionar Aluno do Empréstimo</li>
          </ol>
    </section>
  
    <section class="content" style=" margin-top: 2%;">
    
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
  
            <div class="box-header" >
              <h4><b>Buscar Alunos</b></h4>
              <!-- <a href="/admin/cadastro/aluno" style="width:14%;" class="btn btn-success">Cadastrar Aluno</a> -->
            </div>  
                <form role="form" action="/admin/emprestimo/buscar/aluno" method="post">
                    <div class="campos_form" >
                      <div class="form-group">
                      <label for="nome">Nome</label><br>
                      <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome">
                      </div>
                      <div class="form-group">
                      <label for="matricula">Matrícula</label><br>
                      <input type="value" class="form-control" id="matricula" name="matricula" placeholder="Digite a matrícula escolar">
                      </div>
                    </div>
  
                    <div class="box-footer">
                      <button type="submit" id="btn-sb" class="btn btn-primary">Buscar</button>
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
                 
                <div class="box-body no-padding" id="row-grid" style=" height:347px;">
                  <table class="table table-striped" style="border-width:1px;" >
                        <thead>
                          <tr>
                            <th>Nome do Aluno</th>
                            <th>Matrícula</th>
                            <th>Email</th>
                            <th>Sexo</th>
                            <th>Turma</th>
                            <th>Telefone</th>
                            <th style="width: 50px"></th>
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
                                <a href="/admin/cadastro/emprestimo/aluno/<?php echo htmlspecialchars( $value1["leitor_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $item, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Selecionar</a>
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
      <!-- <div class="row">
        <div class="col-md-12">
            <div class="product-pagination text-center">
                <nav>
                    <ul class="pagination">
                    <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
                    <li><a href="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                    <?php } ?>
                    </ul>
                </nav>                        
            </div>
        </div>
      </div> -->
    
    </section>
  
    
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
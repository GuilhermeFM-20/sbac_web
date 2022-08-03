<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista de Alunos
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="/admin/aluno">Alunos</a></li>
        <li class="active">Modifica Aluno</li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
    
      <div class="row">
          <div class="col-md-12">
              <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Editar Aluno</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="/admin/aluno/<?php echo htmlspecialchars( $aluno["leitor_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="box-body" >

                    <div class="campos_form">
                        <div class="form-group">
                        <label for="desproduct">Nome</label><br>
                        <input type="text" class="form-control" id="desproduct" name="nome" placeholder="Digite o nome" value="<?php echo htmlspecialchars( $aluno["nome_leitor"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        </div>
                        <div class="form-group">
                        <label for="vlprice">Matrícula</label><br>
                        <input type="value" class="form-control" id="vlprice" name="matricula" placeholder="Digite a matrícula escolar" value="<?php echo htmlspecialchars( $aluno["matricula_leitor"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        </div>
                    </div>
                    
                    <div class="campos_form">
                        <div class="form-group">
                        <label for="vlwidth">Telefone</label>
                        <input type="text" class="form-control" id="vlwidth" name="telefone"  placeholder="(00) 00000-0000" value="<?php echo htmlspecialchars( $aluno["telefone_leitor"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        </div>
                        <div class="form-group">
                        <label for="vlheight">Turma</label>
                        <input type="text" class="form-control" id="vlheight" name="turma" placeholder="Digite a turma e ano" value="<?php echo htmlspecialchars( $aluno["turma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        </div>
                    </div>

                    <div class="campos_form">
                        <div class="form-group">
                            <label>Sexo</label>
                            <select class="form-control" name="sexo" value="<?php echo htmlspecialchars( $aluno["sexo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            <option>Masculino</option>
                            <option>Feminino</option>
                            </select>
                            </div>
                        <div class="form-group">
                        <label for="desurl">E-mail</label>
                        <input type="mail" class="form-control" id="desurl" name="email" name="vlheight" placeholder="Digite o email para contato" value="<?php echo htmlspecialchars( $aluno["email_leitor"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        </div>
                    </div>
            </div>
              </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="/admin/aluno"><button type="button"  id="btn-sb" class="btn btn-primary">Voltar</button></a>
                <button type="submit" id="btn-sb" class="btn btn-success">Salvar</button>
              </div>
            </form>
          </div>
          </div>
      </div>
    
    </section>
    <!-- /.content -->
    <!-- /.content-wrapper -->

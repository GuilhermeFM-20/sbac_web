<?php if(!class_exists('Rain\Tpl')){exit;}?>

<!-- Content Wrapper. Contains page content -->


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cadastro de Alunos
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="/admin/aluno">Alunos</a></li>
        <li class="active">Cadastrar Aluno</li>
      </ol>
    </section>
    
    <iframe src="" id="frame_matricula" style="display: none;"></iframe>
    <!-- Main content -->
    <section class="content" >
    
        


        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                <div class="box-header with-border">
                <h3 class="box-title">Novo Aluno</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <!-- <?php if( $setMsg["msg"] != '' ){ ?>
                    <div class="alert alert-success">
                        <?php echo htmlspecialchars( $setMsg["msg"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                    </div>
                <?php } ?>   -->
                    
            <?php echo showMessage($setMsg["msg"],$setMsg["tipo"]); ?>

            <form role="form" action="/admin/cadastra/aluno" method="post">

                        <div class="box-body" >

                                <div class="campos_form">
                                    <div class="form-group">
                                    <label for="desproduct">Nome</label><br>
                                    <input type="text" class="form-control" id="nome" value="<?php echo htmlspecialchars( $aluno["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="nome" placeholder="Digite o nome" required>
                                    </div>
                                    <div class="form-group">
                                    <label for="vlprice">Matrícula</label><br>
                                    <input type="value" class="form-control" id="matricula" value="<?php echo htmlspecialchars( $aluno["matricula"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="matricula" placeholder="Digite a matrícula escolar" onchange="verifica_matricula()" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
                                    </div>
                                </div>
                                
                                <div class="campos_form">
                                    <div class="form-group">
                                    <label for="vlwidth">Telefone</label>
                                    <input type="text" class="form-control" id="telefone" value="<?php echo htmlspecialchars( $aluno["telefone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="telefone"   oninput="this.value = this.value.replace(/\D/g, '').replace(/^(\d{2})(\d{4,5})(\d{4})$/, '($1) $2-$3');" maxlength="12" required>
                                    </div>
                                    <div class="form-group">
                                    <label for="vlheight">Turma</label>
                                    <input type="text" class="form-control" id="turma" value="<?php echo htmlspecialchars( $aluno["turma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="turma" placeholder="Digite a turma e ano"  required>
                                    </div>
                                </div>

                                <div class="campos_form">
                                    <div class="form-group">
                                        <label>Sexo</label>
                                        <select class="form-control" value="<?php echo htmlspecialchars( $aluno["sexo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="sexo">
                                        <option>Masculino</option>
                                        <option>Feminino</option>
                                        </select>
                                        </div>
                                    <div class="form-group">
                                    <label for="desurl">E-mail</label>
                                    <input type="mail" class="form-control" id="email" value="<?php echo htmlspecialchars( $aluno["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="email"  placeholder="Digite o email para contato" required>
                                    </div>
                                </div>
                        </div>
                        <!-- /.box-body -->
                        
                        
                    </div>
                    </div>
                </div>

                <div class="box-footer">
                    <a href="/admin/aluno"><button type="button" id="btn-sb" class="btn btn-primary">Voltar</button></a>
                    <button type="submit" id="btn-sb" class="btn btn-success">Cadastrar</button>
                </div>
            </form>
    </section>
    
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
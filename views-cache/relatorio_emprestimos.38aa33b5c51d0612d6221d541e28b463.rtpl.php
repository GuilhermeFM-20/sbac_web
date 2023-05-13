<?php if(!class_exists('Rain\Tpl')){exit;}?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Relatório de Empréstimos</li>
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
                  <form role="form" action="/admin/relatorios/emprestimos/buscar" method="post" target="_blank">
                      <div class="campos_form" >
  
                        <div class="form-group" style="width: 20%;">
                          <label for="dataI">Data Inicial:</label><br>
                          <input type="date" class="form-control" id="dataI" name="dataI" placeholder="Digite a data incial">
                        </div>

                        <div class="form-group"style="width: 20%;">
                          <label for="dataF">Data Final:</label><br>
                          <input type="date" class="form-control" id="dataF" name="dataF" placeholder="Digite a data final">
                        </div>
  
                        <div class="form-group"style="width: 20%;">
                          <label for="cod_tomb">Cód Tombamento</label><br>
                          <input type="value" class="form-control" id="cod_tomb" name="cod_tomb" placeholder="Digite o código de tombamento">
                        </div>
  
                        <div class="form-group"style="width: 20%;">
                          <label for="matricula">Matrícula</label><br>
                          <input type="value" class="form-control" id="matricula" name="matricula" placeholder="Digite a matrícula">
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

                      <div class="campos_form" >
  
                        <div class="form-group" >
                          <label for="titulo">Título</label><br>
                          <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Digite o título">
                        </div>
    
                        <div class="form-group">
                          <label for="nome">Nome do Aluno</label><br>
                          <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do aluno" style="width: 99%;">
                        </div>
                       
                      </div>
    
                      <div class="box-footer">
                        <button type="submit" id="btn-sb" class="btn btn-primary">Gerar</button>
                      </div>
                    </form>
                  <!-- /.box-body -->
                </div>
          </div>
        </div>
      
      </section>
  
    
    <!-- /.content -->
    </div>
    
    
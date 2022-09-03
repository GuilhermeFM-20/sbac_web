<?php if(!class_exists('Rain\Tpl')){exit;}?>

<!-- Content Wrapper. Contains page content -->
<script>

    function verifica_tomb(){

        var tomb = document.getElementById('cod_tomb').value;
        
        var frame = document.getElementById('frame_tomb');

        frame.setAttribute('src','/admin/item/cadastro/verifica/'+tomb);

        alert(num);

        

    }
    
   
    

</script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cadastro de Itens
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="/admin/item">Itens</a></li>
        <li class="active">Cadastrar Item</li>
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
                <h3 class="box-title">Novo Item</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
            <form role="form" action="/admin/cadastra/item" method="post">

                        <div class="box-body" >

                                <div class="campos_form">
                                    <div class="form-group">
                                    <label for="titulo">Título</label><br>
                                    <input type="text" class="form-control" id="nomr" name="titulo" placeholder="Digite o título" required>
                                    </div>
                                    <div class="form-group">
                                    <label for="cod_tomb">Código de Tombamento</label><br>
                                    <input type="value" class="form-control" id="cod_tomb" name="cod_tomb" placeholder="Digite o código" onchange="verifica_tomb()" required>
                                    </div>
                                </div>
                                
                                <div class="campos_form">
                                    <div class="form-group">
                                    <label for="origem">Origem</label>
                                    <input type="text" class="form-control" id="origem" name="origem"  placeholder="Digite a origem" required>
                                    </div>
                                    <div class="form-group">
                                    <label for="data_aq">Data Aquisição</label>
                                    <input type="date" class="form-control" id="data_aq" name="data_aq" placeholder="00/00/0000" required >
                                    </div>
                                </div>

                                <div class="campos_form">
                                    <div class="form-group">
                                        <label for="autor">Autor</label>
                                        <input type="text" class="form-control" id="autor" name="autor"  placeholder="Digite o nome do autor" required>
                                        </div>
                                        <div class="form-group">
                                        <label for="editora">Editora</label>
                                        <input type="text" class="form-control" id="editora" name="editora" placeholder="Digite o nome da editora" required>
                                        </div>
                                </div>

                                <div class="campos_form">
                                    <div class="form-group">
                                        <label for="data_publ">Data de Publicação</label>
                                        <input type="date" class="form-control" id="data_publ" name="data_publ"  placeholder="Digite a datar" required>
                                        </div>
                                        <div class="form-group">
                                        <label for="foto">Foto</label>
                                        <input type="text" class="form-control" id="foto" name="foto"  placeholder="Adicione a URL de uma foto" required>
                                        </div>
                                </div>
                                <div class="form-group-text">
                                        <label for="descricao">Descrição</label>
                                        <textarea class="form-control" rows="6" id="descricao" name="descricao"  placeholder="Adicione a descrição do livro" style="resize: none"></textarea>
                                    
                                </div>
                        </div>
                        <!-- /.box-body -->
                        
                        
                    </div>
                    </div>
                </div>

                <div class="box-footer">
                    <a href="/admin/item"><button type="button" id="btn-sb" class="btn btn-primary">Voltar</button></a>
                    <button type="submit" id="btn-sb" class="btn btn-success">Cadastrar</button>
                </div>
            </form>
    </section>
    
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
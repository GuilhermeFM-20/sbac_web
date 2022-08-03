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
                <h3 class="box-title">Novo Empréstimo</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
            <form role="form" action="/admin/cadastra/item" method="post">

                        <div class="box-body" >

                                <div class="campos_form">
                                    <div class="form-group">
                                    <label for="titulo">Título</label><br>
                                    <!-- <input type="text"  name="titulo" placeholder="Digite o título" required> -->
                                    <select name="titulo" class="form-control" id="nomr" id="color" required>
                                        <option value="">--- Selecione um item ---</option>
                                        <?php $counter1=-1;  if( isset($itens) && ( is_array($itens) || $itens instanceof Traversable ) && sizeof($itens) ) foreach( $itens as $key1 => $value1 ){ $counter1++; ?>
                                        <option value="<?php echo htmlspecialchars( $value1["titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                                        <?php } ?>
                                    </select>
                                    </div>

                                   

                                    <div class="form-group">
                                    <label for="cod_tomb">Nome do Aluno</label><br>
                                    <input type="value" class="form-control" id="cod_tomb" name="cod_tomb" placeholder="Digite o código" onchange="verifica_tomb()" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                <label for="data_devol">Data de Devolução</label>
                                <input type="text" class="form-control" id="data_devol" name="data_devol"  placeholder="Digite a data de devolução" required>
                                </div>
                                

                        </div>
                        <!-- /.box-body -->
                        
                        
                    </div>
                    </div>
                </div>

                <div class="box-footer">
                    <a href="/admin/emprestimo"><button type="button" id="btn-sb" class="btn btn-primary">Voltar</button></a>
                    <button type="submit" id="btn-sb" class="btn btn-success">Cadastrar</button>
                </div>
            </form>
    </section>
    
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
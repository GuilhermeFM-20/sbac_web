<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/item"><i class="fa fa-dashboard"></i> Item</a></li>
        <li class="active">Buscar Livro</li>
      </ol>
    </section>
  
    <section class="content" style=" margin-top: 2%;">
    
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
  
            <div class="box-header" >
              <h4><b>Buscar Itens</b></h4>
              <!-- <a href="/admin/cadastro/aluno" style="width:14%;" class="btn btn-success">Cadastrar Aluno</a> -->
            </div>  
                <form role="form" action="/admin/item/cadastro/buscar" method="post">
                    <div class="campos_form" >
                      <div class="form-group">
                        <label for="titulo">Título</label><br>
                        <input type="text" class="form-control" style="width:100%;" name="titulo" placeholder="Digite o título" required>
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
          <div class="box box-primary" >
                 
                <div class="box-body no-padding" id="row-grid-scroll" >
                  <table class="table table-striped" style="border-width:1px;">
                        <thead>
                          <tr>
                            <th>Foto</th>
                            <th>Título</th>
                            <th>Origem</th>
                            <th>Autor</th>
                            <th>Editora</th>
                            <th>Data de Publicação</th>
                            <th style="width: 50px"></th>
                          </tr>
                          </thead>
                          <tbody>
                        <?php $counter1=-1;  if( isset($livros) && ( is_array($livros) || $livros instanceof Traversable ) && sizeof($livros) ) foreach( $livros as $key1 => $value1 ){ $counter1++; ?>
                            <tr>
                            <td><img src="<?php echo htmlspecialchars( $value1["foto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="foto_liv_item" alt=""></td>
                            <td><?php echo htmlspecialchars( $value1["titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["autor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["editora"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["data_publ"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td>
                              <a href="/admin/cadastro/item/net/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
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
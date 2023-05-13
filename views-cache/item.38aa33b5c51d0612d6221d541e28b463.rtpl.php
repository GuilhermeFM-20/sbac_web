<?php if(!class_exists('Rain\Tpl')){exit;}?>
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
        <li class="active">Itens</li>
      </ol>
    </section>
  
    <section class="content" style=" margin-top: 2%;">

      <?php echo showMessage($setMsg["msg"],$setMsg["tipo"]); ?>
    
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
  
            <div class="box-header" >
              <h4><b>Buscar Itens</b></h4>
              <!-- <a href="/admin/cadastro/aluno" style="width:14%;" class="btn btn-success">Cadastrar Aluno</a> -->
            </div>  
                <form role="form" action="/admin/busca/item" method="get">
                    <div class="campos_form" >
                      <div class="form-group">
                      <label for="titulo">Título</label><br>
                      <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Digite o título" <?php if( isset($_GET["titulo"]) ){ ?>value="<?php echo htmlspecialchars( $_GET["titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"<?php } ?>>
                      </div>
                      <div class="form-group">
                      <label for="cod_tomb">Cód Tombamento</label><br>
                      <input type="value" class="form-control" id="cod_tomb" name="cod_tomb" placeholder="Digite o código de tombamento"  <?php if( isset($_GET["cod_tomb"]) ){ ?>value="<?php echo htmlspecialchars( $_GET["cod_tomb"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"<?php } ?>>
                      </div>
                    </div>
  
                    <div class="box-footer">
                      <button type="submit" id="btn-sb" class="btn btn-primary">Buscar</button>
                      <a href="/admin/cadastro/item" id="btn-sb"  class="btn btn-success">Cadastrar</a>
                      <a href="/admin/cadastro/item/net" id="btn-sb"  class="btn btn-info">Buscar Livro</a>
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
                            <th>Foto</th>
                            <th>Título</th>
                            <th>Cód Tombamento</th>
                            <th>Origem</th>
                            <th>Data Aquisição</th>
                            <th>Autor</th>
                            <th>Editora</th>
                            <th>Data de Publicação</th>
                            <th style="width: 150px"></th>
                          </tr>
                          </thead>
                          <tbody>
                        <?php $counter1=-1;  if( isset($itens) && ( is_array($itens) || $itens instanceof Traversable ) && sizeof($itens) ) foreach( $itens as $key1 => $value1 ){ $counter1++; ?>
                            <tr>
                            <td><img src="<?php echo htmlspecialchars( $value1["url_img"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="foto_liv_item"alt=""></td>
                            <td><?php echo htmlspecialchars( $value1["titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["cod_tomb"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                          <td><?php echo formatDate($value1["data_aq"]); ?></td>
                            <td><?php echo htmlspecialchars( $value1["autor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["editora"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo formatDate($value1["data_publ"]); ?></td>
                            <td>
                              <a href="/admin/item/<?php echo htmlspecialchars( $value1["item_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                              <a href="/admin/item/<?php echo htmlspecialchars( $value1["item_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
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

                                    <?php if( isset($_GET["titulo"]) && isset($_GET["cod_tomb"]) ){ ?>
                                      <li><a href="?titulo=<?php echo htmlspecialchars( $_GET["titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&cod_tomb=<?php echo htmlspecialchars( $_GET["cod_tomb"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="background-color: #E7E7E7;" ><?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                                    <?php }else{ ?>
                                      <li><a href="/admin/busca/item?<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="background-color: #E7E7E7;"  ><?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                                    <?php } ?>

                                <?php }else{ ?>

                                    <?php if( isset($_GET["titulo"]) && isset($_GET["cod_tomb"]) ){ ?>
                                      <li><a href="?titulo=<?php echo htmlspecialchars( $_GET["titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&cod_tomb=<?php echo htmlspecialchars( $_GET["cod_tomb"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                                    <?php }else{ ?>
                                      <li><a href="/admin/busca/item?<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
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
    
<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista de Itens
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="/admin/item">Itens</a></li>
        <li class="active">Modifica Item</li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
    
      <div class="row-grid-scroll">
          <div class="col-md-12">
              <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Editar Item</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="/admin/item/<?php echo htmlspecialchars( $itens["item_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="box-body" >

                    <div class="campos_form">
                        <div class="form-group">
                        <label for="titulo">Título</label><br>
                        <input type="text" class="form-control" id="nomr" name="titulo" placeholder="Digite o título" value="<?php echo htmlspecialchars( $itens["titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
                        </div>
                        <div class="form-group">
                        <label for="cod_tomb">Código de Tombamento</label><br>
                        <input type="value" class="form-control" id="cod_tomb" name="cod_tomb" placeholder="Digite o código" onchange="verifica_tomb()" value="<?php echo htmlspecialchars( $itens["cod_tomb"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
                        </div>
                    </div>
                    
                    <div class="campos_form">
                        <div class="form-group">
                        <label for="origem">Origem</label>
                        <input type="text" class="form-control" id="origem" name="origem"  placeholder="Digite a origem" value="<?php echo htmlspecialchars( $itens["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
                        </div>
                        <div class="form-group">
                        <label for="data_aq">Data Aquisição</label>
                        <input type="text" class="form-control" id="data_aq" name="data_aq" placeholder="00/00/0000" value="<?php echo htmlspecialchars( $itens["data_aq"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required >
                        </div>
                    </div>

                    <div class="campos_form">
                        <div class="form-group">
                            <label for="autor">Autor</label>
                            <input type="text" class="form-control" id="autor" name="autor"  placeholder="Digite o nome do autor" value="<?php echo htmlspecialchars( $itens["autor"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
                            </div>
                            <div class="form-group">
                            <label for="editora">Editora</label>
                            <input type="text" class="form-control" id="editora" name="editora" placeholder="Digite o nome da editora" value="<?php echo htmlspecialchars( $itens["editora"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
                            </div>
                    </div>
                    <div class="campos_form">
                      <div class="form-group">
                          <label for="data_publ">Data de Publicação</label>
                          <input type="text" class="form-control" id="data_publ" name="data_publ" value="<?php echo htmlspecialchars( $itens["data_publ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Digite a datar" required>
                          </div>
                          <div class="form-group">
                          <label for="url_img">Foto</label>
                          <input type="text" class="form-control" id="url_img" name="url_img"  value="<?php echo htmlspecialchars( $itens["url_img"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Adicione a URL de uma foto" required>
                      </div>
                    </div>
                    <div class="form-group-text">
                      <label for="descricao">Descrição</label>
                      <textarea class="form-control" rows="3" id="descricao" name="descricao"  placeholder="Adicione a descrição do livro" style="resize: none"><?php echo htmlspecialchars( $itens["descricao_item"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>
                    </div>

            </div>
              </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="/admin/item"><button type="button" id="btn-sb" class="btn btn-primary">Voltar</button></a>
                <button type="submit" id="btn-sb" class="btn btn-success">Salvar</button>
              </div>
            </form>
          </div>
          </div>
      </div>
    
    </section>
    <!-- /.content -->
    <!-- /.content-wrapper -->

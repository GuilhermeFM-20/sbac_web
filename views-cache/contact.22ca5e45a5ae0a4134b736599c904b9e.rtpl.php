<?php if(!class_exists('Rain\Tpl')){exit;}?><link rel="stylesheet" href="/views/adm/admin/bootstrap/css/bootstrap.min.css"> 
    

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img" style="background-image: url(/views/img/bg-img/bib2.jpg);">
        <div class="bradcumbContent">
            <h2 style="font-weight: 700; margin-top: 1px;">Biblioteca</h2>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### About Us Area Start ##### -->
    <section class="about-us-area mt-50 section-padding-100">

        <form action="/contact/busca/item" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="titulo" name="titulo" placeholder="Digite o título" class="form-control" placeholder="Search...">
                  <span class="input-group-btn">
                    <button type="submit"  id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                  </span>
            </div>
         </form>

        <div class="container">
            
                <div class="row">
                    <div class="col-12">
                        <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="300ms">
                            <h3>Veja os livros da nossa biblioteca!</h3>
                        </div>
                    </div>
                </div>
         
                        <!-- <div class="section-heading text-center mx-auto wow fadeInUp"  -->
                <div class="row wow fadeInUp" data-wow-delay="300ms" >
                    <?php $counter1=-1;  if( isset($itens) && ( is_array($itens) || $itens instanceof Traversable ) && sizeof($itens) ) foreach( $itens as $key1 => $value1 ){ $counter1++; ?>
                        <div class="row_books" style="display: flex;">

                            <div class="div_img" >
                                <img src="<?php echo htmlspecialchars( $value1["url_img"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="img_bib" id="img_bib" style="vertical-align: none;" >
                            </div>
                            <div style="margin: 4% 4% 0 4%;">
                                <label class="label_books">Título:</label>
                                <p><?php echo htmlspecialchars( $value1["titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                <label class="label_books">Autor:</label>
                                <p><?php echo htmlspecialchars( $value1["autor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                            </div>
                            <div style="margin: 4% 0 0 0;">
                                <label class="label_books">Editora:</label>
                                <p><?php echo htmlspecialchars( $value1["editora"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                <label class="label_books">Código de Tombamento:</label>
                                <p><?php echo htmlspecialchars( $value1["cod_tomb"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                            </div>
                            
                        </div>
                    <?php } ?>
                </div>
                <div class="row" id="row-pages">
                    
                    <div class="col-md-12">
                        <div class="product-pagination text-center">
                            <nav class="nav-pages">
                                <ul class="pagination">
            
                                      
                                      <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
            
                                            <?php if( isset($_GET['page']) && $_GET['page'] == $value1["page"] ){ ?>
            
                                                <?php if( isset($_GET["titulo"]) ){ ?>
                                                  <li><a href="?titulo=<?php echo htmlspecialchars( $_GET["titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>#img_bib" style="background-color: #E7E7E7;" ><?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                                                <?php }else{ ?>
                                                  <li><a href="/contact/busca/item?<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>#img_bib" style="background-color: #E7E7E7;"  ><?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                                                <?php } ?>
            
                                            <?php }else{ ?>
            
                                                <?php if( isset($_GET["titulo"]) ){ ?>
                                                  <li><a href="?titulo=<?php echo htmlspecialchars( $_GET["titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>#img_bib"><?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                                                <?php }else{ ?>
                                                  <li><a href="/contact/busca/item?<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>#img_bib"><?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                                                <?php } ?>
            
                                            <?php } ?>
                                        
                                      <?php } ?>
                                      
                                  
                                </ul>
                            </nav>                        
                        </div>
                    </div>
                  </div>
        </div>

        
    </section>

    
    <!-- ##### About Us Area End ##### -->

    <!-- ##### Team Area Start ##### -->
    
    <!-- ##### Features Area Start ##### -->

 
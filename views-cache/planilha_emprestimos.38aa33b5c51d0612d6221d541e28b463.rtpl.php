<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Empréstimos</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="/views/adm/admin/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/views/adm/admin/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
  
    -->
  
    <link rel="icon" href="/views/img/core-img/icon2.png">
  
    <link rel="stylesheet" href="/views/adm/admin/dist/css/skins/skin-blue.min.css">
</head>
<body>

    <table>
        <tr >
            <th style="width: 79%; padding-left: 30%;">
                <img src="/views/img/core-img/logo_sbac2.png" style=" width: 300px;">
            </th>
            <th style="text-align: right; padding-left: 10px; font-size: 8px;">
                <p>Gerado: <?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                <p >SBAC - Escola Estadual Professor Abel Freire Coelho</p>
            </th>
        </tr>
    </table>

    <div class="row" >
        <div class="col-md-12">
          <div class="box box-primary">
                 
                <div class="box-body no-padding">
                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info" style="font-size: 10px;">
                        <thead>
                          <tr>
                            <th>Nome</th>
                            <th>Matrícula</th>
                            <th>Título</th>
                            <th>Cód Tombamento</th>
                            <th>Data Empréstimo</th>
                            <th>Data Devolução</th>
                          </tr>
                          </thead>
                          <tbody>
                        <?php $counter1=-1;  if( isset($emprestimos) && ( is_array($emprestimos) || $emprestimos instanceof Traversable ) && sizeof($emprestimos) ) foreach( $emprestimos as $key1 => $value1 ){ $counter1++; ?>
                            <tr>
                            <td><?php echo htmlspecialchars( $value1["nome_leitor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["matricula_leitor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["cod_tomb"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["dat_emp"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["dat_dev"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            </tr>
                        <?php } ?>
                      </tbody>
                  </table>
                </div> 
    
                <!-- /.box-body -->
              </div>
        </div>
      </div>
    
</body>
</html>
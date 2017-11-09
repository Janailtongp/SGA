<?php
    include("head.php");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        

      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
          <?php
                if (isset($_GET['id'])){
                    $id = (int)$_GET['id'];
                    $idUsu = $_SESSION['idUSU'];
                    $conn = F_conect();
                    $result = mysqli_query($conn, "Select * from iquilino where id_usuario=" . $idUsu." and id=".$id);
                      if (mysqli_num_rows($result) >=1){
                            while ($row = $result->fetch_assoc()) {
                                $nome=$row['nome'];
                                $email=$row['email'];
                                $telefone=$row['telefone'];
                             }
                      }else{
                         
                          echo "<script language= 'JavaScript'>
                                        location.href='erro.php'
                                </script>";
                      }
                        $conn->close();

                }else{
                    echo "<script language= 'JavaScript'>
                                        location.href='erro.php'
                                </script>";
        
    }
          ?>
        <section class="col-lg-12 connectedSortable">
            <div class="col-xs-12">
                 <form class="form-group" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input class="form-control" name="nome" type="text" placeholder="Nome" value="<?php echo $nome; ?>" required>
                        </div> 
                        <div class="form-group">
                            <input class="form-control" name="email" type="email" placeholder="Email" value="<?php echo $email; ?>" required>
                        </div>  
                        <div class="form-group">
                            <input class="form-control" name="telefone" type="text"  placeholder="Telefone"  value="<?php echo $telefone; ?>"required>
                        </div>
                     

                        <button type="submit" class="btn btn-default" name="botao">Atualizar</button>
                         <button type="button" onClick="javascript:window.history.go(-1);" class="btn btn-info">Voltar</button> 
                    </form>
        <?php
            require_once '../Controller/IquilinoController.php';
            if (isset($_POST["botao"])) {
                    $objControl = new IquilinoController();
                    $objControl->atualizar($_POST["nome"], $_POST["email"], $_POST["telefone"],$_SESSION['idUSU'] ,$id);
            }
        ?>     

                    <br/>

                </div>
           
       

          

        </section>
     
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
<?php
    include("foot.php");
?>
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
                    $result = mysqli_query($conn, "SELECT * FROM propriedade WHERE id_proprietario=" . $idUsu." and id=".$id);
                      if (mysqli_num_rows($result) ==1){
                            while ($row = $result->fetch_assoc()) {
                                $rua = $row['rua'];
                                $bairro = $row['bairro'];
                                $cidade = $row['cidade'];
                                $cep = $row['cep'];
                                $situacao = $row['situacao'];
                                $obs = $row['observacao'];
                                $numero = $row['numero'];
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
                            <input class="form-control" name="rua" type="text" placeholder="Rua" value="<?php echo $rua;?>" required>
                        </div> 
                        <div class="form-group">
                            <input class="form-control" name="numero" type="text" placeholder="Número" value="<?php echo $numero;?>"required>
                        </div>  
                        <div class="form-group">
                            <input class="form-control" name="bairro" type="text"  placeholder="Bairro" value="<?php echo $bairro;?>"required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="cidade" type="text" placeholder="Cidade" value="<?php echo $cidade;?>" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="cep" type="text" placeholder="CEP" value="<?php echo $cep ;?>" required>
                        </div>
                       <select class="form-control" name="situacao" placeholder="Situação">
                    <option value="Disponível">Disponível</option>
                    <option value="Indisponível">Indisponível</option>
                 
                  </select>
                        <div class="form-group">
                            <input class="form-control" name="obs" type="text" placeholder="Observação" value="<?php echo $obs;?>"required>
                        </div>
                        <button type="submit" class="btn btn-default" name="botao">Atualizar</button>
                    </form>
        <?php
            require_once '../Controller/PropiedadeController.php';
            if (isset($_POST["botao"])) {
                    $objControl = new PropiedadeController();
                    $objControl->atualizar($id, $_POST["bairro"], $_POST["rua"], $_POST["cep"], 
                            $_POST['cidade'], $_POST["numero"], $_POST["obs"], $_POST["situacao"]);
            }
        ?>     

                    <br/>

                </div>
           
       

          

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

          <!-- Map box -->
          
          <!-- /.box -->

         

         
          <!-- /.box -->

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
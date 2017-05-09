<?php
    include("head_index.php");
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
        <section class="col-lg-12 connectedSortable">
            <div class="col-xs-6">
                    <form role='form' action='' method='post' enctype="multipart/form-data" >
                        <div class="form-group">
                            <input class="form-control" type='email' name="email" placeholder="Email" required>
                        </div>  
                        <div class="form-group">
                            <input class="form-control" type='password' name="senha" placeholder="Senha" required>
                        </div>
                                                <button type="submit" class="btn btn-default" name='botao'>Entrar</button>

<?php
        require_once './Controller/UsuarioController.php';
        
            if (isset($_POST["botao"])) {
                $objControl = new UsuarioController();
                $objControl->Login($_POST["email"], $_POST["senha"]);
            }
        ?>
                    </form>
                    <br/>
                    <button type="button" class="btn btn-link" ><a href="view/USU_cadastro.php">Cadastrar-se</a></button>

                </div>
                <div class="col-xs-6">
                    <img class="img-thumbnail" src="imagens/logo.png" alt="Sistema de Gerenciamento de Alugueis - SGA">

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
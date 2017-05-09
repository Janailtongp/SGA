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
                    <form class="form-group" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input class="form-control" name="nome" type="text" placeholder="Nome" required>
                        </div> 
                        <div class="form-group">
                            <input class="form-control" name="email" type="email" placeholder="Email" required>
                        </div>  
                        <div class="form-group">
                            <input class="form-control" name="senha" type="password"  placeholder="Senha" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="conf_senha" type="password" placeholder="Confirmar Senha" required>
                        </div>

                        <button type="submit" class="btn btn-default" name="botao">Cadastrar</button>
                    </form>
                    <?php
                    require_once '../Controller/UsuarioController.php';
                    if (isset($_POST["botao"])) {
                        if (strcmp($_POST['senha'], $_POST['conf_senha']) == 0) {
                            $objControl = new UsuarioController();
                            $objControl->Cadastrar($_POST["nome"], $_POST["email"], $_POST["senha"]);
                        } else {
                            echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>OPS!</strong><BR/> Senha não correspondentes !!! </div>";
                        }
                    }
                    ?>     

                    <br/>

                </div>
                <div class="col-xs-6">
                    <img class="img-thumbnail" src="../imagens/logo.png" alt="Sistema de Gerenciamento de Alugueis - SGA">

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
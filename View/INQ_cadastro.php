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
            <section class="col-lg-12 connectedSortable">
                <div class="col-xs-12">
                    <form class="form-group" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input class="form-control" name="nome" type="text" placeholder="Nome" required>
                        </div> 
                        <div class="form-group">
                            <input class="form-control" name="email" type="email" placeholder="Email" required>
                        </div>  
                        <div class="form-group">
                            <input class="form-control" name="telefone" type="text"  placeholder="Telefone" required>
                        </div>


                        <button type="submit" class="btn btn-default" name="botao">Cadastrar</button>
                    </form>
                    <?php
                    require_once '../Controller/IquilinoController.php';
                    if (isset($_POST["botao"])) {
                        $objControl = new IquilinoController();
                        $objControl->Cadastrar($_POST["nome"], $_POST["email"], $_POST["telefone"], $_SESSION['idUSU']);
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
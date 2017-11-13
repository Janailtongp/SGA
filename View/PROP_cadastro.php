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
                            <input class="form-control" name="rua" type="text" placeholder="Rua" required>
                        </div> 
                        <div class="form-group">
                            <input class="form-control" name="numero" type="text" placeholder="Número" required>
                        </div>  
                        <div class="form-group">
                            <input class="form-control" name="bairro" type="text"  placeholder="Bairro" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="cidade" type="text" placeholder="Cidade" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="cep" type="text" placeholder="CEP" required>
                        </div>
                      
                         <div class="form-group">
                  <select class="form-control" name="situacao" placeholder="Situação">
                    <option value="Disponível">Disponível</option>
                    <option value="Indisponível">Indisponível</option>
                 
                  </select>
                </div>
                        <div class="form-group">
                            <input class="form-control" name="obs" type="text" placeholder="Observação" >
                        </div>
                        <button type="submit" class="btn btn-default" name="botao">Cadastrar</button>
						                        <button type="button" onClick="javascript:window.history.go(-1);" class="btn btn-info">Voltar</button>    

                    </form>
                    <?php
                    require_once '../Controller/PropiedadeController.php';
                    if (isset($_POST["botao"])) {
                        $objControl = new PropiedadeController();
                        $objControl->Cadastrar($_POST["rua"], $_POST["numero"], $_POST["bairro"], $_POST['cidade']
                                , $_POST["cep"], $_POST["situacao"], $_POST["obs"]);
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
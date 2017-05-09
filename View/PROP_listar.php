<?php
include("head.php");
?>
<script type="text/javascript">
  function confirmar(){
    // só permitirá o envio se o usuário responder OK
    var resposta = window.confirm("Deseja mesmo" + 
                   " excluir esta propriedade?");
    if(resposta)
      return true;
    else
      return false; 
  }
</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">

            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->

                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-12 connectedSortable">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Minhas Propiedades</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Bairro</th>
                                        <th>Rua</th>
                                        <th>Numero</th>
                                        <th>CEP</th>
                                        <th>Cidade</th>
                                        <th>Situação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once '../Controller/PropiedadeController.php';
                                    $objControl = new PropiedadeController();
                                    $objControl->listar($_SESSION['idUSU']);
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th> <a href="PROP_cadastro.php"><i class="fa fa-plus-square" aria-hidden="true"></i></a></th>


                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                        <!-- /.box-body -->
                    </div>


                </section>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
<?php
include("foot.php");
?>
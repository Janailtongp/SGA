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

                        <?php
                        if (isset($_GET['id'])) {
                            $id = (int) $_GET['id'];
                            $idUsu = $_SESSION['idUSU'];
                            $conn = F_conect();
                            $result = mysqli_query($conn, "Select * from mensalidade where  id=" . $id);
                            if (mysqli_num_rows($result) >= 1) {
                                while ($row = $result->fetch_assoc()) {
                                    $id_inquilino = $row['id_iquilino'];
                                    $id_propriedade = $row['id_propriedade'];
                                    $dia = $row['dia'];
                                    $mes = $row['mes'];
                                    $ano = $row['ano'];
                                    $valor = $row['valor'];
                                    $situacao = $row['situacao'];
                                }
                                $data = $dia . "/" . $mes . "/" . $ano;
                            } else {

                                echo "<script language= 'JavaScript'>
                                        location.href='erro.php'
                                </script>";
                            }
                            $conn->close();
                        } else {
                            echo "<script language= 'JavaScript'>
                                        location.href='erro.php'
                                </script>";
                        }
                        ?>
                        <div class="form-group">

                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="datepicker" name="data_vencimento" placeholder="Dia de Inicio"  data-inputmask="'alias': 'dd/mm/yyyy'" value="<?php echo $data; ?>" data-mask required>
                            </div>
                            <!-- /.input group -->
                        </div> 
                        
                        <div class="form-group">
                            <input class="form-control" name="valor" type="number" value="<?php echo $valor; ?>" placeholder="Valor do Aluguel" required>
                        </div>
<select class="form-control" name="situacao" placeholder="Situação">
                    <option value="Pago">Pago</option>
                    <option value="Nao Pago">Não Pago</option>
                 
                  </select>

<br/>
                        <button type="submit" class="btn btn-default" name="botao">Atualizar</button>
                    </form>
<?php
require_once '../Controller/MensalidadeController.php';
if (isset($_POST["botao"])) {
    $objControl = new MensalidadeController();
    $objControl->atualizarMensalidade( $id,$_POST['data_vencimento'], $id_propriedade, $_POST['valor'],$_POST['situacao'],$id_inquilino);
}
?>     

                    <br/>

                </div>





            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->

</div>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

<script>
    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
                {
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
        function (start, end) {
            $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        });

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
            showInputs: false
        });
    });
</script>
<?php
include("foot.php");
?>
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
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            <?php
                            $conn = F_conect();
                            $result = mysqli_query($conn, "call total_inquilinos(" . $_SESSION['idUSU'] . ")");
                            if (mysqli_num_rows($result)) {
                                while ($row = $result->fetch_assoc()) {
                                    $total_inquilinos = $row['total'];
                                }
                                echo $total_inquilinos;
                            }

                            $conn->close();
                            ?>
                        </h3>

                        <p>Inquilinos</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <a href="INQ_listar.php" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>
                            <?php
                            $conn = F_conect();

                            $result1 = mysqli_query($conn, "call total_propriedades(" . $_SESSION['idUSU'] . ")");
                            if (mysqli_num_rows($result1)) {
                                while ($row1 = $result1->fetch_assoc()) {
                                    $total_propriedades = $row1['total'];
                                }
                                echo $total_propriedades;
                            }
                            $conn->close();
                            ?>   
                        </h3>

                        <p>Propriedades</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-bank "></i>
                    </div>
                    <a href="PROP_listar.php" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>
<?php
$conn = F_conect();
$rendimento=0;
$result2 = mysqli_query($conn, "Select * from total_rendimento where id=" . $_SESSION['idUSU']);
if (mysqli_num_rows($result2)) {
    while ($row2 = $result2->fetch_assoc()) {
        $rendimento = $row2['sum(m.valor)'];
    }
}
    echo $rendimento;

$conn->close();
?> 
                        </h3>

                        <p>Rendimento</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>
<?php
$conn = F_conect();
$idUsu = $_SESSION['idUSU'];
$result = mysqli_query($conn, "Select count(c.propriedade) total from(Select p.id propriedade
                                from mensalidade m,propriedade p,iquilino i 
                                where i.id_usuario=" . $idUsu . " and p.id_proprietario=" . $idUsu . " and m.id_iquilino=i.id and m.id_propriedade=p.id
                                group by p.id) c;");
$total = 0;
if (mysqli_num_rows($result)) {
    while ($row = $result->fetch_assoc()) {
        $total = $row['total'];
    }
}
echo $total;
$conn->close();
?>

                        </h3>

                        <p>Contratos</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-building"></i>
                    </div>
                    <a href="MEN_listar.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <section class="col-lg-7 connectedSortable">
          <div class="box-body col-lg-12">
            <div class="box box-warning">

            <div class="box-header with-border">
              <h3 class="box-title">Avisos</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>

<?php
    $conn = F_conect();
    $string = "Select i.nome inquilino,
           m.dia dia,m.mes mes, m.ano ano
                from mensalidade m,iquilino i,propriedade p,usuario u
                where u.id=" . $idUsu . " and u.id=i.id_usuario and u.id=p.id_proprietario and i.id=m.id_iquilino and
                 p.id=m.id_propriedade and m.situacao='Nao Pago'";
    $consulta = "Select i.nome inquilino,
           m.dia dia,m.mes mes, m.ano ano
                from mensalidade m,iquilino i,propriedade p,usuario u
                where u.id=" . $idUsu . " and u.id=i.id_usuario and u.id=p.id_proprietario and i.id=m.id_iquilino and
                 p.id=m.id_propriedade and m.situacao='Nao Pago'";
    $result = mysqli_query($conn, $consulta);
    date_default_timezone_set("America/Recife");
    $data_atual = date('d/m/Y');
    $array = explode("/", $data_atual);
    $mes_atual = (int) $array[1];
    $dia_atual = (int) $array[0];
    $ano_atual = (int) $array[2];
if (mysqli_num_rows($result)) {
    while ($row = $result->fetch_assoc()) {
        if (($ano_atual > $row['ano']) || (($mes_atual > $row['mes']) && ($row['ano'] == $ano_atual))) {
            echo '<div class="alert alert-danger" role="alert">';
        } else if (($mes_atual == $row['mes']) && ($dia_atual > $row['dia']) && ($row['ano'] == $ano_atual)) {
            echo '<div class="alert alert-danger" role="alert">';

        } else {
            echo '<div class="alert alert-warning" role="alert">';

        }
        echo"O inquilino " . $row['inquilino'] . " não pagou ainda a mensalidade da data " . $row['dia'] . "/"
        . $row['mes'] . "/" . $row['ano'] . "";
    
        echo "</div>";
        }
    
} else {
    
}
$conn->close();
?>
            </div>
            <!-- /.box-body -->
          </div>
               

            </section>
            <section class="col-lg-5 connectedSortable">




                <!-- Calendar -->
                <div class="box box-solid bg-green-gradient">
                    <div class="box-header">
                        <i class="fa fa-calendar"></i>

                        <h3 class="box-title">Calendario</h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <!-- button with a dropdown -->

                            <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <!--The calendar -->
                        <div id="calendar" style="width: 100%"></div>
                    </div>

                </div>
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
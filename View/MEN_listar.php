<?php
include("head.php");
?>
<script type="text/javascript">
  function confirmar(){
    // só permitirá o envio se o usuário responder OK
    var resposta = window.confirm("Deseja mesmo" + 
                   " excluir esta alocação?");
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
                            <h3 class="box-title">Meus Contratos</h3>
                        </div>
                        <!-- /.box-header -->
                          <script type="text/javascript">
// Início do código de Aumentar/ Diminuir a letra
 
// Para usar coloque o comando:
// "javascript:mudaTamanho('tag_ou_id_alvo', -1);" para diminuir
// e o comando "javascript:mudaTamanho('tag_ou_id_alvo', +1);" para aumentar
 
var tagAlvo = new Array('p'); //pega todas as tags p//
 
// Especificando os possíveis tamanhos de fontes, poderia ser: x-small, small...
var tamanhos = new Array('14px','15px','16px','17px','18px' );
var tamanhoInicial = 2;
 
function mudaTamanho( idAlvo,acao ){
if (!document.getElementById) return
var selecionados = null,tamanho = tamanhoInicial,i,j,tagsAlvo;
tamanho += acao;
if ( tamanho < 0 ) tamanho = 0;
if ( tamanho > 6 ) tamanho = 6;
tamanhoInicial = tamanho;
if ( !( selecionados = document.getElementById( idAlvo ) ) ) selecionados = document.getElementsByTagName( idAlvo )[ 0 ];
 
selecionados.style.fontSize = tamanhos[ tamanho ];
 
for ( i = 0; i < tagAlvo.length; i++ ){
tagsAlvo = selecionados.getElementsByTagName( tagAlvo[ i ] );
for ( j = 0; j < tagsAlvo.length; j++ ) tagsAlvo[ j ].style.fontSize = tamanhos[ tamanho ];
}
}
// Fim do código de Aumentar/ Diminuir a letra
 
</script>
                        <div class="box-body" id="texto">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Iquilino</th>
                                        <th>Propriedade</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once '../Controller/MensalidadeController.php';
                                    $objControl = new MensalidadeController();
                                    $objControl->contratos($_SESSION['idUSU']);
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th> <a href="MEN_cadastro.php"><i class="fa fa-plus-square" aria-hidden="true"></i></a></th>
                                        <th></th>
                                        

                                    </tr>
                                </tfoot>
                            </table>
                            <!-- Trigger the modal with a button -->
                                        
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-question" aria-hidden="true"></i>
</button>
       <button type="button" onClick="javascript:window.history.go(-1);" class="btn btn-info">Voltar</button>                    
       <a href="javascript:mudaTamanho('texto', 1);">+<i class="fa fa-font fa-2x" aria-hidden="true"></i></a>
       <a href="javascript:mudaTamanho('texto', -1);">-<i class="fa fa-font fa-1x" aria-hidden="true"></i> </a>
                                                        
                       
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Meus Contratos</h4>
      </div>
      <div class="modal-body">
          <p>Aqui estão listados seus contratos, para ver as mensalidades de cada contrato clique no icone <i class="fa fa-eye"></i>.
         <br/> Nela você poderá monitorar as mensalidades, e atualizar os aluguéis dos seus inquilinos. <br/>
          Para adicionar um novo contrato você seleciona o ícone <i class="fa fa-plus-square" aria-hidden="true"></i> no canto inferior esquerdo da tabela.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>

  </div>
</div>


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


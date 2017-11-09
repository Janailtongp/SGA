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
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="texto">
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
                                        <th>Observação</th>
                                        <th>Ações</th>

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
        <h4 class="modal-title">Minhas Propriedades</h4>
      </div>
      <div class="modal-body">
          <p>Para adicionar uma nova propriedade clique no ícone <i class="fa fa-plus-square" aria-hidden="true"></i> </p>
          <p>Para editar uma propriedade clique no ícone <i class="fa fa-pencil"></i></p>
          <p>Para excluir uma propriedade clique no ícone <i class="fa fa-trash"></i></p>

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
<?php

function cadastrarMensalidade($IdProp, $IdInq, $dia,$mes,$ano, $valor, $situacao) {

    $conn = F_conect();
    $sql = "INSERT INTO mensalidade(id_iquilino, id_propriedade, mes,dia,ano, situacao, valor)
                VALUES('" . $IdInq . "','" . $IdProp . "','" . $mes . "','" . $dia . "','" . $ano . "','" . $situacao . "','" . $valor . "')";

    if ($conn->query($sql) == TRUE) {
        
        $sql1 = "UPDATE propriedade SET situacao = 'Indisponível' WHERE id = ".$IdProp;
        $conn->query($sql1);
      
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

function atualizarMensalidade($id_mensalidade,$id_inquilino,$id_propriedade,$dia,$mes,$ano,$situacao,$valor){
    $conn = F_conect();

    $sql = " UPDATE mensalidade SET  id_iquilino='" . $id_inquilino . "', id_propriedade=" . $id_propriedade . " , mes=" .
            $mes . ", situacao='" . $situacao . "', valor=" . $valor . ",dia=".$dia.",ano=".$ano." WHERE id= " . $id_mensalidade;

    if ($conn->query($sql) === TRUE) {
         include '../Model/LOGS.php';
        //LOG__________
        if (NovoLog("Mensalidade " . $id_mensalidade . " atualizada", $_SESSION['idUSU'])){
echo "<script language= 'JavaScript'>
                                        location.href='/SGA/view/MEN_contrato.php?id_inquilino=".$id_inquilino."&id_propriedade=".$id_propriedade."'
                                </script>";

        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
function pagamento($id_mensalidade,$id_inquilino,$id_propriedade){
    $conn = F_conect();
    $situacao="Pago";
    $sql = " UPDATE mensalidade SET   situacao='" . $situacao .  "' WHERE id= " . $id_mensalidade;
     if ($conn->query($sql) === TRUE) {
        include '../Model/LOGS.php';
        //LOG__________
        if (NovoLog("Mensalidade " . $id_mensalidade . " paga", $_SESSION['idUSU'])){

                header("Location: /SGA/view/MEN_contrato.php?id_inquilino=".$id_inquilino."&id_propriedade=".$id_propriedade);

        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    
}
function excluirMensalidade($id_mensalidade,$id_propriedade,$id_inquilino) {

   $conn = F_conect();

    $sql = "DELETE FROM mensalidade WHERE id=" . $id_mensalidade;

    $conn->query($sql);
    include '../Model/LOGS.php';
        //LOG__________
        if (NovoLog("Mensalidade " . $id_mensalidade." excluida", $_SESSION['idUSU'])){

                header("Location: /SGA/view/MEN_contrato.php?id_inquilino=".$id_inquilino."&id_propriedade=".$id_propriedade);

        }
    $conn->close();
}
function listarContratos($idUsu) {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select i.id id_iquilino,p.id 
    id_propriedade,i.nome Inquilino, p.rua rua,p.numero numero,p.cidade cidade,p.bairro bairro
            from mensalidade m,propriedade p,iquilino i 
            where i.id_usuario=" . $idUsu." and p.id_proprietario=".$idUsu." and m.id_iquilino=i.id and m.id_propriedade=p.id
            group by i.id,p.id");

    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
            echo"<tr><td>" . $row['Inquilino'] . "</td>";
            echo"<td>" . $row['numero'] . "";
            echo"," . $row['rua'] . "";
            echo"," . $row['bairro'] . "";
            echo"," . $row['cidade'] . ".</td>";
            echo"<td><a href=MEN_contrato.php?id_inquilino=" . $row['id_iquilino'] . "&id_propriedade=".$row['id_propriedade']."><i class='fa fa-eye' aria-hidden='true'></i></a>
                        <a onclick='return confirmar();' href=MEN_excluirContrato.php?id_propriedade=" . $row['id_propriedade'] . "&id_inquilino=".$row['id_iquilino']."><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>";
        }
    }
    $conn->close();
}

function listarMensalidades($id_propriedade,$id_inquilino) {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select id, dia,ano,mes,situacao,valor
            from mensalidade m 
            where id_propriedade=".$id_propriedade." and id_iquilino=".$id_inquilino);
    date_default_timezone_set("America/Recife");
    $data_atual = date('d/m/y');
    $array=explode("/",$data_atual);
                     
    $mes_atual = (int)$array[1];
    $dia_atual = (int)$array[0];
    $ano_atual = (int)$array[2];
                
    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
            if(strcmp($row['situacao'],"Pago")==0){
                echo "<tr class='success'>";
                
            }
            else if(($ano_atual>$row['ano'])||($mes_atual>$row['mes'])){
                echo "<tr class='danger'>";

                
            }
            else if(($mes_atual==$row['mes'])&&($dia_atual>$row['dia'])){
                echo "<tr class='danger'>";

            
            }
            else{
                echo "<tr>";
                
            }
            echo"<td>" . $row['dia'] . "";
            echo"/" . $row['mes'] . "";
            echo"/" . $row['ano'] . "</td>";
            echo"<td>" . $row['valor'] . "</td>";

            echo"<td>" . $row['situacao'] . "</td>";
            echo"<td><a href=MEN_pagamento.php?id=" . $row['id']."&id_inquilino=".$id_inquilino."&id_propriedade=".$id_propriedade."><i class='fa fa-credit-card' aria-hidden='true' alt='Realizar Pagamento'></i></a>
                <a href=MEN_editar.php?id=" . $row['id']."><i class='fa fa-pencil-square-o' aria-hidden='true' alt='Realizar Pagamento'></i></a>
                        <a onclick='return confirmar();' href=MEN_excluir.php?id=" . $row['id'] . "&id_inquilino=".$id_inquilino."&id_propriedade=".$id_propriedade."><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>";
        }
    }
    $conn->close();
}

 function excluirContrato($id_propriedade,$id_inquilino){
    $conn = F_conect();

    $sql = "DELETE FROM mensalidade WHERE id_propriedade=" . $id_propriedade." and id_iquilino=".$id_inquilino;

    if($conn->query($sql)){
        $sql1 = "UPDATE propriedade SET situacao = 'Disponivel' WHERE id = ".$id_propriedade;
        $conn->query($sql1);
        include '../Model/LOGS.php';
        //LOG__________
        if (NovoLog("Contrato da propriedade " . $id_propriedade . " e inquilino:".$id_inquilino." excluida", $_SESSION['idUSU'])){

                header("Location: /SGA/view/MEN_listar.php");

        }
    }
    $conn->close();
    
}
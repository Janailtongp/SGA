<?php

function cadastrarPropiedade($idUsu, $bairro, $rua, $cep, $cidade, $num, $obs, $status) {

    $conn = F_conect();


    $sql = "INSERT INTO propriedade (id_proprietario, bairro, rua, cidade, cep, numero, observacao, situacao)
                VALUES('" . $idUsu . "','" . $bairro . "','" . $rua . "','" . $cidade . "','" . $cep . "','" . $num .
            "','" . $obs . "','" . $status . "' )";

    if ($conn->query($sql) == TRUE) {
        include '../Model/LOGS.php';
        //LOG__________
        if (NovoLog("Propriedade da RUA " . $rua . " com N° " . $num . " cadastrada", $_SESSION['idUSU'])) {

            Alert("Oba!", "Propriedade cadastrado com sucesso", "success");
            echo "<a href='/SGA/view/PROP_listar.php'> Listar Propriedades</a>";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

function editarPropieade($id, $idUsu, $bairro, $rua, $cep, $cidade, $num, $obs, $status) {
    $conn = F_conect();
    $sql = " UPDATE propriedade SET  bairro='" . $bairro . "' , rua='" .
            $rua . "', cidade='" . $cidade . "', cep='" . $cep . "', numero='" . $num . "', observacao='" . $obs . "', situacao='" . $status . "' WHERE id= " . $id . " AND id_proprietario=" . $idUsu;

    if ($conn->query($sql) === TRUE) {
        include '../Model/LOGS.php';
        //LOG__________
        if (NovoLog("Propriedade da RUA " . $rua . " com N° " . $num . " atualizada", $_SESSION['idUSU'])) {
            Alert("Oba!", "Propriedade editada com sucesso", "success ");
            echo "<a href='/SGA/view/PROP_listar.php'> Listar Propriedades</a>";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function excluirPropiedade($id,$idUsu) {

    $conn = F_conect();

    $sql = "DELETE FROM propriedade WHERE id=" . $id." and id_proprietario=".$idUsu;

if($conn->query($sql)){
    include '../Model/LOGS.php';
    //LOG__________
    if (NovoLog("Propriedade com ID " . $id . " excluida", $_SESSION['idUSU'])){
        
            header("Location: /SGA/view/PROP_listar.php");

    }
}
  $conn->close();
}

function listarPropiedade($idUsu) {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select * from propriedade where id_proprietario=" . $idUsu);

    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
            echo"<tr><td>" . $row['bairro'] . "</td>";
            echo"<td>" . $row['rua'] . "</td>";
            echo"<td>" . $row['numero'] . "</td>";
            echo"<td>" . $row['cep'] . "</td>";
            echo"<td>" . $row['cidade'] . "</td>";
            echo"<td>" . $row['situacao'] . "</td>";
            echo"<td>" . $row['observacao'] . "</td>";

            echo"<td><a href=PROP_editar.php?id=" . $row['id'] . "><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                        <a onclick='return confirmar();' href=PROP_excluir.php?id=" . $row['id'] . "><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>";
        }
    }
    $conn->close();
}

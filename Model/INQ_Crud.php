<?php

function cadastrarInquilino($idUsu, $nome, $telefone, $email) {
    $conn = F_conect();
    $sql = "INSERT INTO iquilino(id_usuario, nome, email, telefone)
                VALUES('" . $idUsu . "','" . $nome . "','" . $email . "','" . $telefone . "')";

    if ($conn->query($sql) == TRUE) {
        //LOG__________
        include '../Model/LOGS.php';
        if (NovoLog("Inquilino " . $nome . " cadastrado", $_SESSION['idUSU'])) {

            Alert("Oba!", "Inquilino cadastrado com sucesso", "success");
            echo "<a href='/SGA/view/INQ_listar.php'> Listar Inquilinos</a>";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

function listarIquilino($idUsu) {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select * from iquilino where id_usuario=" . $idUsu);

    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
            echo"<tr><td>" . $row['nome'] . "</td>";
            echo"<td>" . $row['telefone'] . "</td>";
            echo"<td>" . $row['email'] . "</td>";
            echo"<td><a href=INQ_editar.php?id=" . $row['id'] . "><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                        <a onclick='return confirmar();' href=INQ_excluir.php?id=" . $row['id'] . "><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>";
        }
    }
    $conn->close();
}

function editarInquilino($id, $idUsu, $nome, $telefone, $email) {
    $conn = F_conect();
    $sql = " UPDATE iquilino SET    nome='" . $nome . "' , telefone='" .
            $telefone . "', email='" . $email . "' WHERE id=' " . $id . " 'and id_usuario='" . $idUsu . "'";

    if ($conn->query($sql) === TRUE) {
        include '../Model/LOGS.php';
        if (NovoLog("Inquilino " . $nome . " editado", $_SESSION['idUSU'])) {

            Alert("Oba!", "Inquilino atualizado com sucesso", "success");
            echo "<a href='/SGA/view/INQ_listar.php'> Listar Inquilinos</a>";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function excluirInquilino($id, $id_usu) {

    $conn = F_conect();
    $sql = "DELETE FROM iquilino WHERE id=" . $id . " and id_usuario=" . $id_usu;

    if ($conn->query($sql)) {
        include '../Model/LOGS.php';
        if (NovoLog("Inquilino com ID " . $id . " excluido", $_SESSION['idUSU'])) {
            
        }
    }

    $conn->close();
    header("Location: /SGA/view/INQ_listar.php");
}

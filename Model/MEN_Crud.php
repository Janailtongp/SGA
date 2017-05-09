<?php

function cadastrarMensalidade($IdProp, $IdInq, $mes, $valor, $situacao) {

    $conn = F_conect();
    $sql = "INSERT INTO mensalidade(id_iquilino, id_propriedade, mes, situacao, valor)
                VALUES('" . $IdInq . "','" . $IdProp . "','" . $mes . "','" . $situacao . "','" . $valor . "')";

    if ($conn->query($sql) == TRUE) {
        echo "Mensalidade cadastrada com sucesso!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: view/menu.php");
}

function editarMensalidade($id, $IdProp, $IdInq, $mes, $valor, $situacao) {
    $conn = F_conect();

    $sql = " UPDATE mensalidade SET  id_iquilino='" . $IdInq . "', id_propriedade=" . $IdProp . " , mes" .
            $mes . ", situacao=" . $situacao . ", valor=" . $valor . " WHERE id= " . $id;

    if ($conn->query($sql) === TRUE) {
        header("Location: view/menu.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function excluirMensalidade($id) {

   $conn = F_conect();

    $sql = "DELETE FROM mensalidade WHERE id=" . $id;

    $conn->query($sql);

    $conn->close();
}

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
function listarContratos($idUsu) {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select i.nome Inquilino, p.rua,p.numero,p.cidade,p.bairro,i.id,p.id 
            from mensalidade m,propriedade p,iquilino i 
            where i.id_usuario=" . $idUsu." and p.id_proprietario=".$idUsu." and m.id_iquilino=i.id and m.id_propriedade=p.id");

    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
            echo"<tr><td>" . $row['Inquilino'] . "</td>";
            echo"<td>" . $row['p.numero'] . "";
            echo"," . $row['p.rua'] . "";
            echo"," . $row['p.bairro'] . "";
            echo"," . $row['p.cidade'] . ".</td>";
            echo"<td><a href=INQ_editar.php?id=" . $row['id'] . "><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                        <a onclick='return confirmar();' href=INQ_excluir.php?id=" . $row['id'] . "><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>";
        }
    }
    $conn->close();
}
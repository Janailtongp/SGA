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
            echo"<td><a href=INQ_editar.php?id=" . $row['id_iquilino'] . "><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                        <a onclick='return confirmar();' href=INQ_excluir.php?id=" . $row['id_propriedade'] . "><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>";
        }
    }
    $conn->close();
}
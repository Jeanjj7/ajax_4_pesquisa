<?php
include "conexao.php";

$cod = $_POST['cod'];
$sql = "SELECT * FROM tb_movimentacoes WHERE cod_rastreio LiKE '%$cod%'";


$consultar = $pdo->prepare($sql);


try {
    $consultar->execute();
    if($consultar->rowCount()>=1){
        echo "Achei alguma coisa";

    }else {
        echo "Não achei nada!";
    }


} catch (PDOException $erro) {
    echo "Falha ao consultar: " . $erro->getMessage();
}
?>
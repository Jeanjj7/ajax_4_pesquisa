<?php
include "conexao.php";

$cod_rastreio = $_POST['cod_rastreio'];
$origem = $_POST['origem'];
$destino = $_POST['destino'];
$data_hora_movi = $_POST['data_hora_movi'];
$tipo_movimentacao = $_POST['tipo_movimentacao'];

$sql = "INSERT INTO tb_movimentacoes
        (cod_rastreio, origem, destino, data_hora_movi, tipo_movimentacao)
        VALUES ('$cod_rastreio', '$origem', '$destino', '$data_hora_movi', '$tipo_movimentacao')";


$inserir = $pdo->prepare($sql);


try {
    $inserir->execute();
    echo "Cadastrada com sucesso!";
} catch (PDOException $erro) {
    echo "Erro ao cadastrar" . $erro->getMessage();
}
?>
?>
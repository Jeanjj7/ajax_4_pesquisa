<?php
include "conexao.php";

$cod = $_POST['cod'];
$sql = "SELECT * FROM tb_movimentacoes WHERE cod_rastreio LiKE '%$cod%'";


$consultar = $pdo->prepare($sql);


try {
    $consultar->execute();
    if($consultar->rowCount()>=1){
        $resultado = $consultar->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $item) {
            $tipo= $item['tipo_movimentacao'];
            $data = $item['data_hora_movi'];
            $origem = $item['origem'];
            $destino = $item['destino'];

            $somente_data = date("d/m/Y",strtotime($data));
            $somente_hora = date("H:i:s",strtotime($data));
    echo "
            <div class='atualizacao'>
                <span class='tipo'>$tipo</span><br>
                <span class='data'>$somente_data as $somente_hora</span><br>
                <span class='data_hora'>$data</span><br>
                <span class='locais'>
                    $origem ➡ $destino
                </span><br>

            </div>
    
    ";    
        }

    }else {
        echo "Não achei nada!";
    }


} catch (PDOException $erro) {
    echo "Falha ao consultar: " . $erro->getMessage();
}
?>
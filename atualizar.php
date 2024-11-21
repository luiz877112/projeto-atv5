<?php
include "conexao.php";

$matricula = $_POST['matricula'];
$nome = $_POST['nome'];
$setor = $_POST['setor'];
$situacao = $_POST['situacao'];

$sql = "UPDATE tb_func SET
        nome = '$nome',
        setor = '$setor',
        situacao = '$situacao'
        WHERE matricula = '$matricula'";

$atualizar = $pdo->prepare($sql);

try {
    $atualizar->execute();

    if ($atualizar->rowCount() >= 1) {
        echo "Funcionário atualizado";
    } else {
        echo "Nenhuma alteração foi feita.";
    }
} catch (PDOException $erro) {
    echo "Erro ao tentar atualizar: " . $erro->getMessage();
}
?>
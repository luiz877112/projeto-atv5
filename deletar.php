<?php
include "conexao.php"; 

$matricula = $_POST['matricula'];

$sql = "DELETE FROM tb_func WHERE matricula = '$matricula'";

$deletar = $pdo->prepare($sql);

try {  
    $deletar = $pdo->prepare($sql);
    $deletar->execute();
    if ($deletar->rowCount() > 0) {
        echo "Funcionário deletado!";
    } else {
        echo "Nenhum funcionário encontrado com a matrícula informada.";
    }
} catch (PDOException $erro) {
    echo "Erro ao tentar deletar o funcionário: " . $erro->getMessage();
}
?>
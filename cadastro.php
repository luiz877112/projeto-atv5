<?php
include "conexao.php";

$nome = $_POST['nome'];
$setor = $_POST['setor']; 

$sql = "INSERT INTO tb_func (nome, setor) 
VALUES ('$nome', '$setor')";

$inserir = $pdo->prepare($sql);

try {
    $inserir->execute();
    echo "Funcionário cadastrado!";
} catch (PDOException $erro) {
    echo "Erro ao tentar cadastrar funcionário! " . $erro->getMessage();
}
?>
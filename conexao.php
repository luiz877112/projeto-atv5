<?php
$maquina = "localhost";
$usuario = "root";
$senha = "root";
$nome_do_banco = "bd_sistema_empresa";
$porta = 3306;

try {
    $pdo = new PDO("mysql:host=$maquina;port=$porta;dbname=$nome_do_banco;charset=utf8", "$usuario", "$senha");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erro) {
    echo "Falha ao conectar com o BD: $nome_do_banco <br>" . $erro->getMessage();
}
?>
<?php 
include "conexao.php";

$sql = "SELECT * FROM tb_func WHERE setor='Financeiro'";

$consultar = $pdo->prepare($sql);

try {
    $consultar->execute();
    $resultados = $consultar->fetchAll(PDO::FETCH_ASSOC);
    echo "
    <h1>Financeiro</h1>";
            foreach ($resultados  as $item) {
                $nome = $item['nome'];
                $matricula = $item['matricula'];
                $setor = $item['setor'];
                $situacao = $item['situacao'];
                echo "
                     <div class='cartoes'>
                            <h2>Matrícula: <span class='matricula_func'>$matricula</span></h2>
                            <p>Nome: <span class='nome_func'>$nome</span></p>
                            <p>Setor: <span class='setor_func'>$setor</span></p>
                            <p>Situação: <span class='situacao_func'>$situacao</span></p>
                      </div> ";
            };

} catch (PDOException $erro) {
    echo "Falha ao consultar resultados! " . $erro->getMessage();
}
?>
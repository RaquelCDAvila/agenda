<?php
    require_once "configuracao.php";

    $conexao = null;

try {
    $conexao = Conexao::getConnection();
    echo "Conexão com banco de dados realizado com sucesso!";
} catch (\Throwable $th) {
    //throw $th;
    echo "Erro ao tentar abrir conexão com banco de dados." . $th->getMessage();
}
?>
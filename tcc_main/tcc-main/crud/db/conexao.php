<?php
//configs gerais
$servidor="localhost";
$usuario="root";
$senha="";
$banco="tcc";

//conexao
try{
$pdo = new PDO("mysql:host=$servidor;dbname=$banco",$usuario,$senha);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $erro){
    echo "Falha ao se conectar com o banco";
}

//funçao para limpar entradas
function limpaPost($dado){

    $dado = trim($dado);
    $dado = stripcslashes($dado);
    $dado = htmlspecialchars($dado);
    return($dado);
}
?>
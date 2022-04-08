<?php

// Esse arquivo contém uma implementação simples de uma "conexão" com um banco de dados Sqlite.
// O arquivo é apenas um exemplo de como conectar com um banco de dados.

// Caminho para o arquivo do banco de dados SQlite. Isso só existe no caso desse banco.
// Se estivéssemos usando um banco de dados MySQL, por exemplo, o caminho seria:
//       $db_path = 'mysql:host=localhost;dbname=nomedobanco';
// Veja mais informações em: https://www.php.net/manual/pt_BR/book.pdo.php
$arquivo = '../../BD/integrado.sqlite';

// Essa será a variável que qualquer página poderá utilizar
// para acessar o banco de dados depois de incluir `db.php`
$db = null;

try {
    // Se o arquivo com os dados do banco não existe, cria um e iniciali

    // "Conecta" com o banco de dados
    $db = new PDO("sqlite:$arquivo");

    $fk = $db->prepare('PRAGMA foreign_keys = ON');
    $fk->execute();
    

} catch (PDOException $e) {
    echo 'Erro com o banco de dados: ' . $e->getMessage();
    exit();
}

?>
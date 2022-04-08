<?php

require_once '../Conection/db.php';

$id = $_POST['id'];

$nome = $_POST['nome'];
$documento = $_POST['documento'];
$natureza = $_POST['natureza'];
$cliente = $_POST['cliente'];
$fornecedor = $_POST['fornecedor'];
$aniversario = $_POST['aniversario'];
$comentario = $_POST['comentario'];

$dsemail = $_POST['dsemail'];
$dstelefone = $_POST['dstelefone'];

$rua = $_POST['rua'];
$logradouro = $_POST['logradouro'];
$cidade = $_POST['cidade'];

try{

$comando = $db->prepare('UPDATE pessoa
                                SET nome = :nome,
                                documento = :documento,
                                natureza = :natureza,
                                cliente = :cliente,
                                fornecedor = :fornecedor,
                                aniversario = :aniversario,
                                comentario = :comentario
                                WHERE idpessoa = :id');                                         
$comando->execute([':nome'=> $nome, ':documento'=>$documento, ':natureza'=>$natureza,
                ':cliente'=>$cliente, ':fornecedor'=>$fornecedor, ':aniversario'=>$aniversario,  
                ':comentario'=>$comentario, ':id' => $id]);

$comando = $db->prepare('UPDATE pessoacontato
                            SET dsemail = :dsemail,
                                dstelefone = :dstelefone
                          WHERE idpessoa = :id');                                         

$comando->execute([':dsemail'=>$dsemail,':dstelefone'=>$dstelefone, ':id' => $id]);

$comando = $db->prepare('UPDATE pessoaendereco
                                SET rua = :rua,
                                    logradouro = :logradouro,
                                    cidade = :cidade
                              WHERE idpessoa = :id');                                         

$comando->execute([':rua'=>$rua,':logradouro'=>$logradouro,':cidade'=>$cidade, ':id' => $id]);

echo json_encode($comando->fetchAll(PDO::FETCH_ASSOC));

} catch (PDOException $e) {
    echo 'Erro com o banco de dados: ' . $e->getMessage();
    close($db);
    exit();
}

?>
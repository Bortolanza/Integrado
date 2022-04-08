<?php

require_once '../Conection/db.php';

//$op = $_POST['operacao'];
//$id = $_GET['id'];

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

if ($cliente == 'true'){
    $cliente = 1;
}else{
    $cliente = 0;
};

if ($fornecedor == 'true'){
        $fornecedor = 1;
    }else{
        $fornecedor = 0;
};

try{

$comando = $db->prepare('INSERT INTO pessoa(nome,
                                        documento,
                                        natureza,
                                        cliente,
                                        fornecedor,
                                        aniversario,
                                        comentario)
                                VALUES (:nome,
                                        :documento,
                                        :natureza,
                                        :cliente,
                                        :fornecedor,
                                        :aniversario,
                                        :comentario)');                                         

$comando->execute([':nome'=> $nome, ':documento'=>$documento, ':natureza'=>$natureza,
                ':cliente'=>$cliente, ':fornecedor'=>$fornecedor, ':aniversario'=>$aniversario,  
                ':comentario'=>$comentario]);

$comando = $db->prepare('SELECT MAX(idpessoa) as idpessoa FROM pessoa');
$comando->execute();

$var = $comando->fetchAll(PDO::FETCH_ASSOC);

$idpessoa_v =$var[0];
$idpessoa = $idpessoa_v['idpessoa'];

// foreach(array_values($var) as $vl){
// foreach($vl as $idpessoa){};};

$comando = $db->prepare('INSERT INTO pessoacontato(idpessoa,
                                                dsemail,
                                                dstelefone)
                                        VALUES (:idpessoa,
                                                :dsemail,
                                                :dstelefone)');                                         

$comando->execute([':idpessoa'=>$idpessoa,':dsemail'=>$dsemail,':dstelefone'=>$dstelefone]);

$comando = $db->prepare('INSERT INTO pessoaendereco(idpessoa,
                                                rua,
                                                logradouro,
                                                cidade)
                                        VALUES (:idpessoa,
                                                :rua,
                                                :logradouro,
                                                :cidade)');                                         

$comando->execute([':idpessoa'=>$idpessoa,':rua'=>$rua,':logradouro'=>$logradouro,':cidade'=>$cidade]);

echo json_encode($comando->fetchAll(PDO::FETCH_ASSOC));

} catch (PDOException $e) {
        echo 'Erro ao executar comando no banco de dados: ' . $e->getMessage();
        close($db);
        exit();
};

?>
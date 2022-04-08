<?php

require_once '../Conection/db.php';

$id = $_GET['id'];

try{

$comando = $db->prepare('SELECT pessoa.idpessoa,
                                pessoa.nome,
                                pessoa.documento,
                                pessoa.natureza,
                                pessoa.cliente,
                                pessoa.fornecedor,
                                pessoa.aniversario,
                                pessoa.comentario,
                                pessoacontato.dsemail,
                                pessoacontato.dstelefone,
                                pessoaendereco.rua,
                                pessoaendereco.logradouro,
                                pessoaendereco.cidade
                           FROM pessoa
                           JOIN pessoacontato ON pessoa.idpessoa = pessoacontato.idpessoa
                           left JOIN pessoaendereco ON pessoa.idpessoa = pessoaendereco.idpessoa
                          WHERE pessoa.idpessoa = :id');                                         
$comando->execute([':id'=> $id]);

echo json_encode($comando->fetchAll(PDO::FETCH_ASSOC));

} catch (PDOException $e) {
    echo 'Erro com o banco de dados: ' . $e->getMessage();
    close($db);
    exit();
}
?>




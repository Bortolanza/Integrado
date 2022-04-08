<?php

require_once '../Conection/db.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$valor = $_POST['valor'];
$composto = $_POST['composto'];
$estoque = $_POST['estoque'];

if ($composto == 'true'){
    $composto = 1;
}else{
    $composto = 0;
};

if ($estoque == 'true'){
    $estoque = 1;
}else{
    $estoque = 0;
};

try {

$comando = $db->prepare('UPDATE produto
                            SET nome = :nome,
                                valor = :valor,
                                composto = :composto,
                                estoque = :estoque
                          WHERE idproduto = :id');  

$comando->execute([':nome'=> $nome, ':valor'=>$valor, ':composto'=>$composto,':estoque'=>$estoque, ':id'=>$id]);

echo true;

} catch (PDOException $e) {
    echo 'Erro com o banco de dados: ' . $e->getMessage();
    close($db);
    exit();
}
?>
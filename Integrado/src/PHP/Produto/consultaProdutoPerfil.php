<?php

require_once '../Conection/db.php';

$id = $_GET['id'];

try{

$comando = $db->prepare('SELECT produto.idproduto,
                                produto.nome,
                                produto.valor,
                                produto.composto,
                                produto.estoque
                           FROM produto
                          WHERE produto.idproduto = :id');                                         
$comando->execute([':id'=> $id]);

echo json_encode($comando->fetchAll(PDO::FETCH_ASSOC));

} catch (PDOException $e) {
    echo 'Erro com o banco de dados: ' . $e->getMessage();
    close($db);
    exit();
}
?>




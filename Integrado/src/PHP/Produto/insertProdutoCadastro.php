<?php

require_once '../Conection/db.php';

//$op = $_POST['operacao'];
//$id = $_GET['id'];

$nome = $_POST['nome'];
$valor = $_POST['valor'];
$composto = $_POST['composto'];
$estoque = $_POST['estoque'];

if ($composto == true){
        $composto = 1;
    }else{
        $composto = 0;
    };
    
if ($estoque == true){
        $estoque = 1;
    }else{
        $estoque = 0;
};

try{

$comando = $db->prepare('INSERT INTO produto(nome,
                                             valor,
                                             composto,
                                             estoque)
                                VALUES (:nome,
                                        :valor,
                                        :composto,
                                        :estoque)');                                         

$comando->execute([':nome'=> $nome, ':valor'=>$valor, ':composto'=>$composto, ':estoque'=>$estoque]);

echo json_encode($comando->fetchAll(PDO::FETCH_ASSOC));

} catch (PDOException $e) {
    echo 'Erro com o banco de dados: ' . $e->getMessage();
    close($db);
    exit();
}
?>
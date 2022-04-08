<?php

header('Content-type: application/json');

require_once '../Conection/db.php';

$n=$_GET['nome'];

try {
    if (strlen($n) == 0){
        $comando = $db->prepare('SELECT idproduto,
                                        nome,
                                        valor, 
                                        estoque,
                                        composto
                                   FROM produto');
        $comando->execute();

    }else{

        $n = $n.'%';
        $comando = $db->prepare('SELECT idproduto,
                                        nome,
                                        valor, 
                                        estoque,
                                        composto
                                   FROM produto
                                  WHERE upper(produto.nome) like upper(:nome)');                                         
        $comando->execute([':nome'=> $n]);
    }
     
    echo json_encode($comando->fetchAll(PDO::FETCH_ASSOC));

} catch (PDOException $e) {
    echo 'Erro com o banco de dados: ' . $e->getMessage();
    close($db);
    exit();
}


?>
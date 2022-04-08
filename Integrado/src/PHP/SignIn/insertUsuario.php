<?php

require_once '../Conection/db.php';

$nome = $_POST['nome'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$comando = $db->prepare('INSERT INTO usuario(nome,
                                             dsusuario,
                                             dspassword)
                                VALUES (:nome,
                                        :usuario,
                                        :senha)');                                         

$comando->execute([':nome'=> $nome, ':usuario'=>$usuario, ':senha'=>$senha]);
echo json_encode($comando->fetchAll(PDO::FETCH_ASSOC));

?>
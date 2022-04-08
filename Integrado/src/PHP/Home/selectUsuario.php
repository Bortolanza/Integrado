<?php

require_once '../Conection/db.php';
require_once '../Controller/indexFunction.php';

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

try {

$comando = $db->prepare('SELECT CASE WHEN dsusuario IS NOT NULL 
                                     THEN true END AS validacao,
                                     nome   
                           FROM usuario 
                          WHERE dsusuario = :usuario
                                AND dspassword = :senha');                                         

$comando->execute([':usuario'=>$usuario, ':senha'=>$senha]);

$var = $comando->fetchAll(PDO::FETCH_ASSOC);


$value = $var[0];


if ($valid =$value['validacao'] == 1){
    $_SESSION['logado']=1;
    $_SESSION['nome']=$value['nome'];
    echo $_SESSION['logado'];
};

} catch (PDOException $e) {
    echo 'Erro ao executar comando no banco de dados: ' . $e->getMessage();
    close($db);
    exit();
};

?>
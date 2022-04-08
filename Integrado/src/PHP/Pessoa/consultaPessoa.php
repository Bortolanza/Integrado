<?php

header('Content-type: application/json');

require_once '../Conection/db.php';

$n=$_GET['nome'];
$d=$_GET['documento'];
$e=$_GET['email'];

try {


    if (strlen($n) == 0 && strlen($d) == 0 && strlen($e) == 0){
        $comando = $db->prepare('SELECT * 
                                   FROM pessoa
                                   JOIN pessoacontato ON pessoa.idpessoa = pessoacontato.idpessoa');
        $comando->execute();
    }else{

        if (strlen($n) != 0){
            $n = $n.'%';
        };

        if (strlen($d) != 0){
            $d = $d.'%';
        };

        if (strlen($e) != 0){
            $e = $e.'%';
        };
        
        $comando = $db->prepare('SELECT * 
                                   FROM pessoa
                                   JOIN pessoacontato ON pessoa.idpessoa = pessoacontato.idpessoa
                                  WHERE upper(pessoa.nome) like upper(:nome)
                                        OR upper(pessoacontato.dsemail) like upper(:email)
                                        OR pessoa.documento like :documento');                                         
        $comando->execute([':nome'=> $n,':email' => $e,':documento' => $d]);
    }
    /*join pessoacontato on pessoa.idpessoa = pessoacontato.idpessoa 
                              where pessoa.nome = :nome or pessoacontato.dscontato = :email or pessoa.documento = :documento' */
        echo json_encode($comando->fetchAll(PDO::FETCH_ASSOC));

} catch (PDOException $e) {
    echo 'Erro ao executar comando no banco de dados: ' . $e->getMessage();
    close($db);
    exit();
};

?>
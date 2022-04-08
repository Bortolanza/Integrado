<?php

session_start();

function redir_autenticacao(){
    if(!isset($_SESSION['logado']) || $_SESSION['logado'] != true){
        header('Location: /Integrado/index.php');
        exit;   
    };

    
};

function logout(){

    session_start();
    unset($_SESSION['logado']);
    header('Location: ../../../../index.php');
    exit();
    
}


?>
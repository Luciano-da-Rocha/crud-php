<?php
session_start();

//conectando ao BD
require_once 'db-connect.php';

// criando uma função para evitar xss

function clear($input){
    global $connect;
    //protegendo do SQL injection
    $var = mysqli_escape_string($connect, $input);
    // protegendo do xss
    $var = htmlspecialchars($var);
    return $var;
}

if(isset($_POST['btn-cadastrar'])):
    
        $idade = clear($_POST['idade']);
        //filtrando os dados inseridos nos formularios contra SQL injection
        $nome = clear($_POST['nome']);
        $sobrenome = clear($_POST['sobrenome']);
        $email = clear($_POST['email']);
    
    
    

    // inserindo os dados por meio de uma query no BD. A query é guardada numa variavel
    $sql = "INSERT INTO clientes (nome, sobrenome, email, idade) VALUES ('$nome','$sobrenome','$email','$idade')";
    if(mysqli_query($connect,$sql)):
        $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        header('Location: ../index.php?sucesso');
    else:
        header('Location: ../index.php?erro');
        $_SESSION['mensagem'] = "Erro ao cadastrar!";
        
    endif;
endif;




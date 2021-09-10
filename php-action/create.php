<?php
session_start();

//conectando ao BD
require_once 'db-connect.php';

if(isset($_POST['btn-cadastrar'])):
    
        $idade = mysqli_escape_string($connect, $_POST['idade']);
        //filtrando os dados inseridos nos formularios contra SQL injection
        $nome = mysqli_escape_string($connect, $_POST['nome']);
        $sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
        $email = mysqli_escape_string($connect, $_POST['email']);
    
    
    

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




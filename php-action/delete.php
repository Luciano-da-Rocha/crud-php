<?php
session_start();

//conectando ao BD
require_once 'db-connect.php';

// se apertarem o btn deletar...
if(isset($_POST['btn-deletar'])):
    
        $idade = mysqli_escape_string($connect, $_POST['idade']);
        //filtrando os dados inseridos nos formularios contra SQL injection e inserindo num array
        $nome = mysqli_escape_string($connect, $_POST['nome']);
        $sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
        $email = mysqli_escape_string($connect, $_POST['email']);
        $id = mysqli_escape_string($connect, $_POST['id']);
    
    
    

    // inserindo os dados por meio de uma query no BD. A query é guardada numa variavel
    $sql = "DELETE FROM clientes WHERE id = '$id'";
    if(mysqli_query($connect,$sql)):
        $_SESSION['mensagem'] = "Deletado com sucesso!";
        header('Location: ../index.php?sucesso');
    else:
        header('Location: ../index.php?erro');
        $_SESSION['mensagem'] = "Erro ao deletar!";
        
    endif;
endif;




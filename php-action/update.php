<?php
session_start();

//conectando ao BD
require_once 'db-connect.php';

if(isset($_POST['btn-editar'])):
    
        $idade = mysqli_escape_string($connect, $_POST['idade']);
        //filtrando os dados inseridos nos formularios contra SQL injection e inserindo num array
        $nome = mysqli_escape_string($connect, $_POST['nome']);
        $sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
        $email = mysqli_escape_string($connect, $_POST['email']);
        $id = mysqli_escape_string($connect, $_POST['id']);
    
    
    

    // inserindo os dados por meio de uma query no BD. A query é guardada numa variavel
    $sql = "UPDATE clientes SET nome = '$nome', sobrenome = '$sobrenome', email = '$email', idade = '$idade' WHERE id = '$id'";
    if(mysqli_query($connect,$sql)):
        $_SESSION['mensagem'] = "Atualizado com sucesso!";
        header('Location: ../index.php?sucesso');
    else:
        header('Location: ../index.php?erro');
        $_SESSION['mensagem'] = "Erro ao atualizar!";
        
    endif;
endif;




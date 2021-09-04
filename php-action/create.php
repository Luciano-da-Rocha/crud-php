<?php
//conectando ao BD

require_once 'db-connect.php';

if(isset($_POST['btn-cadastrar'])):
    //filtrando os dados inseridos nos formularios contra SQL injection
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $idade = mysqli_escape_string($connect, $_POST['idade']);

    // inserindo os dados por meio de uma query no BD. A query é guardada numa variavel
    $sql = "INSERT INTO clientes (nome, sobrenome, email, idade) VALUES ('$nome','$sobrenome','$email','$idade')";
    if(mysqli_query($connect,$sql)):
        header('Location: ../index.php?sucesso');
    else:
        header('Location: ../index.php?erro');
    endif;
endif;




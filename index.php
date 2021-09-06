<?php
include_once 'includes/header.php';
include_once 'php-action/db-connect.php';
?>
<?php
//usando o framework materialize
?>
<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light"> Clientes cadastrados na Base de Dados MYSQL </h3>

        <table class="stripped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Email</th>
                    <th>Idade</th>

                </tr>
                
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM clientes";
                $resultado = mysqli_query($connect, $sql);
                // msqli_fetch_array cria um array para cada linha da tabela do banco de dado e cria o indice correspondente 
                while($dados =  mysqli_fetch_array($resultado)):
                ?>
                <tr>
                    <td><?php echo $dados['nome']; ?></td>
                    <td><?php echo $dados['sobrenome']; ?></td>
                    <td><?php echo $dados['email']; ?></td>
                    <td><?php echo $dados['idade']; ?></td>
                    <td><a href="" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
                    <td><a href="" class="btn-floating black"><i class="material-icons">delete</i></a></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table><br>
        <a href="adicionar.php" class="btn">Adicionar cliente</a>
    </div>
</div>

<?php
include_once 'includes/footer.php';
?>

      
        
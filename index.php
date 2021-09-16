<?php
//sessao
session_start();
if(isset($_SESSION['mensagem'])):
    
    ?>
    <script>
    window.onload = function(){
        M.toast({html: "<?php echo $_SESSION['mensagem'];?>"})
    }
</script>
<?php
endif;

session_unset();

include_once 'includes/header.php';
include_once 'php-action/db-connect.php';
?>
<?php
//usando o framework materialize
?>
<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light"> Clientes cadastrados no Banco de Dados </h3>

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
                    <td><a href="editar.php?id=<?php echo $dados['id'];?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
                    <!-- adicionando o modal estando no look tem q enfiar o php no href-->
                    <td><a href="#modal<? echo $dados['id'];?>" class="btn-floating black modal-trigger"><i class="material-icons">delete</i></a></td>

                    <!-- Modal Structure -->
  <div id="modal<? echo $dados['id'];?>" class="modal">
    <div class="modal-content">
      <h4>Atenção!</h4>
      <p>Deseja mesmo deletar os dados?</p>
    </div>
    <div class="modal-footer">
      
      <form action="php-action/delete.php" method="POST"><input type="hidden" name="id" value="<?php echo $dados['id']?>"><button type="submit" name="btn-deletar" class="btn red">Sim, continuar</button>
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a></form>
      
    </div>
  </div>

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

      
        
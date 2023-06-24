<?php
include_once('php_action/conexao.php');
include_once('includes/header.php');
  if(isset($_GET['id'])){
    $id = pg_escape_string($oConexao, $_GET['id']);
    $pge = "SELECT * FROM clientes WHERE codigo = '$id'";
    $resultado = pg_query($oConexao, $pge);
    $dados = pg_fetch_array($resultado);
  }
?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light"> Editar Cliente</h3>
        <form action="php_action/update.php" method="POST">
            <input type="hidden" name="codigo" value="<?php echo $dados['codigo'];?>">
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" value="<?php echo $dados['nome'];?>">
                <label for="nome">Nome</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="sobrenome" id="sobrenome" value="<?php echo $dados['sobrenome'];?>">
                <label for="sobrenome">Sobrenome</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="email" id="email" value="<?php echo $dados['email'];?>"> 
                <label for="email">E-mail</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="idade" id="idade" value="<?php echo $dados['idade'];?>">
                <label for="idade">Idade </label>
            </div>

            <button type="submit" name="btn-editar" class="btn">Atualizar </button>
            
            <a href="index.php" class="btn green">Lista de clientes</a>

        </form>
    </div>
</div>





<?php
include_once('includes/footer.php');
?>
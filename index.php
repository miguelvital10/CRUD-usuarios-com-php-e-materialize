<?php
session_start();
if(isset($_SESSION['mensagem'])){ ?>
    <script>
    //Mensage de sucesso ou falha 
    window.onload = function() {
        M.toast({html: '<?php echo $_SESSION['mensagem'];?>'})
    };
    </script>

<?php
}
session_unset();
include_once('php_action/conexao.php');
include_once('includes/header.php');
?>


<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light"> Clientes </h3>
        <table class="striped">
            <thead>
                <tr>
                    <th>Nome:</th>
                    <th>Sobrenome:</th>
                    <th>E-mail:</th>
                    <th>Idade:</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $pge = "SELECT * FROM clientes";
                    $resultado = pg_query($oConexao, $pge);
                    if(pg_num_rows($resultado)> 0){

                    
                    while($dados = pg_fetch_array($resultado)){
                ?>
                    <tr>
                        <td><?php echo $dados['nome'];?></td>
                        <td><?php echo $dados['sobrenome'];?></td>
                        <td><?php echo $dados['email'];?></td>
                        <td><?php echo $dados['idade'];?></td>

                        <td><a href="editar.php?id=<?php echo $dados['codigo'];?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>

                        <td><a href="#modal<?php echo $dados['codigo'];?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>
                        <!--Mensagem modal-->
                        <div id="modal<?php echo $dados['codigo']; ?>" class="modal">
                            <div class="modal-content">
                                <h4>Olá!</h4>
                                <p>Tem certeza que deseja excluir esse cliente?</p>
                            </div>
                            <div class="modal-footer">
                                 <form action="php_action/delete.php" method="POST">
                                    <input type="hidden" name="codigo" value="<?php echo $dados['codigo']; ?>">
                                    <button type="submit" name="btn-deletar" class="btn red">Sim,quero deletar</button>
                                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                 </form>
                            </div>
                        </div>
                    </tr>

                <?php }; }else{?>
                    <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <br>
        <a href="adicionar.php" class="btn">ADICIONAR CLIENTE</a>
    </div>
</div>







<?php
include_once('includes/footer.php');
?>
<h1>
    Excluir aluno
</h1>
<p class="lead">
    <span class="label label-warning">Aten&ccedil;&atilde;o:</span> Esta a&ccedil;&atilde;o n&atilde;o poder&aacute; ser desfeita.
</p>
<form method="post" class="form">
    <table class="table">
        <thead>
        <th>Nome</th>
        <th>Nota</th>
        <th>&nbsp;</th>
        </thead>
        <?php
        require("Alunos.php");
        try {
            $cnx = new \PDO("mysql:host=localhost;dbname=pdo", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        }catch (PDOException $e){
            echo '<pre>Erro código '.$e->getCode().'.</pre> Enviando mensagem de alerta ao webmaster...';
        }
        if(isset($_POST['nome']) && isset($_POST['nota'])) {
            $aluno = new Alunos($cnx);
            $result = $aluno->excluir($id);
            if($result==1){ echo "<tr><td><span class='label label-success'>O aluno foi removido do sistema!</span></td></tr>";}
        }else {
            $aluno = new Alunos($cnx);
            $result = $aluno->find($id);
            echo "<tr><td><input class='form-control' type='text' value='" . $result['nome'] . "' disabled><input type='hidden' name='nome' value='" . $result['nome'] . "'></td><td><input class='form-control' type='text' name='nota' value='" . $result['nota'] . "' disabled><input type='hidden' name='nota' value='" . $result['nota'] . "'></td><td align='center'><button type='submit' class='btn btn-danger'>Excluir</button></td></tr>";
        }

        ?>
    </table>

</form>

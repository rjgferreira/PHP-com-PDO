<h1>
    Visualizar aluno
</h1>
<p class="lead">
    Simples apresenta&ccedil;&atilde;o das informa&ccedil;&otilde;es referentes ao aluno.
</p>
<form method="post" class="form">
    <table class="table">
        <thead>
        <th>Nome</th>
        <th>Nota</th>
        </thead>
        <?php
        require("Alunos.php");
        try {
            $cnx = new \PDO("mysql:host=localhost;dbname=pdo", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        }catch (PDOException $e){
            echo '<pre>Erro código '.$e->getCode().'.</pre> Enviando mensagem de alerta ao webmaster...';
        }
        $aluno = new Alunos($cnx);
        $result= $aluno->find($id);
        echo "<tr><td><input class='form-control' type='text' name='nome' value='".$result['nome']."' disabled></td><td><input class='form-control' type='text' name='nota' value='".$result['nota']."' disabled></td></tr>";
        ?>
    </table>
</form>

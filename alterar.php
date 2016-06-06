<h1>
    Alterar aluno
</h1>
<p class="lead">
    Corrija nome e nota de um aluno.
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
        $aluno = new Alunos($cnx);
        if(isset($_POST['nome']) && isset($_POST['nota'])) {
            $aluno->setId($id)
                ->setNome($_POST['nome'])
                ->setNota($_POST['nota']);
            $result = $aluno->alterar();
            if($result==1){ echo "<span class='label label-success'>Registro alterado com sucesso!</span>";}
        }
        $result2 = $aluno->find($id);
        echo "<tr><td><input class='form-control' type='text' name='nome' value='".$result2['nome']."'></td><td><input class='form-control' type='text' name='nota' value='".$result2['nota']."'></td><td align='center'><button type='submit' class='btn btn-warning'>Alterar</button></td></tr>";
        ?>
    </table>
</form>

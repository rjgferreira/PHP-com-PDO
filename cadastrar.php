<h1>
    Cadastro de alunos
</h1>
<p class="lead">
    Registrar um novo aluno no sistema.
</p>
<form method="post" class="form">
    <table class="table">
        <thead>
        <th>Nome</th>
        <th>Nota</th>
        <th>&nbsp;</th>
        </thead>
        <?php
        if(isset($_POST['nome']) && isset($_POST['nota'])) {
            require("Alunos.php");
            try {
                $cnx = new \PDO("mysql:host=localhost;dbname=pdo", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            } catch (PDOException $e) {
                echo '<pre>Erro código ' . $e->getCode() . '.</pre> Enviando mensagem de alerta ao webmaster...';
            }
            $aluno = new Alunos($cnx);
            $aluno->setNome($_POST['nome'])
                  ->setNota($_POST['nota']);
            $result = $aluno->inserir();
            if ($result == 1) {
                echo "<span class='label label-success'>O aluno foi registro com sucesso!</span>";
            }
        }
        ?>
        <tr>
            <td>
                <input class='form-control' type='text' name='nome' placeholder="Nome">
            </td>
            <td>
                <input class='form-control' type='text' name='nota' placeholder="Nota">
            </td>
            <td align='center'>
                <button type='submit' class='btn btn-primary'>Cadastrar</button>
            </td>
        </tr>
    </table>
</form>

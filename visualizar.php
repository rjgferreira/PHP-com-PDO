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
        require_once("Alunos.php");
        require_once("dbconfig.php");
        $conn = dbCnct();
        $aluno = new Alunos($conn);
        $result= $aluno->find($id);
        echo "<tr><td><input class='form-control' type='text' name='nome' value='".$result['nome']."' disabled></td><td><input class='form-control' type='text' name='nota' value='".$result['nota']."' disabled></td></tr>";
        ?>
    </table>
</form>

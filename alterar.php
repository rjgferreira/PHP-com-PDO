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
        require_once("Alunos.php");
        require_once("dbconfig.php");
        $conn = dbCnct();
        $aluno = new Alunos($conn);
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

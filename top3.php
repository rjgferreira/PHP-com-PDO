<h1>
    Top 3 alunos
</h1>
<p class="lead">
    Lista dos 3 primeiros alunos da classe.
</p>
<table class="table">
    <thead>
    <th width="5%">ID</th>
    <th>Nome</th>
    <th>Nota</th>
    </thead>
    <?php
    try {
        $conn = new \PDO("mysql:host=localhost;dbname=pdo", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        $query = "SELECT * FROM alunos ORDER BY nota DESC LIMIT 3";
        $sttmt = $conn->query($query);
        $res = $sttmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($res as $alunos){
            echo "<tr>
                    <td>".$alunos['id']."</td>
                    <td>"."".$alunos['nome']."</td>
                    <td>".$alunos['nota']."</td>
                 </tr>";
        }
    }catch (PDOException $e){
        echo '<pre>Erro código '.$e->getCode().'.</pre> Enviando mensagem de alerta ao webmaster...';
    }
    ?>
</table>

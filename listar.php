<h1>
    Listagem de alunos
</h1>
<p class="lead">
    Lista completa dos alunos e suas respectivas notas. Altere ou exclua registros.
</p>

<table class="table">
    <thead>
    <th width="5%">ID</th>
    <th>Nome</th>
    <th>Nota</th>
    <th>&nbsp;</th>
    </thead>
    <?php
    try {
        $conn = new \PDO("mysql:host=localhost;dbname=pdo", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        $query = "SELECT * FROM alunos";
        $sttmt = $conn->query($query);
        $res = $sttmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($res as $alunos){
            echo "<tr>
                            <td>".$alunos['id']."</td>
                            <td>".$alunos['nome']."</td>
                            <td>".$alunos['nota']."</td>
                            <td>".
                                '<div class="btn-group" role="group" aria-label="...">
                                  <button type="button" class="btn btn-warning" onclick="window.location=\'alterar/'.$alunos['id'].'\';">Alterar</button>
                                  <button type="button" class="btn btn-info" onclick="window.location=\'visualizar/'.$alunos['id'].'\';">Visualizar</button>
                                  <button type="button" class="btn btn-danger" onclick="window.location=\'excluir/'.$alunos['id'].'\';">Excluir</button>
                                </div>'."
                            </td>
                         </tr>";
        }
    }catch (PDOException $e){
        echo '<pre>Erro código '.$e->getCode().'.</pre> Enviando mensagem de alerta ao webmaster...';
    }
    ?>
</table>

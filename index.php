<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PHP com PDO</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">PDO com PHP</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li <?php if((isset($_GET['actn'])&&$_GET['actn']=='listar')||!isset($_GET['actn'])) echo 'class="active"' ?>><a href="?actn=listar"">Listar alunos</a></li>
                <li <?php if(isset($_GET['actn'])&&$_GET['actn']=='top3') echo 'class="active"' ?>><a href="?actn=top3">Top 3 Notas</a></li>
            </ul>
        </div>
    </nav>
    <div class="jumbotron">
        <h1><?php if((isset($_GET['actn'])&&$_GET['actn']=='listar')||!isset($_GET['actn'])) echo 'Listagem de alunos'; else echo 'Top 3 notas'; ?></h1>
        <p class="lead"><?php if((isset($_GET['actn'])&&$_GET['actn']=='listar')||!isset($_GET['actn'])) echo 'Lista completa dos alunos e suas respectivas notas.'; else echo 'Lista dos 3 primeiros alunos da classe.'; ?></p>
        <table class="table">
            <thead>
            <th width="5%">ID</th><th>Nome</th><th>Nota</th>
            </thead>
            <?php
            try {
                $conn = new \PDO("mysql:host=localhost;dbname=pdo", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
                if(isset($_GET['actn']))
                    if($_GET['actn']=='top3')
                        $query = "SELECT * FROM alunos ORDER BY nota DESC LIMIT 3";
                    else
                        $query = "SELECT * FROM alunos";
                else
                    $query = "SELECT * FROM alunos";
                $sttmt = $conn->query($query);
                $res = $sttmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($res as $alunos){
                    echo "<tr><td>".$alunos['id']."</td><td>"."".$alunos['nome']."</td><td>".$alunos['nota']."</td></tr>";
                }
            }catch (PDOException $e){
                echo '<pre>Erro código '.$e->getCode().'.</pre> Enviando mensagem de alerta ao webmaster...';
            }
            ?>
        </table>
    </div>
    <footer class="footer">
        <p>Todos os direitos resevados - <?php echo date('Y'); ?></p>
    </footer>
</div>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script>
    <?php if($path=='') echo '$("ul li").eq(0).addClass("active");'; ?>
    <?php if($path=='Contato')
             if(isset($_SESSION['N']))
                 echo "$('input[name*=\"nome\"]').val('".$_SESSION['N']."');";
             if(isset($_SESSION['E']))
                 echo "$('input[name*=\"email\"]').val('".$_SESSION['E']."');";
             if(isset($_SESSION['A']))
                 echo "$('input[name*=\"assunto\"]').val('".$_SESSION['A']."');";
             if(isset($_SESSION['M']))
                 echo "$('input[name*=\"mensagem\"]').val('".$_SESSION['M']."');";
     ?>
</script>
</body>
</html>
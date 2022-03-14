<!DOCTYPE html>
<?php
include_once "acao3.php";
$acao = isset($_GET['acao']) ? $_GET['acao'] : "";
$dados;
if ($acao == 'editar'){
    $id = isset($_GET['id_filme']) ? $_GET['id_filme'] : "";
    if ($id > 0)
        $dados = buscarDados($id);
}
//var_dump($dados);
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Dados</title>
</head>
<body>  

<br>
<a href="index3.php"><button>Listar</button></a>
<a href="cad3.php"><button>Novo</button></a>
<br>
<form action="acao3.php" method="post">
    <input readonly  type="text" name="id_filme" id="id_filme" value="<?php if ($acao == "editar") echo $dados['id_filme']; else echo 0; ?>"><br>
    <input required=true   type="text" name="nomefilme" id="nomefilme" value="<?php if ($acao == "editar") echo $dados['nomefilme']; ?>"><br>
    <input required=true   type="text" name="datalancamento" id="datalancamento" value="<?php if ($acao == "editar") echo $dados['datalancamento']; ?>"><br>
    <input required=true   type="text" name="custototal" id="custototal" value="<?php if ($acao == "editar") echo $dados['custototal']; ?>"><br>
    <input required=true   type="text" name="tempodeproducao" id="tempodeproducao" value="<?php if ($acao == "editar") echo $dados['tempodeproducao']; ?>"><br>
    
    <br><button type="submit" name="acao" id="acao" value="salvar">Salvar</button>
</form>
</body>
</html>
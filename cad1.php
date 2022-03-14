<!DOCTYPE html>
<?php
include_once "acao1.php";
$acao = isset($_GET['acao']) ? $_GET['acao'] : "";
$dados;
if ($acao == 'editar'){
    $id = isset($_GET['id_ator']) ? $_GET['id_ator'] : "";
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
<a href="index1.php"><button>Listar</button></a>
<a href="cad1.php"><button>Novo</button></a>
<br>
<form action="acao1.php" method="post">
    <input readonly  type="text" name="id_ator" id="id_ator" value="<?php if ($acao == "editar") echo $dados['id_ator']; else echo 0; ?>"><br>
    <input required=true   type="text" name="nomeator" id="nomeator" value="<?php if ($acao == "editar") echo $dados['nomeator']; ?>"><br>
    <input required=true   type="text" name="sexo" id="sexo" value="<?php if ($acao == "editar") echo $dados['sexo']; ?>"><br>
    <input required=true   type="text" name="nacionalidade" id="nacionalidade" value="<?php if ($acao == "editar") echo $dados['nacionalidade']; ?>"><br>
    <input required=true   type="text" name="nomeartistico" id="nomeartistico" value="<?php if ($acao == "editar") echo $dados['nomeartistico']; ?>"><br>
    <br><button type="submit" name="acao" id="acao" value="salvar">Salvar</button>
</form>
</body>
</html>
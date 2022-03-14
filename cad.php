<!DOCTYPE html>
<?php
include_once "acao.php";
$acao = isset($_GET['acao']) ? $_GET['acao'] : "";
$dados;
if ($acao == 'editar'){
    $id = isset($_GET['id']) ? $_GET['id'] : "";
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
<a href="index.php"><button>Listar</button></a>
<a href="cad.php"><button>Novo</button></a>
<br>
<form action="acao.php" method="post">
    <input readonly  type="text" name="id" id="id" value="<?php if ($acao == "editar") echo $dados['id']; else echo 0; ?>"><br>
    <input required=true   type="text" name="nomeestudio" id="nomeestudio" value="<?php if ($acao == "editar") echo $dados['nomeestudio']; ?>"><br>
    <input required=true   type="text" name="dataFundacao" id="dataFundacao" value="<?php if ($acao == "editar") echo $dados['dataFundacao']; ?>"><br>
    <input required=true   type="text" name="faturametoAnual" id="faturametoAnual" value="<?php if ($acao == "editar") echo $dados['faturametoAnual']; ?>"><br>
    <br><button type="submit" name="acao" id="acao" value="salvar">Salvar</button>
</form>
</body>
</html>
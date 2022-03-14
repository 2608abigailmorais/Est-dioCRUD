<!DOCTYPE html>
<?php
include_once "acao2.php";
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
<a href="index2.php"><button>Listar</button></a>
<a href="cad2.php"><button>Novo</button></a>
<br>
<form action="acao2.php" method="post">
    <input readonly  type="text" name="id" id="id" value="<?php if ($acao == "editar") echo $dados['id']; else echo 0; ?>"><br>
    <input required=true   type="text" name="pais" id="pais" value="<?php if ($acao == "editar") echo $dados['pais']; ?>"><br>
    <input required=true   type="text" name="estado" id="estado" value="<?php if ($acao == "editar") echo $dados['estado']; ?>"><br>
    <input required=true   type="text" name="cidade" id="cidade" value="<?php if ($acao == "editar") echo $dados['cidade']; ?>"><br>
    <input required=true   type="text" name="estudio_id" id="estudio_id" value="<?php if ($acao == "editar") echo $dados['estudio_id']; ?>"><br>
    <br><button type="submit" name="acao" id="acao" value="salvar">Salvar</button>
</form>
</body>
</html>
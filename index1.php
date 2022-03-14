<!DOCTYPE html>
<?php 
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    $title = "Estúdios - Atores e Atrizes";
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : "1";
    $procurar = isset($_POST['procurar']) ? $_POST['procurar'] : "";
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
    <link rel="stylesheet" href="css/estilo.css">
    <script>
        function excluirRegistro(url){
            if (confirm("Confirma Exclusão?"))
                location.href = url;
        }
    </script>
</head>
<body>
<?php include_once "menu.php"; ?>
<a href="cad1.php">Novo</a>
<form method="post">
    <input type="radio" name="tipo" id="tipo" value="1" <?php if ($tipo == 1) { echo "checked"; }?>>Nome<br>  
    <input type="radio" name="tipo" id="tipo" value="2" <?php if ($tipo == 2) { echo "checked"; }?>>Sexo<br>
    <input type="radio" name="tipo" id="tipo" value="3" <?php if ($tipo == 3) { echo "checked"; }?>>Nacionalidade<br>
    <input type="text" name="procurar" id="procurar" value="<?php echo $procurar; ?>">
    <input type="submit" value="Consultar Atores e Atrizes">
</form>
<br>
<table border="3">
       <tr><th>Código</th>
        <th>Nome</th> 
        <th>Sexo</th> 
        <th>Nacionalidade</th> 
        <th>Nome Artístico</th> 
        <th>Alterar</th> 
        <th>Excluir</th> 
    </tr>
<?php
    $sql = "";
    if ($tipo == 1){
        $sql = "SELECT * FROM ator WHERE nomeator LIKE '$procurar%' ORDER BY nomeator";
    }elseif ($tipo == 2){    
        $sql = "SELECT * FROM ator WHERE sexo LIKE '$procurar%' ORDER BY sexo";
    }else $sql = "SELECT * FROM ator WHERE nacionalidade LIKE '$procurar%' ORDER BY nacionalidade";

$pdo = Conexao::getInstance();
$consulta = $pdo->query($sql);
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <tr><td><?php echo $linha['id_ator'];?></td>
            <td><?php echo $linha['nomeator'];?></td>
            <td><?php echo $linha['sexo'];?></td>
            <td><?php echo $linha['nacionalidade'];?></td>
            <td><?php echo $linha['nomeartistico'];?></td>
            <td><a href='cad1.php?acao=editar&id_ator=<?php echo $linha['id_ator'];?>'><img class="icon" src="img/edit.png" alt="" width = 20 height = 20></a></td>
            <td><a href="javascript:excluirRegistro('acao1.php?acao=excluir&id=<?php echo $linha['id_ator'];?>')"><img class="icon" src="img/delete.jpeg" alt="" width = 30 height = 30></a></td>
    <?php } ?>       
    </table>      
</body>
</html>
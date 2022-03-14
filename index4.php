<!DOCTYPE html>
<?php 
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    $title = "Estúdios - Nossos Estúdios";
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
<a href="cad4.php">Novo</a>
<form method="post">
    <input type="radio" name="tipo" id="tipo" value="1" <?php if ($tipo == 1) { echo "checked"; }?>>Nome do Filme<br>  
    <input type="radio" name="tipo" id="tipo" value="2" <?php if ($tipo == 2) { echo "checked"; }?>>Nome do Ator<br>
    <input type="text" name="procurar" id="procurar" value="<?php echo $procurar; ?>">
    <input type="submit" value="Consultar Estúdios">
</form>
<br>
<table border="3">
        <th>Nome do Filme</th>
        <th>Nome do Ator</th> 
        <th>Função</th> 
        <th>Cache</th>
        <th>Nome do Personagem</th>
        <th>Alterar</th> 
        <th>Excluir</th> 
    </tr>
<?php
    $sql = "";
    if ($tipo == 1){
        $sql = "SELECT * FROM filmeator, filme, ator WHERE nomefilme LIKE '$procurar%' AND filme.id_filme = filmeator.filme_id AND ator.id_ator= filmeator.ator_id ORDER BY nomefilme";
    }else{    
        $sql = "SELECT * FROM filmeator, filme, ator WHERE nomeator LIKE '$procurar%' AND filme.id_filme = filmeator.filme_id AND ator.id_ator= filmeator.ator_id ORDER BY nomeator";
    }

$pdo = Conexao::getInstance();
$consulta = $pdo->query($sql);
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <tr>
            <td><?php echo $linha['nomefilme'];?></td>
            <td><?php echo $linha['nomeator'];?></td>
            <td><?php echo $linha['funcao'];?></td>
            <td><?php echo number_format($linha['cache'], 1, ',', '.');?></td>
            <td><?php echo $linha['nomepersonagem'];?></td>
            <td><a href='cad4.php?acao=editar&id=<?php echo $linha['id'];?>'><img class="icon" src="img/edit.png" alt="" width = 20 height = 20></a></td>
            <td><a href="javascript:excluirRegistro('acao4.php?acao=excluir&id=<?php echo $linha['id'];?>')"><img class="icon" src="img/delete.jpeg" alt="" width = 30 height = 30></a></td>
    <?php } ?>       
    </table>      
</body>
</html>
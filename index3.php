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
<a href="cad3.php">Novo</a>
<form method="post">
    <input type="radio" name="tipo" id="tipo" value="1" <?php if ($tipo == 1) { echo "checked"; }?>>Nome<br>  
    <input type="radio" name="tipo" id="tipo" value="2" <?php if ($tipo == 2) { echo "checked"; }?>>Custo Total<br>
    <input type="text" name="procurar" id="procurar" value="<?php echo $procurar; ?>">
    <input type="submit" value="Consultar Estúdios">
</form>
<br>
<table border="3">
       <tr><th>Código</th>
        <th>Nome</th>
        <th>Data de Lançamento</th> 
        <th>Custo Total</th> 
        <th>Tempo de Produção</th>
        <th>Estúdio</th>
        <th>Alterar</th> 
        <th>Excluir</th> 
    </tr>
<?php
    $sql = "";
    if ($tipo == 1){
        $sql = "SELECT * FROM filme, estudio WHERE nomefilme LIKE '$procurar%' AND estudio.id = filme.estudio_id  ORDER BY nomefilme";
    }else{    
        $sql = "SELECT * FROM filme WHERE custototal<= '$procurar%' ORDER BY custototal";
    }

$pdo = Conexao::getInstance();
$consulta = $pdo->query($sql);
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <tr><td><?php echo $linha['id_filme'];?></td>
            <td><?php echo $linha['nomefilme'];?></td>
            <td><?php echo date("d/m/Y",strtotime($linha['datalancamento']));?></td>
            <td><?php echo number_format($linha['custototal'], 1, ',', '.');?></td>
            <td><?php echo $linha['tempodeproducao'];?></td>
            <td><?php echo $linha['nomeestudio'];?></td>
            <td><a href='cad3.php?acao=editar&id=<?php echo $linha['id'];?>'><img class="icon" src="img/edit.png" alt="" width = 20 height = 20></a></td>
            <td><a href="javascript:excluirRegistro('acao3.php?acao=excluir&id=<?php echo $linha['id'];?>')"><img class="icon" src="img/delete.jpeg" alt="" width = 30 height = 30></a></td>
    <?php } ?>       
    </table>      
</body>
</html>
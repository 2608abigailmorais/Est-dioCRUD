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
<a href="cad.php">Novo</a>
<form method="post">
    <input type="radio" name="tipo" id="tipo" value="1" <?php if ($tipo == 1) { echo "checked"; }?>>Nome<br>  
    <input type="radio" name="tipo" id="tipo" value="2" <?php if ($tipo == 2) { echo "checked"; }?>>Faturamento Anual<br>
    <input type="text" name="procurar" id="procurar" value="<?php echo $procurar; ?>">
    <input type="submit" value="Consultar Estúdios">
</form>
<br>
<table border="3">
       <tr><th>Código</th>
        <th>Nome</th> 
        <th>Data da Fundação</th> 
        <th>Faturamento Anual</th> 
        <th>Alterar</th> 
        <th>Excluir</th> 
    </tr>
<?php
    $sql = "";
    if ($tipo == 1){
        $sql = "SELECT * FROM estudio WHERE nomeestudio LIKE '$procurar%' ORDER BY nomeestudio";
    }else{    
        $sql = "SELECT * FROM estudio WHERE faturametoAnual<= '$procurar%' ORDER BY faturametoAnual";
    }

$pdo = Conexao::getInstance();
$consulta = $pdo->query($sql);
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <tr><td><?php echo $linha['id'];?></td>
            <td><?php echo $linha['nomeestudio'];?></td>
            <td><?php echo date("d/m/Y",strtotime($linha['dataFundacao']));?></td>
            <td><?php echo number_format($linha['faturametoAnual'], 1, ',', '.');?></td>
            <td><a href='cad.php?acao=editar&id=<?php echo $linha['id'];?>'><img class="icon" src="img/edit.png" alt="" width = 20 height = 20></a></td>
            <td><a href="javascript:excluirRegistro('acao.php?acao=excluir&id=<?php echo $linha['id'];?>')"><img class="icon" src="img/delete.jpeg" alt="" width = 30 height = 30></a></td>
    <?php } ?>       
    </table>      
</body>
</html>
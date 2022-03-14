<?php

    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

    // Se foi enviado via GET para acao entra aqui
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $id = isset($_GET['id_ator']) ? $_GET['id_ator'] : 0;
        excluir($id);
    }

    // Se foi enviado via POST para acao entra aqui
    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $id = isset($_POST['id_ator']) ? $_POST['id_ator'] : "";
        if ($id == 0)
            inserir($id);
        else
            editar($id);
    }

    // Métodos para cada operação
    function inserir($id){
        $dados = dadosForm();
        //var_dump($dados);
        
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('INSERT INTO ator (nomeator, sexo, nacionalidade, nomeartistico) VALUES(:nomeator, :sexo, :nacionalidade, :nomeartistico)');
        $nomeator = $dados['nomeator'];
        $stmt->bindParam(':nomeator', $nomeator, PDO::PARAM_STR);
        $sexo = $dados['sexo'];
        $stmt->bindParam(':sexo', $sexo, PDO::PARAM_STR);
        $nacionalidade = $dados['nacionalidade'];
        $stmt->bindParam(':nacionalidade', $nacionalidade, PDO::PARAM_STR);
        $nomeartistico = $dados['nomeartistico'];
        $stmt->bindParam(':nomeartistico', $nomeartistico, PDO::PARAM_STR);
        $stmt->execute();
        header("location:cad1.php");
        
    }

    function editar($id){
        $dados = dadosForm();
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('UPDATE ator SET nomeator = :nomeator, sexo = :sexo, nacionalidade = :nacionalidade, nomeartistico = :nomeartistico  WHERE id_ator = :id_ator');
        $stmt->bindParam(':nomeator', $nomeator, PDO::PARAM_STR);
        $stmt->bindParam(':sexo', $sexo, PDO::PARAM_STR);
        $stmt->bindParam(':nacionalidade', $nacionalidade, PDO::PARAM_STR);
        $stmt->bindParam(':nomeartistico', $nomeartistico, PDO::PARAM_STR);
        $stmt->bindParam(':id_ator', $id, PDO::PARAM_INT);
        $nomeator = $dados['nomeator'];
        $sexo = $dados['sexo'];
        $nacionalidade = $dados['nacionalidade'];
        $nomeartistico = $dados['nomeartistico'];
        $id = $dados['id_ator'];
        $stmt->execute();
        header("location:index1.php");
    }

    function excluir($id){
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('DELETE from ator WHERE id_ator = :id_ator');
        $stmt->bindParam(':id_ator', $id, PDO::PARAM_INT);
        $id = $id;
        $stmt->execute();
        header("location:index1.php");
        
        //echo "Excluir".$codigo;

    }


    // Busca um item pelo código no BD
    function buscarDados($id){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM ator WHERE id_ator = $id");
        $dados = array();
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['id_ator'] = $linha['id_ator'];
            $dados['nomeator'] = $linha['nomeator'];
            $dados['sexo'] = $linha['sexo'];
            $dados['nacionalidade'] = $linha['nacionalidade'];
            $dados['nomeartistico'] = $linha['nomeartistico'];
        }
        //var_dump($dados);
        return $dados;
    }

    // Busca as informações digitadas no form
    function dadosForm(){
        $dados = array();
        $dados['id_ator'] = $_POST['id_ator'];
        $dados['nomeator'] = $_POST['nomeator'];
        $dados['sexo'] = $_POST['sexo'];
        $dados['nacionalidade'] = $_POST['nacionalidade'];
        $dados['nomeartistico'] = $_POST['nomeartistico'];
        return $dados;
    }

?>


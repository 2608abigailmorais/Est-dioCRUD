<?php

    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

    // Se foi enviado via GET para acao entra aqui
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        excluir($id);
    }

    // Se foi enviado via POST para acao entra aqui
    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $id = isset($_POST['id']) ? $_POST['id'] : "";
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
        $stmt = $pdo->prepare('INSERT INTO estudio (nomeestudio, dataFundacao, faturametoAnual) VALUES(:nomeestudio, :dataFundacao, :faturametoAnual)');
        $nomeestudio = $dados['nomeestudio'];
        $stmt->bindParam(':nomeestudio', $nomeestudio, PDO::PARAM_STR);
        $dataFundacao = $dados['dataFundacao'];
        $stmt->bindParam(':dataFundacao', $dataFundacao, PDO::PARAM_STR);
        $faturametoAnual = $dados['faturametoAnual'];
        $stmt->bindParam(':faturametoAnual', $faturametoAnual, PDO::PARAM_STR);
        $stmt->execute();
        header("location:cad.php");
        
    }

    function editar($id){
        $dados = dadosForm();
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('UPDATE estudio SET nomeestudio = :nomeestudio, dataFundacao = :dataFundacao, faturametoAnual = :faturametoAnual WHERE id = :id');
        $stmt->bindParam(':nomeestudio', $nomeestudio, PDO::PARAM_STR);
        $stmt->bindParam(':dataFundacao', $dataFundacao, PDO::PARAM_STR);
        $stmt->bindParam(':faturametoAnual', $faturametoAnual, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $nomeestudio = $dados['nomeestudio'];
        $dataFundacao = $dados['dataFundacao'];
        $faturametoAnual = $dados['faturametoAnual'];
        $id = $dados['id'];
        $stmt->execute();
        header("location:index.php");
    }

    function excluir($id){
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('DELETE from estudio WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $id = $id;
        $stmt->execute();
        header("location:index.php");
        
        //echo "Excluir".$codigo;

    }


    // Busca um item pelo código no BD
    function buscarDados($id){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM estudio WHERE id = $id");
        $dados = array();
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['id'] = $linha['id'];
            $dados['nomeestudio'] = $linha['nomeestudio'];
            $dados['dataFundacao'] = $linha['dataFundacao'];
            $dados['faturametoAnual'] = $linha['faturametoAnual'];
        }
        //var_dump($dados);
        return $dados;
    }

    // Busca as informações digitadas no form
    function dadosForm(){
        $dados = array();
        $dados['id'] = $_POST['id'];
        $dados['nomeestudio'] = $_POST['nomeestudio'];
        $dados['dataFundacao'] = $_POST['dataFundacao'];
        $dados['faturametoAnual'] = $_POST['faturametoAnual'];
        return $dados;
    }

?>


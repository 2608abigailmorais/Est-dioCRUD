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
        $stmt = $pdo->prepare('INSERT INTO endereco (pais, estado, cidade) VALUES(:pais, :estado, :cidade)');
        $pais = $dados['pais'];
        $stmt->bindParam(':pais', $pais, PDO::PARAM_STR);
        $estado = $dados['estado'];
        $stmt->bindParam(':estado', $estado, PDO::PARAM_STR);
        $cidade = $dados['cidade'];
        $stmt->bindParam(':cidade', $cidade, PDO::PARAM_STR);
        $stmt->execute();
        header("location:cad2.php");
        
    }

    function editar($id){
        $dados = dadosForm();
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('UPDATE endereco SET pais = :pais, estado = :estado, cidade = :cidade WHERE id = :id');
        $stmt->bindParam(':pais', $pais, PDO::PARAM_STR);
        $stmt->bindParam(':estado', $estado, PDO::PARAM_STR);
        $stmt->bindParam(':cidade', $cidade, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $pais = $dados['pais'];
        $estado = $dados['estado'];
        $cidade = $dados['cidade'];
        $id = $dados['id'];
        $stmt->execute();
        header("location:index2.php");
    }

    function excluir($id){
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('DELETE from endereco WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $id = $id;
        $stmt->execute();
        header("location:index2.php");
        
        //echo "Excluir".$codigo;

    }


    // Busca um item pelo código no BD
    function buscarDados($id){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM endereco WHERE id = $id");
        $dados = array();
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['id'] = $linha['id'];
            $dados['pais'] = $linha['pais'];
            $dados['estado'] = $linha['estado'];
            $dados['cidade'] = $linha['cidade'];
        }
        //var_dump($dados);
        return $dados;
    }

    // Busca as informações digitadas no form
    function dadosForm(){
        $dados = array();
        $dados['id'] = $_POST['id'];
        $dados['pais'] = $_POST['pais'];
        $dados['estado'] = $_POST['estado'];
        $dados['cidade'] = $_POST['cidade'];
        return $dados;
    }

?>


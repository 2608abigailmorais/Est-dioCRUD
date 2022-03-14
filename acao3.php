<?php

    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

    // Se foi enviado via GET para acao entra aqui
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $id = isset($_GET['id_filme']) ? $_GET['id_filme'] : 0;
        excluir($id_filme);
    }

    // Se foi enviado via POST para acao entra aqui
    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $id_filme = isset($_POST['id_filme']) ? $_POST['id_filme'] : "";
        if ($id_filme == 0)
            inserir($id_filme);
        else
            editar($id_filme);
    }

    // Métodos para cada operação
    function inserir($id_filme){
        $dados = dadosForm();
        //var_dump($dados);
        
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('INSERT INTO estudio (nomefilme, datalancamento, custototal, tempodeproducao) VALUES(:nomefilme, :datalancamento, :custototal, :tempodeproducao)');
        $nomefilme = $dados['nomefilme'];
        $stmt->bindParam(':nomefilme', $nomefilme, PDO::PARAM_STR);
        $datalancamento = $dados['datalancamento'];
        $stmt->bindParam(':datalancamento', $datalancamento, PDO::PARAM_STR);
        $custototal = $dados['custototal'];
        $stmt->bindParam(':custototal', $custototal, PDO::PARAM_STR);
        $tempodeproducao = $dados['tempodeproducao'];
        $stmt->bindParam(':tempodeproducao', $tempodeproducao, PDO::PARAM_STR);
        $stmt->execute();
        header("location:cad3.php");
        
    }

    function editar($id_filme){
        $dados = dadosForm();
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('UPDATE estudio SET nomefilme = :nomefilme, datalancamento = :datalancamento, custototal = :custototal WHERE id_filme = :id_filme');
        $stmt->bindParam(':nomefilme', $nomefilme, PDO::PARAM_STR);
        $stmt->bindParam(':datalancamento', $datalancamento, PDO::PARAM_STR);
        $stmt->bindParam(':custototal', $custototal, PDO::PARAM_STR);
        $stmt->bindParam(':tempodeproducao', $tempodeproducao, PDO::PARAM_STR);
        $stmt->bindParam(':id_filme', $id_filme, PDO::PARAM_INT);
        $nomefilme = $dados['nomefilme'];
        $datalancamento = $dados['datalancamento'];
        $custototal = $dados['custototal'];
        $tempodeproducao = $dados['tempodeproducao'];
        $id_filme = $dados['id_filme'];
        $stmt->execute();
        header("location:index3.php");
    }

    function excluir($id_filme){
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('DELETE from estudio WHERE id_filme = :id_filme');
        $stmt->bindParam(':id_filme', $id_filme, PDO::PARAM_INT);
        $id_filme = $id_filme;
        $stmt->execute();
        header("location:index3.php");
        
        //echo "Excluir".$codigo;

    }


    // Busca um item pelo código no BD
    function buscarDados($id_filme){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM estudio WHERE id_filme = $id_filme");
        $dados = array();
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['id_filme'] = $linha['id_filme'];
            $dados['nomefilme'] = $linha['nomefilme'];
            $dados['datalancamento'] = $linha['datalancamento'];
            $dados['custototal'] = $linha['custototal'];
            $dados['tempodeproducao'] = $linha['tempodeproducao'];
        }
        //var_dump($dados);
        return $dados;
    }

    // Busca as informações digitadas no form
    function dadosForm(){
        $dados = array();
        $dados['id_filme'] = $_POST['id_filme'];
        $dados['nomefilme'] = $_POST['nomefilme'];
        $dados['datalancamento'] = $_POST['datalancamento'];
        $dados['custototal'] = $_POST['custototal'];
        $dados['tempodeproducao'] = $_POST['tempodeproducao'];
        return $dados;
    }

?>


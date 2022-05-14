<?php


    $cep = isset($_POST["cep"])?htmlspecialchars($_POST["cep"]):"";
    $logradouro = isset($_POST["logradouro"])?htmlspecialchars($_POST["logradouro"]):"";
    $bairro = isset($_POST["bairro"])?htmlspecialchars($_POST["bairro"]):"";
    $cidade = isset($_POST["cidade"])?htmlspecialchars($_POST["cidade"]):"";
    $estado = isset($_POST["estado"])?htmlspecialchars($_POST["estado"]):"";


    require_once "../../db/conexao.php";
    $pdo = getConexao();
    
    $queryEndereco = <<<SQL

        INSERT INTO base_enderecos_ajax
        
        (cep, logradouro, bairro, cidade, estado)
        
        VALUES (?, ?, ?, ?, ?)
        
        SQL;



    try {
 
        //Preparação da query endereço
        
        $stmt = $pdo->prepare($queryEndereco);

        //Execução da query endereço

        $stmt->execute([
            $cep, $logradouro, $bairro, $cidade, $estado
        ]);
          
        header("location: ../cads/cad_endereco_auxiliar.php?status=1");
        exit();
    } 

    catch (Exception $e) {  
        
        if ($e->errorInfo[1] !== 1062){
            header("location: ../cads/cad_endereco_auxiliar.php?status=2");
            exit();
        }else{
            header("location: ../cads/cad_endereco_auxiliar.php?status=3");
            exit();
        }

    }
?>


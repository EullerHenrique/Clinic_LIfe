<?php

    /* Pessoa */
  
    $nome = isset($_POST["nome"])?htmlspecialchars($_POST["nome"]):"";
    $email = isset($_POST["email"])?htmlspecialchars($_POST["email"]):"";
    $telefone = isset($_POST["telefone"])?htmlspecialchars($_POST["telefone"]):"";
    $cep = isset($_POST["cep"])?htmlspecialchars($_POST["cep"]):"";
    $logradouro = isset($_POST["logradouro"])?htmlspecialchars($_POST["logradouro"]):"";
    $bairro = isset($_POST["bairro"])?htmlspecialchars($_POST["bairro"]):"";
    $cidade = isset($_POST["cidade"])?htmlspecialchars($_POST["cidade"]):"";
    $estado = isset($_POST["estado"])?htmlspecialchars($_POST["estado"]):"";

    /* Paciente */
   
    $altura =isset($_POST["altura"])?htmlspecialchars($_POST["altura"]):"";
    $peso = isset($_POST["peso"])?htmlspecialchars($_POST["peso"]):"";
    $tipo_sanguineo = isset($_POST["tipo_sanguineo"])?htmlspecialchars($_POST["tipo_sanguineo"]):"";
    

    require_once "../../db/conexao.php";
    $pdo = getConexao();
    
    $queryPessoa = <<<SQL
            
        
        INSERT INTO pessoa (nome, email, telefone, cep, logradouro, bairro, cidade, estado) values(?, ?, ?, ?, ?, ?, ?, ?);

        SQL;

    $queryPaciente = <<<SQL


        INSERT INTO paciente (peso, altura, tipo_sanguineo, codigo) values(?, ?, ?, ?);

        SQL;

 
    try{
   
        //Início da transação

        $pdo->beginTransaction();

        //Preparação da query Pessoa
             
        $stmt = $pdo->prepare($queryPessoa);

        //Execução da query
            
        if(!$stmt->execute([$nome, $email, $telefone, $cep, $logradouro, $bairro, $cidade, $estado])){

            throw new Exception("Falha na operação 1");
        
        }

        $codigo = $pdo->lastInsertId();


        //Preparação da query Paciente
             
         $stmt = $pdo->prepare($queryPaciente);

        //Execução da query
             
         if(!$stmt->execute([$peso, $altura, $tipo_sanguineo, $codigo])){
 
            throw new Exception("Falha na operação 2");
         
         }

        
        //Caso nenhuma execução gere algum erro, as execuções são finalizadas

        $pdo->commit();

        header("location: ../cads/cad_paciente.php?status=1");
        exist();

    }
 
    catch(Exception $e){

        //Caso as execuções gerem algum erro, as execuções são revertidas

        $pdo->rollBack();
       
        if ($e->errorInfo[1] !== 1062){
            header("location: ../cads/cad_paciente.php?status=2");
            exit();
        }else{
            header("location: ../cads/cad_paciente.php?status=3");
            exit();
        }

    }
      
?>
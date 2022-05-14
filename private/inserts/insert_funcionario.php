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

    /* Funcionário */

    $data_contrato =isset($_POST["data_contrato"])?htmlspecialchars($_POST["data_contrato"]):"";
    $salario =  isset($_POST["salario"])?htmlspecialchars($_POST["salario"]):"";
    $senha = isset($_POST["senha"])?htmlspecialchars($_POST["senha"]):"";
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
   
    /* Médico */
    
    $especialidade = isset($_POST["especialidade"])?htmlspecialchars($_POST["especialidade"]):"";
    $crm = isset($_POST["crm"])?htmlspecialchars($_POST["crm"]):"";

    
    require_once "../../db/conexao.php";
    $pdo = getConexao();

    $queryPessoa = <<<SQL
            
        
        INSERT INTO pessoa (nome, email, telefone, cep, logradouro, bairro, cidade, estado) 
        VALUES(?, ?, ?, ?, ?, ?, ?, ?);

        SQL;

    $queryFuncionario = <<<SQL


        INSERT INTO funcionario (codigo, data_contrato, salario, senha_hash)
        VALUES(?, ?, ?, ?);

        SQL;

    $queryMedico = <<<SQL

    
        INSERT INTO medico (codigo, especialidade, crm) 
        VALUES(?, ?, ?);

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


        //Preparação da query Funcionário
             
         $stmt = $pdo->prepare($queryFuncionario);

        //Execução da query
             
         if(!$stmt->execute([$codigo, $data_contrato, $salario, $senha_hash])){
 
            throw new Exception("Falha na operação 2");
         
         }

         
        if($crm != "" && $especialidade != ""){ 

            //Preparação da query Médico
             
            $stmt = $pdo->prepare($queryMedico);

            //Execução da query
            
            if(!$stmt->execute([$codigo, $especialidade, $crm])){

                throw new Exception("Falha na operação 3");
        
            }
        }

        //Caso nenhuma execução gere algum erro, as execuções são finalizadas

        $pdo->commit();

        header("location: ../cads/cad_funcionario.php?status=1");
        exit();

    }
 
    catch(Exception $e){

        //Caso as execuções gerem algum erro, as execuções são revertidas

        $pdo->rollBack();

        if ($e->errorInfo[1] !== 1062){
            header("location: ../cads/cad_funcionario.php?status=2");
            exit();
        }else{
            header("location: ../cads/cad_funcionario.php?status=3");
            exit();
        }
    }
      
    

?>
<?php


    $nome = isset($_POST["nome"])?htmlspecialchars($_POST["nome"]):"";
    $email = isset($_POST["email"])?htmlspecialchars($_POST["email"]):"";
    $telefone = isset($_POST["telefone"])?htmlspecialchars($_POST["telefone"]):"";
    $data_agendamento = isset($_POST["data_agendamento"])?htmlspecialchars($_POST["data_agendamento"]):"";
    $horario = isset($_POST["horario"])?htmlspecialchars($_POST["horario"]):""; 

    require_once "../../db/conexao.php";
    $pdo = getConexao();
    
    $queryAgenda = <<<SQL

        INSERT INTO agenda
        
        (nome, email , telefone, data_agendamento, horario)
        
        VALUES (?, ?, ?, ?, ?)
        
        SQL;

    try {
 
        // Preparação da query Agenda
        
        $stmt = $pdo->prepare($queryAgenda);

        //Execução da query agenda

        $stmt->execute([
            $nome, $email, $telefone, $data_agendamento, $horario
        ]);
          
        header("location: ../cads/cad_agendamento.php?status=1");
        exit();
    } 

    catch (Exception $e) {  
        
        header("location: ../cads/cad_agendamento.php?status=2");
        exit();
        
    }
?>


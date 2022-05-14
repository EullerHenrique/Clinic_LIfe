<?php
    function validaLogin($pdo, $email, $senha){

        $query = <<<SQL
            
            SELECT senha_hash
            FROM pessoa INNER JOIN funcionario ON pessoa.codigo = funcionario.codigo
            WHERE email = :email
            SQL;
      
        try{

           
            //Preparação da query
             
            $stmt = $pdo->prepare($query);

            //Execução da query
            
            $stmt ->execute([$email]);

            //  Fetch = Busca o primeiro registro no PDO STATEMENT (query associada aos resultados da consulta)
            //  Ou seja, o fetch obtém o primeiro resultado da consulta e armazena esse resultado em um array.
            //          Retorna o primeiro registro obtido na consulta com o filtro do fetch aplicado
            //  Filtros:
            //          PDO:FETCH_ASSOC = indices associativos
            //          PDO:FETCH_NUM = indices numericos
            //          PDO:FETCH_BOTH = ambos os indices (Padrão)
            //          PDO:FETCH_OBJ = array de objetos

            $usuario = $stmt->fetch();
            
            if(!$usuario){
                return false;
            }else{
                return password_verify($senha, $usuario['senha_hash']);
            }

        }
        catch(Exception $e){

            exit('Falha inesperada: '.$e->getMessage());
        }
    }
        
    require_once "../../db/conexao.php";
    $pdo = getConexao();

    $usuario = isset($_POST["usuario"])?htmlspecialchars($_POST["usuario"]):"";
    $email = isset($_POST["email"])?htmlspecialchars($_POST["email"]):"";
    $senha = isset($_POST["senha"])?htmlspecialchars($_POST["senha"]):"";
        
    if(validaLogin($pdo, $email, $senha)){
        header("location: ../../private/cads/cad_funcionario.php");
        exit();
    }else{
        header("location: login.php?error=1");
        exit();
    }
?>
<?php

    $cep = isset($_GET["cep"])?$_GET["cep"]:"";

    class Endereco{

        public $logradouro;
        public $bairro;
        public $cidade;
        public $estado;

        function __construct($logradouro, $bairro, $cidade, $estado){
        
            $this->logradouro = $logradouro;
            $this->bairro = $bairro; 
            $this->cidade = $cidade;
            $this->estado = $estado;
        
        }

    }

    require "../../db/conexao.php";
    $pdo = getConexao();

    try {
           
        $queryEnderecoAuxiliar = <<<SQL
        
        SELECT *
        FROM base_enderecos_ajax
        WHERE cep = $cep
        
        SQL;

        //Execução da query endereço auxiliar
        //Obs = a função query é utilizada somente para consultas
        
        $stmt = $pdo->query($queryEnderecoAuxiliar);
         
        
        //O fetch retorna o primeiro registro obtido na consulta

        $end = $stmt->fetch();

        $endereco = new Endereco($end['logradouro'], $end['bairro'], $end['cidade'], $end['estado']);

        echo json_encode($endereco);
        
    } 

    catch (Exception $e) {

        exit('Ocorreu uma falha: '.$e->getMessage());
      
    }

?>




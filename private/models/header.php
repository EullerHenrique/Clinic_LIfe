 <?php

        require "../../db/conexao.php";
        $pdo = getConexao();

        try {

            $queryMedico = <<<SQL

            SELECT *
            FROM pessoa 
            INNER JOIN funcionario ON pessoa.codigo = funcionario.codigo
            INNER JOIN medico ON funcionario.codigo = medico.codigo
            SQL;

            $stmt2 = $pdo->query($queryMedico);

        } 
        catch (Exception $e) {

            exit('Ocorreu uma falha: '.$e->getMessage());

        }
    ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">
    <style>
     
        nav, footer, .btn{
            background-color: #6495ED;
        }
        
        p{
            text-align: justify;
        }

        h1, h2, footer p{
            text-align: center;
        }
        
        footer p{
            padding: 10px 0;
            margin: 0;
        }  
        
        .footer{
            width: 100%;
            position: fixed;
            bottom: 0px;
        }

    
        #especialidade, #crm{
            display: none;
        }

     
    </style>

</head>
<body>

<header>

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">

            <a class="navbar-brand" href="../cads/cad_funcionario.php">
                <img src="../../images/foto_logo.png" alt="Clinica life" width="60" height="45" class="d-inline-block align-top">
            </a>


            <button class="navbar-toggler shadow-none" type="button" data-toggle="collapse" data-target="#navbar">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbar">

                <div class="navbar-nav w-100">
                <a href="../cads/cad_funcionario.php"

                    <?php if($page == "Novo Funcionário"){ ?> 
                        class="nav-link active"
                    <?php }else{ ?> 
                        class="nav-link"
                    <?php }?>

                    >Novo Funcionário
                    </a>
                    <a href="../cads/cad_paciente.php"

                    <?php if($page == "Novo Paciente"){ ?> 
                        class="nav-link active"
                    <?php }else{ ?> 
                        class="nav-link"
                    <?php }?>

                    >Novo Paciente
                    </a>
                    <a href="../lists/list_funcionarios.php"

                    <?php if($page == "Funcionários"){ ?> 
                        class="nav-link active"
                    <?php }else{ ?> 
                        class="nav-link"
                    <?php }?>

                    >Funcionários
                    </a>

                        
                    <a href="../lists/list_enderecos_auxiliares.php"

                    <?php if($page == "Endereços Auxiliares"){ ?> 
                        class="nav-link active"
                    <?php }else{ ?> 
                        class="nav-link"
                    <?php }?>

                    >Endereços Auxiliares
                    </a>

                    
                    <a href="../lists/list_pacientes.php"

                    <?php if($page == "Pacientes Cadastrados"){ ?> 
                        class="nav-link active"
                    <?php }else{ ?> 
                        class="nav-link"
                    <?php }?>

                    >Pacientes
                    </a>

                    <a href="../lists/list_agendamentos.php"

                    <?php if($page == "Agendamentos"){ ?> 
                        class="nav-link active"
                    <?php }else{ ?> 
                        class="nav-link"
                    <?php }?>

                    >Agendamentos
                    </a>

                    
                    <!-- Médico -->


                    <a href="../lists/list_meus_agendamentos.php"

                    <?php if($page == "Meus Agendamentos"){ ?> 
                        class="nav-link active"
                    <?php }else{ ?> 
                        class="nav-link"
                    <?php }?>

                    >Meus Agendamentos
                    </a>

                    <!--- -->

                </div>

                <div class="navbar-nav">
                    <a href="../../public/pages/home.php" class="nav-link">Sair</a>
                </div>

            </div>

        </div>

    </nav>

</header>
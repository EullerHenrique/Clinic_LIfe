<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page ?> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">
    <style>
     
        nav, footer, .btn{
            background-color: lime;
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

     


        /* Galeria e Login */    
        
        nav{
            z-index: 2;
        }


        .galeria{

            position: absolute;
            left: 50%;
            top: 60%;
            transform: translate(-50%, -60%);
            z-index: 1;

        }

        div > img{
            height: 500px;
        }

        .login{

            position: absolute;
            left: 50%;
            top: 55%;
            transform: translate(-50%, -55%);
            z-index: 1;

            width: 350px;

        }

    
    </style>

</head>
<body>

    <header>
            
            <!-- navbar = Criação da estrutura de uma navbar-->
            <!-- navbar-expand-sm = A barra de nabegação se expande a partir do tamanho sm-->
            <!-- navbar-light = A navbar possui um background claro, portanto, a cor dos textos é escura-->

            <nav class="navbar navbar-expand-sm navbar-light">
            
                <!-- container-fluid = width: 100% -->

                <div class="container-fluid">


                    <!-- navbar-brand = Espaço reservado para o nome ou o logo da empresa--> 

                    <a class="navbar-brand" href="../pages/home.html">
                        <img src="../../images/foto_logo.png" alt="Clinica life" width="60" height="45" class="d-inline-block align-top">
                    </a>
                
                    <!-- navbar-toogler = Botão de recolhimento que aparece em resoluções abaixo do tamanho sm -->

                    <button class="navbar-toggler shadow-none" type="button" data-toggle="collapse" data-target="#navbar">
                       
                        <!-- navbar-toogler-icon = Ícone do plugin -->
                        <!-- data-toogle = Indica o efeito da ação => collapse (desabar)--> 
                        <!-- data-target = Alvo da ação-->
                        
                        <span class="navbar-toggler-icon"></span>
                    </button>
                
                    
                    <!-- collapse navbar-collapse = Agrupa e oculta o conteúdo da barra de navegação de acordo com o ponto de interrupção-->

                    <div class="collapse navbar-collapse" id="navbar">

                        <!-- navbar-nav = Criação da estrutura de uma navbar-nav-->

                        <div class="navbar-nav w-100">
                        

                            <!-- nav-link = Criação da estrutura de um link de uma navbar-nav --> 
                            
                            <a href="../pages/home.php"

                                <?php if($page == "Home"){ ?> 
                                    class="nav-link active"
                                <?php }else{ ?> 
                                    class="nav-link"
                                <?php }?>
                                
                            >Home
                            </a>
                            <a href="../pages/galeria.php"

                                <?php if($page == "Galeria"){ ?> 
                                    class="nav-link active"
                                <?php }else{ ?> 
                                    class="nav-link"
                                <?php }?>
                                
                            >Galeria
                            </a>
                            <a href="../cads/cad_endereco_auxiliar.php"

                                <?php if($page == "Novo Endereço Auxiliar"){ ?> 
                                    class="nav-link active"
                                <?php }else{ ?> 
                                    class="nav-link"
                                <?php }?>
                                
                            >Novo Endereço Auxiliar
                            </a>
                            <a href="../cads/cad_agendamento.php"

                                <?php if($page == "Agendamento"){ ?> 
                                    class="nav-link active"
                                <?php }else{ ?> 
                                    class="nav-link"
                                <?php }?>
                                
                            >Agendamento
                            </a>
                        </div>

                        <div class="navbar-nav">
                            <a  href="../login/login.php"

                                <?php if($page == "Login"){ ?> 
                                    class="nav-link active"
                                <?php }else{ ?> 
                                    class="nav-link"
                                <?php }?>
                            >Login
                            </a>
                        </div>

                    </div>
                
                </div>
                
            </nav>

    </header>
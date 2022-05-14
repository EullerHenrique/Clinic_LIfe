        <?php

            $page = "Login"; 
            require "../models/header.php"

        ?>
            

        <main>

            <div class="container login">
                                      
                        <!-- card = Criação da estrutura de um card -->
                        
                        <div class="card ml-2 mr-2">
                            
                            <!-- card-header = Criação da estrutura do cabeçãlho do card-->

                            <div class="card-header text-center">
                                Login
                            </div>
                            
                            <!-- card-body = Criação da estrutura do corpo do card-->

                            <div class="card-body">
                                
                                <form action="valida_login.php" method="post">
                                    
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="E-mail">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
                                    </div>
                                   

                                    <?php 

                                    $error= isset($_GET["error"])?$_GET["error"]:"";
                                    
                                    if($error == 1){?>
                                    
                                        <p class="text-center text-danger">Dados incorretos</p>

                                    <?php } ?>
                                   
                                    <div class="text-center">
                                        <button type="submit" class="btn text-white">Enviar</button>
                                    </div>

                            
                                </form>
                        
                    
                            </div>
                    
                        </div>
                    
                    </div>  
        </main>

        <?php 
            
            require "../models/footer.php";

        ?>
        
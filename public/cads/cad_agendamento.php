
        <?php
            $page = "Agendamento"; 
            require "../models/header.php";

            require_once "../../db/conexao.php";
            $pdo = getConexao();

            try {

                $queryMedico = <<<SQL

                    SELECT *
                    FROM medico
                    
                    SQL;

                //Execução da query médico
                //Obs = a função query é utilizada somente para consultas
                $stmt = $pdo->query($queryMedico);

            } 
            catch (Exception $e) {

                exit('Ocorreu uma falha: '.$e->getMessage());

            }
        ?>


        <main>

            <div class="container">

                    <article class="mt-2 mb-5"> 

                        <h1>Agendar consulta</h1>
                        
                        <form action="../inserts/insert_agendamento.php" method="post" class="mt-2">

                            <div class="row">

                                <div class="mb-3 form-floating">
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>
                                    <label for="nome" class="form-label">Nome</label>
                                </div>
                                
                                <div class="mb-3 form-floating">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required>
                                    <label for="email" class="form-label">E-mail</label>
                                </div>

                                <div class="mb-3 form-floating">
                                    <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="telefone" required>
                                    <label for="telefone" class="form-label">Telefone </label>
                                </div>

                                <div class="mb-3 col-md-6 form-floating">
                                    <select id="especialidade_medica" class="form-select" name="especialidade_medica" >
                                        <option value="">&nbsp;</option>
                                        
                                        <?php while ($medico = $stmt->fetch()) { ?>
                                        
                                            <option><?php echo $medico["especialidade"] ?></option>

                                        <?php } ?>
                                   
                                    </select>
                                    <label for="especialidade_medica" class="form-label">Especialidade Médica</label>
                                </div>

                                <div class="mb-3 col-md-6 form-floating">
                                    <select id="nome_do_medico" class="form-select" name="nome_do_medico" >
                                        <option value="">&nbsp;</option>
                                        
                                      

                                    </select>
                                    <label for="nome_do_medico" class="form-label">Nome do médico</label>
                                </div>

                                <div class="mb-3 col-md-6 form-floating">
                                    <input type="date" class="form-control" id="data_agendamento" name="data_agendamento" required>
                                    <label for="data_agendamento" class="form-label">Data da consulta</label>
                                </div>

                                <div class="mb-3 col-md-6 form-floating">
                                    <select id="horario" class="form-select" name="horario" required>
                                        <option value="">&nbsp;</option>
                                        <option value="8:00:00">8:00:00</option>
                                        <option value="9:00:00">9:00:00</option>
                                        <option value="10:00:00">10:00:00</option>
                                        <option value="11:00:00">11:00:00</option>
                                        <option value="12:00:00">12:00:00</option>
                                        <option value="13:00:00">13:00:00</option>
                                        <option value="14:00:00">14:00:00</option>
                                        <option value="15:00:00">15:00:00</option>
                                        <option value="16:00:00">16:00:00</option>
                                        <option value="17:00:00">17:00:00</option>
                                    </select>
                                    <label for="horario" class="form-label">Horário Disponível</label>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn text-white">Cadastrar</button>
                                </div>

                                    <?php 

                                    $status= isset($_GET["status"])?$_GET["status"]:"";
                                    
                                    ?>
                                    
                                    <div class="mt-3 mb-2">
                                        
                                        <?php if($status == 1){ ?>

                                            <p class="text-center text-success">Consulta agendada com sucesso</p>
                                    
                                        <?php } else if($status == 2){?>
                                        
                                            <p class="text-center text-danger">Falha no cadastro, tente novamente</p>

                                        <?php }else if($status == 3){ ?>
                                    
                                            <p class="text-center text-warning">Falha no cadastro: E-mail duplicado</p>

                                        <?php }?>

                                    </div>

                            </div>
                            
                        </form>
                    
                    </article>
    
            </div>
            
        </main>
        
        <?php 
            
            require "../models/footer.php";

        ?>
        
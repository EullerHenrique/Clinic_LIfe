
        <?php

            $page = "Agendamentos"; 
            require "../models/header.php"

        ?>


    <?php

   
        try {

            $queryAgendamento = <<<SQL

            SELECT *
            FROM agenda
            
            SQL;


            $stmt = $pdo->query($queryAgendamento);


        } 
        catch (Exception $e) {

            exit('Ocorreu uma falha: '.$e->getMessage());
        
        }
    ?>

    <main>

            <article class="mt-5 mb-5">

                <h1 class="text-center">Consultas Agendadas</h1>

                <!-- -table responsive = Torna a tabela responsiva, ou seja, adiciona uma barra de rolagem horizontal em resoluções menores-->

                <div class="table-responsive mt-5">
                    
                    <!-- table = Criação da estrutura de uma tabela-->
                    <!-- table-primary = A cor da tabela é azul-->
                    <!-- table-striped = A intensidade da cor da tabela varia a cada linha -->
                    <!-- table-hover = Adiciona um efeito visual ao passar o mouse em cima de uma linha --> 

                    <table class="table table-primary table-striped table-hover text-center">
                                        
                        <thead>

                            <tr>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>E-mail</th>
                                <th>Data Do Agendamento</th>
                                <th>Horário</th>
                                <th>Nome Do Médico</th>
                            </tr>

                        </thead>

                        <tbody>

                        <?php while ($agendamento = $stmt->fetch()) { ?>

                                <tr>
                                    <td><?php echo $agendamento["nome"] ?></td> 
                                    <td><?php echo $agendamento["telefone"] ?></td>
                                    <td><?php echo $agendamento["email"] ?></td>
                                    <td><?php 
                                        
                                        $data = new DateTime($agendamento['data_agendamento']);
                                        $data = $data->format('d/m/Y');
                                        echo $data;
                                    ?></td>
                                    <td><?php echo $agendamento["horario"]; ?></td>
                                    <td><?php ?> </td>

                                </tr>  

                        <?php } ?>

                        </tbody>

                    </table> 
            
                </div>

        </article>
    </main>

    <?php 
            
        require "../models/footer.php";

    ?>
        
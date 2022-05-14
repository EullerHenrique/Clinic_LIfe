    <?php

        $page = "Meus Agendamentos"; 
        require "../models/header.php"

    ?>


    <?php

        require_once "../../db/conexao.php";
        $pdo = getConexao();

        try {

            $queryMeuAgendamento = <<<SQL

                SELECT data_agendamento, horario, agenda.nome, agenda.email, agenda.telefone, pessoa.nome as nome_medico
                FROM agenda INNER JOIN pessoa ON agenda.codigo_medico = pessoa.codigo
            
                SQL;


            $stmt = $pdo->query($queryMeuAgendamento);


        } 
        catch (Exception $e) {

            exit('Ocorreu uma falha: '.$e->getMessage());

        }
    ?>
 


    <main>

            <article class="mt-5 mb-5">

                <h1 class="text-center">Consultas Agendadas Para Mim</h1>

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
                                <th>Data Da Consulta</th>
                                <th>Horário Disponível</th>
                                <th>Nome Do Médico</th>
                            </tr>

                        </thead>

                        <tbody>

                        <?php while ($agendamento = $stmt->fetch()) { ?>

                                <tr>
                                    <td><?php echo $agendamento["nome"] ?></td> 
                                    <td><?php echo $agendamento["telefone"] ?></td>
                                    <td><?php echo $agendamento["email"] ?></td>
                                    <td><?php echo $agendamento["data_agendamento"] ?></td>
                                    <td><?php echo $agendamento["horario"] ?></td>
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
        
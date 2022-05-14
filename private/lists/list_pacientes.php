    <?php

        $page = "Pacientes Cadastrados"; 
        require "../models/header.php"
     
    ?>

    <?php

        require_once "../../db/conexao.php";
        $pdo = getConexao();

        try {

            $queryPacientes = <<<SQL

            SELECT *
            FROM pessoa INNER JOIN paciente ON pessoa.codigo = paciente.codigo
            
            SQL;


            $stmt = $pdo->query($queryPacientes);

        } 
        catch (Exception $e) {

            exit('Ocorreu uma falha: '.$e->getMessage());
        
        }
    ?>

    <main>

            <article class="mt-5 mb-5">

                <h1 class="text-center">Pacientes Cadastrados</h1>

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
                                <th>CEP</th>
                                <th>Logradouro</th>
                                <th>Bairro</th>
                                <th>Cidade</th>
                                <th>Estado</th>
                                <th>Peso(kg) </th>
                                <th>Altura(cm) </th>
                                <th>Tipo Sanguíneo</th>

                            </tr>

                        </thead>

                        <tbody>

                        <?php while ($paciente = $stmt->fetch()) { ?>

                            <tr>
                                <th><?php echo $paciente["nome"] ?></th> 
                                <th><?php echo $paciente["telefone"] ?></th> 
                                <td><?php echo $paciente["email"] ?></td>
                                <td><?php echo $paciente["cep"] ?></td>
                                <td><?php echo $paciente["logradouro"] ?></td>
                                <td><?php echo $paciente["bairro"] ?></td>
                                <th><?php echo $paciente["cidade"] ?></th> 
                                <th><?php echo $paciente["estado"] ?></th> 
                                <td><?php echo $paciente["peso"] ?></td>
                                <td><?php echo $paciente["altura"] ?></td>
                                <td><?php echo $paciente["tipo_sanguineo"] ?></td>
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
        
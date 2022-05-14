    <?php

        $page = "Funcionários"; 
        require "../models/header.php"

    ?>

    <?php

        require_once "../../db/conexao.php";
        $pdo = getConexao();

        try {

            $queryFuncionario = <<<SQL

            SELECT *
            FROM pessoa INNER JOIN funcionario ON pessoa.codigo = funcionario.codigo
            SQL;

            $stmt = $pdo->query($queryFuncionario);

            $queryMedico = <<<SQL

            SELECT *
            FROM pessoa INNER JOIN funcionario ON pessoa.codigo = funcionario.codigo
            INNER JOIN medico ON funcionario.codigo = medico.codigo
            SQL;

            $stmt2 = $pdo->query($queryMedico);

        } 
        catch (Exception $e) {

            exit('Ocorreu uma falha: '.$e->getMessage());

        }
    ?>
 


    <main>

            <article class="mt-5 mb-5">

                <h1 class="text-center">Funcionários Cadastrados</h1>

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
                                <th>Contratado no dia</th>
                                <th>Salário(R$)</th>
                            
                            </tr>

                        </thead>

                        <tbody>

                        <?php while ($funcionario = $stmt->fetch()) { ?>

                            <tr>
                                <td><?php echo $funcionario["nome"] ?></td> 
                                <td><?php echo $funcionario["telefone"] ?></td>
                                <td><?php echo $funcionario["email"] ?></td>
                                <td><?php echo $funcionario["cep"] ?></td> 
                                <td><?php echo $funcionario["logradouro"] ?></td>
                                <td><?php echo $funcionario["bairro"] ?></td>
                                <td><?php echo $funcionario["cidade"] ?></td>
                                <td><?php echo $funcionario["estado"] ?></td>
                                <td><?php 
                                        
                                        $data = new DateTime($funcionario['data_contrato']);
                                        $data = $data->format('d/m/Y');
                                        echo $data;
                                ?></td>
                                <td><?php echo $funcionario["salario"]?> </td>

                          </tr>

                        <?php } ?>

                        </tbody>

                    </table> 
            
                </div>

        </article>

        <article class="mt-5 mb-5">

            <h2 class="text-center">Médicos Cadastrados</h2>

            <div class="table-responsive mt-5">
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
                            <th>Contratado no dia</th>
                            <th>Salário(R$)</th>
                            <th>Especialidade</th>
                            <th>CRM</th>
                        
                        </tr>

                    </thead>

                    <tbody>

                        <?php while ($medico = $stmt2->fetch()) { ?>

                            <tr>
                                <td><?php echo $medico["nome"] ?></td> 
                                <td><?php echo $medico["telefone"] ?></td>
                                <td><?php echo $medico["email"] ?></td>
                                <td><?php echo $medico["cep"] ?></td> 
                                <td><?php echo $medico["logradouro"] ?></td>
                                <td><?php echo $medico["bairro"] ?></td>
                                <td><?php echo $medico["cidade"] ?></td>
                                <td><?php echo $medico["estado"] ?></td>
                                <td><?php 
                                        
                                        $data = new DateTime($medico['data_contrato']);
                                        $data = $data->format('d/m/Y');
                                        echo $data;
                                ?></td>
                                <td><?php echo $medico["salario"]?> </td>
                                <td><?php echo $medico["especialidade"]?></td>
                                <td><?php echo $medico["crm"]?></td>
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
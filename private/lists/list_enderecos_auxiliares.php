    <?php

        $page = "Endereços Auxiliares"; 
        require "../models/header.php"

    ?>

    <?php

        require_once "../../db/conexao.php";
        $pdo = getConexao();

        try {

            $queryEndereco = <<<SQL

            SELECT *
            FROM base_enderecos_ajax
            
            SQL;


            $stmt = $pdo->query($queryEndereco);


        } 
        catch (Exception $e) {
            exit('Ocorreu uma falha: '.$e->getMessage());
        }
    ?>

    <main>

            <article class="mt-5 mb-5">

            <h1 class="text-center">Endereços Auxiliares Cadastrados</h1>

              <!-- -table responsive = Torna a tabela responsiva, ou seja, adiciona uma barra de rolagem horizontal em resoluções menores-->

              <div class="table-responsive mt-5">
                    
                    <!-- table = Criação da estrutura de uma tabela-->
                    <!-- table-primary = A cor da tabela é azul-->
                    <!-- table-striped = A intensidade da cor da tabela varia a cada linha -->
                    <!-- table-hover = Adiciona um efeito visual ao passar o mouse em cima de uma linha --> 
       
                    <table class="table table-primary table-striped table-hover text-center">

                        <thead>

                            <tr>
                                <th>CEP</th>
                                <th>Logradouro</th>
                                <th>Bairro</th>
                                <th>Cidade</th>
                                <th>Estado</th>
                            </tr>

                        </thead>

                        <tbody>

                        <?php while ($endereco = $stmt->fetch()) { ?>

                            <tr>
                                <td><?php echo $endereco["cep"] ?></td> 
                                <td><?php echo $endereco["logradouro"] ?></td>
                                <td><?php echo $endereco["bairro"] ?></td>
                                <td><?php echo $endereco["cidade"] ?></td>
                                <td><?php echo $endereco["estado"] ?></td>
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
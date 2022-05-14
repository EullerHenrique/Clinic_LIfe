
        <?php

            $page = "Novo Endereço Auxiliar"; 
            require "../models/header.php"

        ?>


        <main>

            <div class="container">

                <article class="mt-2 mb-5"> 

                    <h1>Cadastrar Endereço Auxiliar </h1>
                        
                    <form action="../inserts/insert_endereco_auxiliar.php" method="post" class="mt-2">

                        <div class="row">
                        
                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP" required>
                                <label for="cep" class="form-label">CEP</label>
                            </div>
                                
                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Logradouro" required>                                   
                                <label for="logradouro" class="form-label">Logradouro</label>
                             </div>

                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" required>
                                <label for="bairro" class="form-label">Bairro</label>
                            </div>

                            <div class="mb-3 col-md-6 form-floating">
                                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" required>
                                <label for="cidade" class="form-label">Cidade</label>
                            </div>
                                
                            <div class="mb-3 col-md-6 form-floating">
                                <select id="estado" class="form-select" name="estado" required>
                                    <option value="">&nbsp;</option>
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espírito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
                                </select>
                                <label for="estado" class="form-label">Estado</label>
                            </div>
                                                                
                            <div class="text-center">
                                <button type="submit" class="btn text-white">Cadastrar</button>
                            </div>


                            <?php 

                                $status= isset($_GET["status"])?$_GET["status"]:"";
                            ?>
                                    
                            <div class="mt-3 mb-2">
                                        
                                <?php if($status == 1){ ?>

                                    <p class="text-center text-success">Endereço auxiliar cadastrado com sucesso</p>
                                    
                                <?php } else if($status == 2){?>
                                        
                                    <p class="text-center text-danger">Falha no cadastro, tente novamente</p>

                                <?php }else if($status == 3){ ?>
                                    
                                    <p class="text-center text-warning">Falha no cadastro: CEP Duplicado</p>

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
        
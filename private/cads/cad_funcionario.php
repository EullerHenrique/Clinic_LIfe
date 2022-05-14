
    <?php

        $page = "Novo Funcionário"; 
        require "../models/header.php"

    ?>

    <main>

        <div class="container d-flex align-items-center">

            <article class="mt-5 mb-5">

                <h1>Cadastrar Funcionário</h1>

                <form action="../inserts/insert_funcionario.php" method="post" class="mt-4">

                    <div class="row">

                        <div class="mb-3 form-floating col-md-6">
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>
                            <label for="nome" class="form-label">Nome</label>
                        </div>

                        <div class="mb-3 form-floating col-md-6">
                            <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="telefone" required>
                            <label for="telefone" class="form-label">Telefone </label>
                        </div>

                        <div class="mb-3 form-floating col-md-6">
                            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required>
                            <label for="email" class="form-label">E-mail</label>
                        </div>

                        <div class="mb-3 form-floating col-md-6">
                            <input type="text" class="form-control" id="senha" name="senha" placeholder="Senha" required>
                            <label for="senha" class="form-label">Senha</label>
                        </div>

                
                        <div class="mb-3 form-floating col-md-2">
                            <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP" required>
                            <label for="cep" class="form-label">CEP</label>
                        </div>

                        <div class="mb-3 form-floating col-md-4">
                            <input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Logradouro" required>
                            <label for="logradouro" class="form-label">Logradouro</label>
                        </div>

                        <div class="mb-3 form-floating col-md-2">
                            <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" required>
                            <label for="bairro" class="form-label">Bairro</label>
                        </div>

                        <div class="mb-3 col-md-2 form-floating">
                            <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" required>
                            <label for="cidade" class="form-label">Cidade</label>
                        </div>

                        <div class="mb-3 col-md-2 form-floating">
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

                        <div class="mb-3 col-md mt-3 text-center">
                            <input type="checkbox" class="form-check-input" id="profissao" name="profissao">
                            <label for="profissao" class="form-label"> Sou médico</label>
                        </div>

                        <!-- Médico -->

                        <div class="mb-3 col-md-2 form-floating" id="especialidade">
                            <input type="text" class="form-control" id="input_especialidade" name="especialidade" placeholder="Especialidade">
                            <label for="input_especialidade" class="form-label">Especialidade</label>
                        </div>
        
                        <div class="mb-3 col-md-2 form-floating" id="crm">
                            <input type="text" class="form-control" id="input_crm" name="crm" placeholder="CRM">
                            <label for="input_crm" class="form-label">CRM</label>
                        </div>

                        <!-- -->
        

                        <div class="mb-3 col-md-4 form-floating">
                            <input type="date" class="form-control" id="data_contrato" name="data_contrato" required>
                            <label for="data_contrato" class="form-label">Contratado no dia</label>
                        </div>

                        <div class="mb-3 col-md-2 form-floating">
                            <input type="number" class="form-control" id="salario" name="salario" placeholder="Salário" required>
                            <label for="salario" class="form-label">Salário (R$) </label>
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn text-white">Cadastrar</button>
                        </div>


                        <?php 

                            $status= isset($_GET["status"])?$_GET["status"]:"";
                        ?>
                                    
                        <div class="mt-3 mb-2">
                                        
                            <?php if($status == 1){ ?>

                                <p class="text-center text-success">Funcionário cadastrado com sucesso</p>
                                    
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


    <script>

            let profissao = document.getElementById("profissao");
            let esp = document.getElementById("especialidade");
            let crm = document.getElementById("crm");

            let input_esp = document.getElementById("input_especialidade");
            let input_crm = document.getElementById("input_crm");

            profissao.addEventListener("change", function(){
                
                if(profissao.checked){
            
                    esp.style.display = 'block';
                    input_esp.required = true; // Exige o prenchimento do input para o form ser enviado

                    crm.style.display = 'block'
                    input_crm.required = true;

            
                }else{

                    esp.style.display = 'none';
                    input_esp.required = false; // Não exige o preenchimento do input para o form ser enviado

                    crm.style.display = 'none'
                    input_crm.required = false;
                
                }
            });

        </script>

        <script>

            
                const inputCep = document.querySelector("#cep");
                inputCep.onkeyup = (e) => buscaEndereco(inputCep.value);
            
                function buscaEndereco(cep) {

               
                    let form = document.forms[0];                    
                    let url = 'busca_endereco.php?cep='+cep;
                    
                    //A api fetch busca uma resposta na url

                    fetch(url)

                        .then(response => {
                
                            // A requisição finalizou com sucesso.

                            
                            if (response.ok) {
                            
                                // Converte a string JSON para um objeto JS 
                                // A execução prosseguirá para o próximo .then

                                return response.json();
                            } 
                            else {
                            
                                // A execução será deslocada para o bloco 'catch'
                           
                                return Promise.reject(response);
                            }
                
                        })

                        .then(endereco => {

                            form.logradouro.value = endereco.logradouro;
                            form.bairro.value = endereco.bairro;
                            form.cidade.value = endereco.cidade;
                            form.estado.value = endereco.estado;
                    
                        })

                        .catch(error => {
                    
                            // Ocorreu um erro na comunicação com o servidor ou
                            // no processamento da requisição no PHP, que pode não
                            // ter retornado uma string JSON válida
                            
                            //Redefine os valores do formulário
                            form.reset();
                            
                            console.warn('Falha inesperada: ', error);
                    
                        });
                    }
        </script>

        <?php 
            
            require "../models/footer.php";

        ?>
        
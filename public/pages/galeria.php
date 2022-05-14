
        
        <?php

            $page = "Galeria"; 
            require "../models/header.php"
        
        ?>

        <main>

            <div class="container galeria">

                    <!-- data-ride = inicia a animação ao carregar a página -->

                    <!-- carousel = Criação da estrutura de um carousel-->
                    <!-- carrousel-dark = Os indicadores e as setas ficam escuras-->
                    <!-- slide = Efeito de deslizar-->

                    <div id="carousel" class="carousel carousel-dark slide" data-ride="carousel">
                    
    
                        <!-- carousel-indicators = Aŕea resevada a inserção de indicadores-->

                        <ol class="carousel-indicators">
                            
                            <!-- data-target (alvo) = indica o alvo da ação -->
                            <!-- data-slide-to(deslizar para) = indica para qual foto deve-se deslizar -->

                            <li data-target="#carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel" data-slide-to="1"></li>
                            <li data-target="#carousel" data-slide-to="2"></li>
                            <li data-target="#carousel" data-slide-to="3"></li>
                            <li data-target="#carousel" data-slide-to="4"></li>
                            <li data-target="#carousel" data-slide-to="5"></li>
                            <li data-target="#carousel" data-slide-to="6"></li>
                            <li data-target="#carousel" data-slide-to="7"></li>
                        </ol>

                        <!-- caroulsel-inner = Área reservada a inserção de slides -->

                        <div class="carousel-inner">

                            <!-- carousel-item = -->

                            <div class="carousel-item active">
                                <img src="../../images/foto_galeria_01.jpg" class="w-100" alt="foto_01">
                            </div>
                            <div class="carousel-item">
                                <img src="../../images/foto_galeria_02.jpg" class="w-100" alt="foto_02">
                            </div>
                            <div class="carousel-item">
                                <img src="../../images/foto_galeria_03.png" class="w-100" alt="foto_03">
                            </div>
                            <div class="carousel-item">
                                <img src="../../images/foto_galeria_04.jpg" class="w-100" alt="foto_4">
                            </div>
                            <div class="carousel-item">
                                <img src="../../images/foto_galeria_05.jpg" class="w-100" alt="foto_05">
                            </div>
                            <div class="carousel-item">
                                <img src="../../images/foto_galeria_06.jpg" class="w-100" alt="foto_06">
                            </div>
                            <div class="carousel-item">
                                <img src="../../images/foto_galeria_07.jpg" class="w-100" alt="foto_07">
                            </div>
                            <div class="carousel-item">
                                <img src="../../images/foto_galeria_08.jpg" class="w-100" alt="foto_08">
                        </div>

                    </div>
                        
                        <!-- data-slide = indica se deve-se deslizar para esquerda ou para a direita -->

                        
                        <!-- carousel-control-next = Link responsável pelo deslizamento para a esquerda -->

                        <a class="carousel-control-prev" href="#carousel" data-slide="prev">

                            <!-- carousel-control-prev-icon = ícone da seta para a esquerda-->
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        
                        <!-- carousel-control-next = Link responsável pelo deslizamento para a direita -->

                        <a class="carousel-control-next" href="#carousel" data-slide="next">

                            <!-- carousel-control-prev = ícone da seta para a direita -->
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
            
            </div>
            
        </main>


        <?php 
            
            require "../models/footer.php";

        ?>
        
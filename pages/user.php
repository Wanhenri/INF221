<!DOCTYPE html>
<?php
    $usuarios = [
        [ 'nome' => 'Matheus Paulista', 'birthday' => '20-06-2018', 'CPF' => '1921548239102', 'foto' => "../src/images/profile2.jpg"],
        [ 'nome' => 'Matheus Negro1', 'birthday' => '21-06-2018', 'CPF' => '1921548239102', 'foto' => "../src/images/profile3.jpg"],
        [ 'nome' => 'Matheus Negro2', 'birthday' => '22-06-2018', 'CPF' => '1921548239102', 'foto' => "../src/images/profile3.jpg"],
        [ 'nome' => 'Matheus Negro3', 'birthday' => '23-06-2018', 'CPF' => '1921548239102', 'foto' => "../src/images/profile3.jpg"]
    ];

    $avaliacoes = [
        [ 'nome' => 'Cálculo I', 'codigo' => 'MAT140', 'nota' => '4', 'dificuldade' => 'sim', 'util' => 'sim', 'recomenda' => 'sim'],
        [ 'nome' => 'Cálculo II', 'codigo' => 'MAT147', 'nota' => '4', 'dificuldade' => 'sim', 'util' => 'sim', 'recomenda' => 'sim'],
        [ 'nome' => 'Cálculo III', 'codigo' => 'MAT241', 'nota' => '4', 'dificuldade' => 'sim', 'util' => 'sim', 'recomenda' => 'sim'],
        [ 'nome' => 'Programação I', 'codigo' => 'INF110', 'nota' => '4', 'dificuldade' => 'sim', 'util' => 'sim', 'recomenda' => 'sim'],
        [ 'nome' => 'Programação II', 'codigo' => 'INF112', 'nota' => '4', 'dificuldade' => 'sim', 'util' => 'sim', 'recomenda' => 'sim'],
        [ 'nome' => 'Estrutura de Dados', 'codigo' => 'INF213', 'nota' => '4', 'dificuldade' => 'sim', 'util' => 'sim', 'recomenda' => 'sim'],
        [ 'nome' => 'Engenharia de Software I', 'codigo' => 'INF221', 'nota' => '4', 'dificuldade' => 'sim', 'util' => 'sim', 'recomenda' => 'sim'],
        [ 'nome' => 'Física I', 'codigo' => 'FIS201', 'nota' => '4', 'dificuldade' => 'sim', 'util' => 'sim', 'recomenda' => 'sim'],
        [ 'nome' => 'Organização de Computadores I', 'codigo' => 'INF251', 'nota' => '4', 'dificuldade' => 'sim', 'util' => 'sim', 'recomenda' => 'sim'],
        [ 'nome' => 'Linguagens Formais e Autômatos', 'codigo' => 'INF330', 'nota' => '4', 'dificuldade' => 'sim', 'util' => 'sim', 'recomenda' => 'sim']
    ];
?>

<html>
    <?php require('../views/header.php'); ?>
    <body>
        <!-- Minhas Informações -->
        <?php
            $usuario = ['nome' => 'Eduardo Moreira Júnior','birthday' => '20-06-2018', 'CPF' => '1921548239102'];
        ?>
        <div class='container-fluid'>
            <p class='display-4' style='font-size: 40px'> Dados do usuário </p> <br>
            <div class='card'>
                <div class='card-body'>
                        <div class="profile-header-img">
                            <img class="img-circle" src="../src/images/profile.jpg" />
                            <div style='vertical-align: middle'>
                                <p><b>Nome do Usuário:</b> <?php echo $usuario['nome']; ?></p>
                                <p><b>Data de nascimento:</b> <?php echo $usuario['birthday']; ?></p>
                                <p><b>ID do Facebook:</b> <?php echo $usuario['CPF']; ?></p>
                            </div>
                        </div>
                </div>
            </div>

            <!-- Minhas Avaliações -->

            <br><p class='display-4' style='font-size: 40px'> Suas Avaliações </p> <br>
            <div id="carouselAvaliacao" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php
                        $count = 0;
                        foreach ($avaliacoes as $item) {
                            $active = "class='active'";
                            echo "<li data-target='#carouselAvaliacao' style='background-color:black' data-slide-to='". $count ."' ".$active."></li>";
                            $count++;
                            $active = "";
                        }
                    ?>
                 </ol>
                <div class="carousel-inner">
                <?php
                    $active = " active";
                    foreach($avaliacoes as $item){
                        echo "<div class='carousel-item" . $active. "'>";
                        echo "
                        <div class='card card-avaliacao-perfil' >
                            <div>
                                <div class='card-body'>
                                    <h5 class='card-title' align='center'> {$item['nome']} </h5>
                                    <div class='card-text' style='vertical-align: middle'>
                                        <div class='row'>
                                            <div class='col-md-6'>
                                                <p> <b>Código:</b> {$item['codigo']} </p>
                                                <p> <b>Nota Dada:</b> {$item['nota']} </p>
                                                <p> <b>É difícil?:</b> {$item['dificuldade']} </p>
                                            </div>
                                            <div class='col-md-6'>
                                                <p> <b>É útil?:</b> {$item['util']} </p>
                                                <p> <b>Recomenda?:</b> {$item['recomenda']} </p>
                                            </div>
                                        </div>
                                        <div align='center'> <a  href='/INF221/pages/avaliacao_disciplina.php?disciplina={$item["codigo"]}' class='mt-auto card-link btn btn-primary' role='button' style='float: 'bottom' '>Editar</a>
                                    </div></div>
                                </div>
                            </div>
                        </div>
                        ";
                        echo "</div>";
                        $active = "";
                    }
                ?>
                    <a class="carousel-control-prev" href="#carouselAvaliacao" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color:black"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselAvaliacao" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true" style="background-color:black"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <!-- Amigos Conectados -->
            <br><p class='display-4' style='font-size: 40px'> Amigos Conectados </p> <br>
            <div id="carouselFriends" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php
                        $count = 0;
                        foreach ($usuarios as $item) {
                            $active = "class='active'";
                            echo "<li data-target='#carouselFriends' style='background-color:black' data-slide-to='". $count ."' ".$active."></li>";
                            $count++;
                            $active = "";
                        }
                    ?>
                 </ol>
                <div class="carousel-inner">
                    <?php
                        $active = " active";
                        foreach($usuarios as $item){
                            echo "<div class='carousel-item" . $active. "'>";
                            echo "
                            <div class='card card-perfil' >
                                <div >
                                    <div class='card-body'>
                                        <div class='profile-header-img'>
                                            <img class='img-circle' src='{$item['foto']}' />
                                            <div style='vertical-align: middle'>
                                                <p><b>Nome do Usuário:</b> {$item['nome']} </p>
                                                <p><b>Data de nascimento:</b> {$item['birthday']}</p>
                                                <p><b>ID do Facebook:</b> {$item['CPF']}</p>
                                                <a href='/INF221/pages/profile.php?nome={$item['nome']}' class='mt-auto card-link btn btn-primary' role='button' style='float: 'bottom' '>Ver Perfil</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ";
                            echo "</div>";
                            $active = "";
                        }
                    ?>
                    <a class="carousel-control-prev" href="#carouselFriends" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color:black"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselFriends" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true" style="background-color:black"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>

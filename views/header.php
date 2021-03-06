<!DOCTYPE html>

<head>
        <title> SAD - Sistema de Avaliação de Disciplinas </title>
        <link rel='shorcut icon' type='image/x-icon' href='../favicon.ico'>

        <script src='../src/js/jquery-3.3.1.min.js'></script>
        <script src='../src/js/bootstrap.bundle.min.js'></script>
        <script src='../src/js/bootstrap.min.js'></script>
        <script src='../src/js/popper.min.js'></script>

        <link rel='stylesheet' href='../src/css/style.css'>
        <link rel='stylesheet' href='../src/css/bootstrap.min.css'>
        <link rel='stylesheet' href='../src/css/bootstrap-grid.min.css'>
        <link rel='stylesheet' href='../src/css/bootstrap-reboot.min.css'>
        <link rel='stylesheet' href='../src/css/font-awesome.css'>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php session_start(); ?>
</head>

<script>
    // This is called with the results from from FB.getLoginStatus().
    function statusChangeCallback(response) {
        console.log('statusChangeCallback');
        console.log(response);
        // The response object is returned with a status field that lets the
        // app know the current login status of the person.
        // Full docs on the response object can be found in the documentation
        // for FB.getLoginStatus().
        if (response.status === 'connected') {
            document.getElementById('account').style.visibility='visible';
            testAPI();
        } else {
            document.getElementById('account').style.visibility='hidden';
            // The person is not logged into your app or we are unable to tell.
        }
    }

    // This function is called when someone finishes with the Login
    // Button.  See the onlogin handler attached to it in the sample
    // code below.
    function checkLoginState() {
        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });
    }

    window.fbAsyncInit = function() {
        FB.init({
            appId      : '1843440822387020',
            cookie     : true,  // enable cookies to allow the server to access
            // the session
            xfbml      : true,  // parse social plugins on this page
            version    : 'v2.8' // use graph api version 2.8
        });

        // Now that we've initialized the JavaScript SDK, we call
        // FB.getLoginStatus().  This function gets the state of the
        // person visiting this page and can return one of three states to
        // the callback you provide.  They can be:
        //
        // 1. Logged into your app ('connected')
        // 2. Logged into Facebook, but not your app ('not_authorized')
        // 3. Not logged into Facebook and can't tell if they are logged into
        //    your app or not.
        //
        // These three cases are handled in the callback function.

        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });

    };

    // Load the SDK asynchronously
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    // Here we run a very simple test of the Graph API after login is
    // successful.  See statusChangeCallback() for when this call is made.
    function testAPI() {
        FB.api('/me', function(response) {
            //alert('Logado com sucesso: ' + response.name);
        });
    }
    FB.logout(function(response) {
    });
</script>

<header>
    <script>
        const openModal = () => {
            $('#modalLogin').modal('toggle')
        }
    </script>
    <nav class='navbar navbar-expand-lg navbar-dark bg-dark' align='center'>
        <a class='navbar-brand' href='/'> SAD </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarText" aria-controls="navbarText"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id='navbarText' class='collapse navbar-collapse '>
            <ul class="navbar-nav mr-auto">
                <!-- Barra de pesquisa que aparece para celulares -->
                <li class="nav-item d-md-block d-lg-none">
                    <form class="my-lg-0" style='width: 80%; display: inline-flex'>
                        <input class="form-control my-2 my-sm-0" type="search" placeholder="Digite sua pesquisa"
                            aria-label="Search" style='height: 38px; padding: .375rem .75rem; margin: 8px 0 8px 0'>
                        <button class="btn btn-outline-primary my-2 my-sm-0" fontColor='black' type="submit">Pesquisar</button>
                    </form>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/INF221/pages/home.php">
                        Página Inicial <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/INF221/pages/disciplinas.php">Disciplinas</a>
                </li>
            </ul>
            <ul class='navbar-nav'>
                <li class='nav-item'>
                    <a id='account' class='nav-link' style='margin-left: 5px; margin-right: 5px; visibility: hidden' href='http://localhost/INF221/pages/user.php'>
                        Minha Conta
                    </a>
                </li>
                <li class='nav-item' align="center">
                    <fb:login-button class='btn' style='margin: auto;' autologoutlink="true" scope="public_profile,email" onlogin="checkLoginState();">
                    </fb:login-button>
                </li>
                <!-- Barra de pesquisa para computadores -->
                <li class='nav-item d-none d-lg-block'>
                    <form class="form-inline my-2 my-lg-0" action='../pages/disciplinas.php' method='POST'>
                        <input name='nome' id="nome" class="form-control mr-sm-2" type="search" placeholder="Digite a disciplina desejada..." aria-label="Search">
                        <button class="btn btn-outline-primary my-2 my-sm-0" fontColor='black' type="submit">Pesquisar</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</header>

<body>
    <div class="modal fade" id='modalLogin' tabindex="-1" role="dialog">
        <form action='../src/modules/login.php' method='post'>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Faça login com sua conta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class='form-group'>
                            <label>Email</label>
                            <input class='form-control' name='email' type='email'/>
                        </div>
                        <div class='form-group'>
                            <label>Senha</label>
                            <input class='form-control' name='pass' type='password'/>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button class="btn btn-success" type='submit'>Entrar</button>
                </div>
                </div>
            </div>
        </form>
    </div>
</body>

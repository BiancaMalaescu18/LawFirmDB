<?php
    
    
    $pagina = "index";
    if(isset($_GET['pagina']))
        $pagina = $_GET['pagina'];
    
    $pagini_corecte=['index','3a','3b','4a','4b', '5a', '5b', '6a', '6b'];
    if(!in_array($pagina, $pagini_corecte))
    {
        header("Location: ./");
            die();
    }
    $nf="pagini/pagina-".$pagina."php";
    
?>
<!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
            <style>
                .topp {
                background-image: url("https://upload.wikimedia.org/wikipedia/commons/thumb/f/f5/Computer-screen-code-glitch-animation-gif-background-free.gif/320px-Computer-screen-code-glitch-animation-gif-background-free.gif");
                background-color: #cccccc;
                height: 200px;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                position: relative;
                }
                .topp-text {
                text-align: center;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                color: #00264d;
                background-color:#e0e0eb;
                padding:10px;
                }
            </style>
            <title>
                Colocviu BD
            </title>
            <meta charset="utf-8">
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        </head>
        <body>
            <div class="container">
                <div>
                    <div class="topp">
                        <h1 class="topp-text">Colocviu baze de date Malaescu Bianca</h1>
                    </div>
                    
                </div>
                <nav class="navbar navbar-dark bg-dark">
                    <a class="navbar-brand" href="./?pagina=index">Acasă<i class="fas fa-home"></i></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                  
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                          <a class="nav-link" href="./?pagina=3a">Ex 3a</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="./?pagina=3b">Ex 3b</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="./?pagina=4a">Ex 4a</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="./?pagina=4b">Ex 4b</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="./?pagina=5a">Ex 5a</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="./?pagina=5b">Ex 5b</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="./?pagina=6a">Ex 6a</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="./?pagina=6b">Ex 6b</a>
                        </li>
                      </ul>
                    </div>
                  </nav>
                
                <?php
                    $nf ="pagini/pagina-".$pagina.".php";
                    if(file_exists($nf))
                        include $nf;
                ?>
            </div>
        </body>
    </html>
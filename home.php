<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    ?>
    <!DOCTYPE html>
    <?php
    include_once './racine.php';
    ?>
    <html>

        <head>
            <meta charset="UTF-8">
            <link href="assets/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
            <script src="js/jquery-3.6.0.min.js" type="text/javascript"></script>
            <script src="js/bootstrap.min.js" type="text/javascript"></script>
            <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
            
            <script src="js/filiere.js" type="text/javascript"></script>
            <script src="js/classe.js" type="text/javascript"></script>
            <script src="js/Search.js" type="text/javascript"></script>

            <script src="assets/dataTables.bootstrap4.min.js" type="text/javascript"></script>
            <script src="assets/jquery.dataTables.min.js" type="text/javascript"></script>
            <link href="assets/datatables.css" rel="stylesheet" type="text/css" />
            <link href="assets/datatables.min.css" rel="stylesheet" type="text/css" />
            <script src="assets/datatables.js" type="text/javascript"></script>

            <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
            <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
            <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
            <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
            <link href="css/styles.css" rel="stylesheet" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.2/chart.min.js" integrity="sha512-dnUg2JxjlVoXHVdSMWDYm2Y5xcIrJg1N+juOuRi0yLVkku/g26rwHwysJDAMwahaDfRpr1AxFz43ktuMPr/l1A==" crossorigin="anonymous"></script>
            <link rel="stylesheet" type="text/css" href="style.css">
            <link href="css/csshome.css" rel="stylesheet" type="text/css" />
            <title>GFC</title>
        </head>

        <body>
            <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
                <div class="container">
                    <a class="navbar-brand js-scroll-trigger" href="#page-top">
                        <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
                    </a>
                    <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        Menu
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#statistique">Statistique</a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#filieres">Filières</a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#classe">Classes</a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#findclasse">Rechercher</a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="logout.php">Logout</a></li>
                        </ul>
                    </div>

                </div>
            </nav>
            <header class="masthead bg-primary text-white text-center">
                <div class="container d-flex align-items-center flex-column">
                    <img class="masthead-avatar mb-5" src="assets/img/avataaars.svg" alt="" />
                    <h1 class="masthead-heading text-uppercase mb-0"><?php echo $_SESSION['name']; ?></h1>
                    <div class="divider-custom divider-light">
                        <div class="divider-custom-line"></div>
                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                        <div class="divider-custom-line"></div>
                    </div>
                    <p class="masthead-subheading font-weight-light mb-0">Graphic Artist - Web Designer - Illustrator</p>
                </div>
            </header>
            <section class="page-section bg-primary text-white mb-0" id="about">
                <div class="container">
                    <h2 class="page-section-heading text-center text-uppercase text-white">About</h2>
                    <div class="divider-custom divider-light">
                        <div class="divider-custom-line"></div>
                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                        <div class="divider-custom-line"></div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 ml-auto">
                            <p class="lead"><span class="text-uppercase"><?php echo $_SESSION['name']; ?></span> est un marocain développeur de TAZA 20 ans qui continu ses etudes dans l'ecole national de sience applique d'ELJADIDA.</p>
                        </div>
                        <div class="col-lg-4 mr-auto">
                            <p class="lead">Ce site la permettant d'ajouter des filières et des classes de l'ecole national de sience applique d'ELJADIDA ou de les supprimer.</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="page-section portfolio" id="statistique">
                <div class="container">
                    <!-- Portfolio Section Heading-->
                    <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Statistique</h2>
                    <!-- Icon Divider-->
                    <div class="divider-custom">
                        <div class="divider-custom-line"></div>
                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                        <div class="divider-custom-line"></div>
                    </div>
                    <div class="mb-3">
                        <canvas id="myChart" width="340" height="180"></canvas>
                        <script>
                            var ctx = document.getElementById('myChart').getContext('2d');
                            $.ajax({
                                url: 'controller/addClasse.php',
                                data: {
                                    op: 'countclasse'
                                },
                                type: 'POST',
                                success: function (data, textStatus, jqXHR) {
                                    var x = Array();
                                    var y = Array();
                                    data.forEach(function (e) {
                                        y.push(e.nbr);
                                        x.push(e.nom);
                                        
                                    });
                                    showGraph(x, y);
                                },
                                error: function (jqXHR, textStatus, errorThrown) {
                                    console.log(textStatus);
                                }
                            });

                            function showGraph(x, y) {
                                var myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: x,
                                        datasets: [{
                                                data: y,
                                                backgroundColor: [
                                                    'rgba(255, 99, 132, 0.2)',
                                                    'rgba(54, 162, 235, 0.2)',
                                                    'rgba(255, 206, 86, 0.2)',
                                                    'rgba(75, 192, 192, 0.2)',
                                                    'rgba(153, 102, 255, 0.2)',
                                                    'rgba(255, 159, 64, 0.2)'
                                                ],
                                                borderColor: [
                                                    'rgba(255, 99, 132, 1)',
                                                    'rgba(54, 162, 235, 1)',
                                                    'rgba(255, 206, 86, 1)',
                                                    'rgba(75, 192, 192, 1)',
                                                    'rgba(153, 102, 255, 1)',
                                                    'rgba(255, 159, 64, 1)'
                                                ],
                                                borderWidth: 1
                                            }]
                                    },
                                    options: {
                                        plugins: {
                                            legend: {
                                                display: true,
                                                labels: {
                                                    color: 'rgb(255, 99, 132)'
                                                }
                                            },
                                            title: {
                                                display: true,
                                                text: 'Nombre des classes dans chaque filiere'
                                            }
                                        },
                                        scales: {

                                            x: {
                                                title: {
                                                    display: true,
                                                    text: 'filiere'
                                                }
                                            },
                                            y: {
                                                title: {
                                                    display: true,
                                                    text: 'Nombre des classes'
                                                }
                                            }
                                        }
                                    }
                                });
                            }
                        </script>


                    </div>
                </div>
            </section>
            <section class="page-section" id="filieres">
                <div class="container">
                    <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">ajouter des felieres</h2>
                    <div class="divider-custom">
                        <div class="divider-custom-line"></div>
                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                        <div class="divider-custom-line"></div>
                    </div>
                    <div class="row">
                        <form method="GET">
                            <div class="form-group">
                                <label>Code :</label>
                                <input class="form-control" type="text" id="code" required="required">

                            </div>
                            <div class="form-group">
                                <label>Libbele :</label>
                                <input class="form-control" type="text" id="libelle" required="required">
                            </div>


                            <div class="form-check">
                                <button type="button" class="btn btn-outline-success mt-3 mb-3" id="btn">Ajouter</button>
                            </div>



                        </form>
                        <table id="tfiliere" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>CODE</th>
                                    <th>Libbele</th>
                                    <th>Supprimer</th>
                                    <th>Modifier</th>
                                </tr>
                            </thead>
                            <tbody id="table-content">

                            </tbody>


                        </table>


                    </div>
                </div>

            </section>
            <section class="page-section portfolio" id="classe">
                <div class="container">
                    <!-- Portfolio Section Heading-->
                    <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Ajouter des classes</h2>
                    <!-- Icon Divider-->
                    <div class="divider-custom">
                        <div class="divider-custom-line"></div>
                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                        <div class="divider-custom-line"></div>
                    </div>
                    <div class="mb-3">
                        <div>
                            <div>
                                <form method="GET">
                                    <div class="form-group">
                                        <label>Classe :</label>
                                        <input class="form-control" type="text" name="classe" id="c" value="" />
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Filiere:</label>
                                <select id="f" class="custom-select" aria-label="Default select example">
                                </select>
                            </div>


                            <div class="form-check">
                                <button type="button" class="btn btn-outline-success mt-3 mb-3" id="btn2">Ajouter</button>
                            </div>
                            <table id="tableclasse" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Classe</th>
                                        <th>Filiere</th>
                                        <th>Supprimer</th>
                                        <th>Modifier</th>
                                    </tr>
                                </thead>
                                <tbody id="tablec">

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </section>
            <section class="page-section portfolio" id="findclasse">
                <div class="container">
                    <!-- Portfolio Section Heading-->
                    <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Rechercher des classes</h2>
                    <!-- Icon Divider-->
                    <div class="divider-custom">
                        <div class="divider-custom-line"></div>
                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                        <div class="divider-custom-line"></div>
                    </div>
                    <div class="mb-3">
                        <div>
                            <div>
                                <form method="GET">
                            </div>
                            <div class="form-group">
                                <label for="filiere">Filiere : </label>
                                <select id="filiere" class="custom-select" style="width: 892px;"></select>
                                </select>
                            </div>


                            <div class="form-check">
                                <button type="button" class="btn btn-outline-success mt-3 mb-3" id="btns">Rechercher</button>
                            </div>
                            <table id="tsearch" class="table table-hover" style="width: 100%;">
                                <thead>
                                    <tr class="text-uppercase bg-light">
                                        <th scope="col">classes</th>
                                    </tr>
                                </thead>
                                <tbody id="tablec2">

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </section>
            <footer class="footer text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 mb-5 mb-lg-0">
                            <h4 class="text-uppercase mb-4">Location</h4>
                            <p class="lead mb-0">
                                Eljadida
                                <br />
                                Sidi ,Mosa 500
                            </p>
                        </div>
                        <div class="col-lg-4 mb-5 mb-lg-0">

                        </div>
                        <div class="col-lg-4">
                            <h4 class="text-uppercase mb-4">ENSAJ</h4>
                            <p class="lead mb-0">
                                L’Ecole Nationale des Sciences Appliquées d’El Jadida –ENSAJ–, est un établissement public qui a pour vocation la formation d’ingénieurs d’état
                                <a href="http://www.ensaj.ucd.ac.ma/presentations-de-lensaj/">Welcome to ensaj</a>
                                .
                            </p>
                        </div>
                    </div>
                </div>

        </body>

    </html>
    <?php
} else {
    header("Location: index.php");
    exit();
}
?>
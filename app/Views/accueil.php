
<!DOCTYPE html>
<html lang="fr">


<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description" content="Yorks - Responsive Multi-Purpose Template">
    <link href="/assets/images/favicon/favicon.png" rel="icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title><?= $TITRE_PAGE; ?></title>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700%7cSource+Sans+Pro:300,300i,400,400i,600,600i,700">
    <link rel="stylesheet" href="/assets/css/libraries.css"/>
    <link rel="stylesheet" href="/assets/css/style.css"/>
    <link rel="stylesheet" href="/assets/css/csstali.css"/>
    <link rel="stylesheet" href="/assets/css/csstemplate.css"/>

    <link rel="stylesheet" href="/assets/css/dropzone.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap-clockpicker.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/jquery-ui.css">

    <link rel="stylesheet" href="/assets/css/icon_fonts/fontawesome-free-5.15.1-web/css/all.css"/>
</head>


<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="/AccueilController">Accueil</a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

            <li class="nav-item">
                <a class="nav-link" href="/profil">Page principale</a>
            </li>


        </ul>
        <form class="form-inline my-2 my-lg-0">

            <a class="btn btn-outline-success my-2 my-sm-0 nav-link" type="submit" href="/signin">Login</a>

            <a class="btn btn-outline-success my-2 my-sm-0 nav-link" type="submit" href="/SignupController">Signup</a>
        </form>
    </div>
</nav>


<section>
    <h1 class="text-center">Bienvenue</h1>
    <img class="rounded mx-auto d-block" src="/assets/img/gsb.png" alt="logo-gsb">
</section>








<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->



</body>
</html>
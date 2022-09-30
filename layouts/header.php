<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Site meta -->
    <meta charset="utf-8">
    <title><?= WEBSITE_NAME; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="<?= DESCRIPTION_INDEX_PAGE; ?>">
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Ecommerce</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?vue=v_product.php&seeAll">Produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?vue=v_contact.php">Contact</a>
                </li>
            </ul>

            <form class="form-inline my-2 my-lg-0 d-inline-flex">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" placeholder="Recherche...">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-secondary btn-number">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <a class="btn btn-success btn-sm ms-3 d-inline-flex align-items-center" href="cart.html">
                    <i class="fa fa-shopping-cart me-2"></i> Panier
                    <span class="badge badge-light">3</span>
                </a>
            </form>

            <ul class="navbar-nav pl-3">
                <li class="nav-item">
                    <?php if (isset($_SESSION['user'])): ?>
                        <p id="welcome">Bienvenue <?= $name ?>!</p>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?vue=v_deconnexion.php">Déconnexion</a>
                        </li>
                    <?php endif; ?>
                </li>
                <?php if (!isset($_SESSION['user'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?vue=v_register.php">Inscription</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?vue=v_connexion.php">Connexion</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Ecommerce</h1>
        <p class="lead text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum delectus ad quae cumque voluptates dolorum, neque eveniet, placeat obcaecati magnam vel fugit nulla autem, mollitia consequuntur praesentium sit? Veniam, facere.</p>
    </div>
</section>
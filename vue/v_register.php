<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Formulaire d'inscription</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<?php
if(isset($_GET['validation'])):
    $success = false;

    $email = htmlspecialchars($_POST['email']) ?? null;
    $name = htmlspecialchars($_POST['name']) ?? null;
    $password = htmlspecialchars($_POST['password']) ?? null;
    $passwordVerification = htmlspecialchars($_POST['passwordVerification']) ?? null;

    $errors = [];

    if (empty($email)) {
        $errors[] = "L'email n'a pas été saisi.<br>";
    }

    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "L'email est incorrect.<br>";
    }

    if (empty($password)) {
        $errors[] = "Le mot de passe n'a pas été saisi.<br>";
    }

    if (empty($passwordVerification)) {
        $errors[] = "Le mot de passe à resaisir n'a pas été saisi.<br>";
    }

    if ($password !== $passwordVerification) {
        $errors[] = "Les mots de passe ne sont pas identiques.<br>";
    }

    if (empty($name)) {
        $errors[] = "Le nom n'a pas été saisi.<br>";
    }

    // On vérifie que l'email n'xiste pas dans la BDD
    $u = new User($db);
    $res = $u->verifEmailRegister($email);
    
    if ($res == 1) {
        $errors[] = "Vous avez déjà un compte";
    }

    if (empty($errors)) {
        $success = true;
    } else {
        echo "<div id='succes-registration' class='d-flex justify-content-center p-3 mb-2 bg-danger text-white'>";
            foreach ($errors as $error) {
                echo $error;
            }
        echo "</div>";
    }

    if ($success) {
        // D'abord, on crypte le mot de passe
        $password = sha1($password);

        // On enregistre les données dans la BDD
        $u = new User($db);
        $res = $u->addUser($email, $name, $password);
        
        // On affiche le message
        if ($res == 1) {
            echo "<div id='succes-registration' class='d-flex justify-content-center p-3 mb-2 bg-success text-white'>Félicitations, votre compte a été créé</div>";
            // On le redirige vers l'accueil
            header('Refresh: 3; URL='.URL.'');
        }
    }
endif;
?>


<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white"><i class="fa fa-folder"></i>&nbsp;&nbsp;&nbsp;Formulaire d'inscription
                </div>
                <div class="card-body">
                    <form method="post" name="register" action="index.php?vue=v_register.php&validation">
                    <div class="mb-3">
                            <label for="email">Adresse e-mail (login)</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Votre email">
                            <small id="emailHelp" class="form-text text-muted">Nous ne partagerons pas votre email.</small>
                        </div>
                        <div class="mb-3">
                            <label for="name">Nom</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Votre nom">
                        </div>
                        <div class="mb-3">
                            <label for="name">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe">
                        </div>
                        <div class="mb-3">
                            <label for="name">Resaisir le mot de passe</label>
                            <input type="password" class="form-control" id="passwordVerification" name="passwordVerification" placeholder="Resaisir votre mot de passe">
                        </div>
                        <div class="mx-auto">
                        <button type="submit" class="btn btn-primary text-right" name="contact">S'inscrire</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
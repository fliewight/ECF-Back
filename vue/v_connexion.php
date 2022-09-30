<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Formulaire de connexion</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<?php
if(isset($_GET['connect'])):
    $success = false;
    
    $email = htmlspecialchars($_POST['email']) ?? null;
    $password = htmlspecialchars(sha1($_POST['password'])) ?? null;

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

    // On vérifie que l'utilisateur existe en BDD
    $u = new User($db);
    $res = $u->getConnexion($email, $password);

        if ($res == 1) {
            // L'utilisateur existe en BDD, donc on créé les variables de session
            $_SESSION["user"] = $email;

            // On le redirige vers l'accueil
            header('Location: '.URL.'');
        }
        else {
            echo "La saisie pour la connexion sont éronnés, merci de bien vouloir recommencer";
        }


    if (empty($errors)) {
        $success = true;
    } else {
        echo "<div id='succes-registration' class='d-flex justify-content-center p-3 mb-2 bg-danger text-white'>";
            foreach ($errors as $error) {
                echo $error;
            }
        echo "</div><";
    }
endif;
?>


<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white"><i class="fa fa-folder"></i>&nbsp;&nbsp;&nbsp;Formulaire de connexion
                </div>
                <div class="card-body">
                    <form method="post" name="register" action="index.php?vue=v_connexion.php&connect">
                    <div class="mb-3">
                            <label for="email">Adresse e-mail</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Votre email">
                        </div>
                        <div class="mb-3">
                            <label for="name">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe">
                        </div>
                        <div class="mx-auto">
                        <button type="submit" class="btn btn-primary text-right" name="contact">S'inscrire</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
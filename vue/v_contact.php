<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<?php
    $name = $_POST['name'] ?? null;
    $email = $_POST['email'] ?? null;
    $message = $_POST['message'] ?? null;
    $success = false;
    $errors = [];

    if (!empty($_POST)) {
        if (empty($name)) {
            $errors[] = 'Le nom est obligatoire';
        }

        if (strlen($name) < 3) {
            $errors[] = 'Le nom doit faire au moins 3 caractères.';
        }

        if (empty($email)) {
            $errors[] = 'L\'email est obligatoire.';
        }

        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'L\'email est invalide.';
        }

        if (empty($message)) {
            $errors[] = 'Le message est obligatoire.';
        }

        // Afficher un message de succès ou les erreurs
        if (empty($errors)) {
            $success = true;
        }
    }
    
    if ($success) {
        echo "<p>Merci <?= $name; ?>, votre e-mail a bien été envoyé</p>";





        //mettez ici votre adresse mail
        $VotreAdresseMail="lissjulien@gmail.com";
        //tout est correctement renseigné, on envoi le mail
        //on renseigne les entêtes de la fonction mail de PHP
        $Entetes = "MIME-Version: 1.0\r\n";
        $Entetes .= "Content-type: text/html; charset=UTF-8\r\n";
        $Entetes .= "From: Nom de votre site <".$email.">\r\n";//de préférence une adresse avec le même domaine de là où, vous utilisez ce code, cela permet un envoie quasi certain jusqu'au destinataire
        $Entetes .= "Reply-To: Nom de votre site <".$email.">\r\n";
        //on prépare les champs:
        $Mail=$_POST['mail']; 
        $Sujet='=?UTF-8?B?'.base64_encode($_POST['sujet']).'?=';//Cet encodage (base64_encode) est fait pour permettre aux informations binaires d'être manipulées par les systèmes qui ne gèrent pas correctement les 8 bits (=?UTF-8?B? est une norme afin de transmettre correctement les caractères de la chaine)
        $Message=htmlentities($_POST['message'],ENT_QUOTES,"UTF-8");//htmlentities() converti tous les accents en entités HTML, ENT_QUOTES Convertit en + les guillemets doubles et les guillemets simples, en entités HTML
        //en fin, on envoi le mail
        if(mail($VotreAdresseMail,$Sujet,nl2br($message),$Entetes)){//la fonction nl2br permet de conserver les sauts de ligne et la fonction base64_encode de conserver les accents dans le titre
            echo "Le mail à été envoyé avec succès!";
        } else {
            echo "Une erreur est survenue, le mail n'a pas été envoyé";
        }








    }

    if (!empty($errors)) {
        echo "<div>";
            foreach ($errors as $error) {
                echo "<p>".$error."</p>";
            }
        echo "</div>";
    }
?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> Contactez-nous.
                </div>
                <div class="card-body">
                    <form method="post" name="contact" action="">
                        <div class="mb-3">
                            <label for="name">Nom</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Votre nom">
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Votre email">
                            <small id="emailHelp" class="form-text text-muted">Nous ne partagerons pas votre email.</small>
                        </div>
                        <div class="mb-3">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="6"></textarea>
                        </div>
                        <div class="mx-auto">
                        <button type="submit" class="btn btn-primary text-right" name="contact">Envoyer</button></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Adresse</div>
                <div class="card-body">
                    <p>3 rue des Champs Elysées</p>
                    <p>75008 PARIS</p>
                    <p>France</p>
                    <p>Email : email@example.com</p>
                    <p>Tel. +33 12 56 11 51 84</p>

                </div>

            </div>
        </div>
    </div>
</div>

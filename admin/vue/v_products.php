                    
                    <div class="row">
                        <div class="col-lg-9 main-chart">
                            <!--CUSTOM CHART START -->
                            <div class="border-head">
                                <h3>LISTE DES PRODUITS</h3>
                            </div>
                            <div>
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
                            </div>
                        </div>
                    </div>

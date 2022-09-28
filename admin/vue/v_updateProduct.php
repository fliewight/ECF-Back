                <div class="border-head">
                    <h3>MODIFIER UN PRODUIT</h3>
                </div>
                <div>
                    <?php
                    if (isset($_GET['update'])):
                        $name = $_POST['name'] ?? null;
                        $description = $_POST['description'] ?? null;
                        $price = $_POST['price'] ?? null;
                        $slug = $_POST['slug'] ?? null;
                        $colors_list = $_POST['colors_list'] ?? null;

                        $errors = [];

                        if (empty($name)) {
                            $errors[] = 'Le nom est obligatoire';
                        }

                        if (empty($description)) {
                            $errors[] = 'La description est obligatoire';
                        }

                        if (empty($price)) {
                            $errors[] = 'Le prix est obligatoire';
                        }

                        if (empty($slug)) {
                            $errors[] = 'Le slug est obligatoire';
                        }

                        if (empty($colors_list)) {
                            $errors[] = 'La liste de couleur(s) est/sont obligatoire(s)';
                        }

                        if (isset($_POST['promotion'])) $promotion = $_POST['promotion'];

                        // Afficher un message de succès ou les erreurs
                        if (empty($errors)) {
                            // On enregistre dans la BDD
                            $p = new ProductAdmin($db);
                            $res = $p->setProduct($name, $description, $price, $slug, $colors_list, $promotion, $_GET['id']);
                            // On affiche le résultat
                            if($res==1) echo "<p class='success'>Le produit a bien été mis à jour.</p><hr />";
                            else echo "<p class='error'>Une erreur est survenue lors de la modification du produit : veuillez contacter le webmaster.</p><hr />";
                        }

                        if (!empty($errors)) {
                            echo "<div>";
                                foreach ($errors as $error) {
                                    echo "<p>".$error."</p>";
                                }
                            echo "</div><hr />";
                        }

                    endif;
                    ?>

                    <div class="container-fluid">
                        <div class="row">
                            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                            <?php
                                if (isset($_GET['id']) || isset($_GET['update'])):
                                    ?>
                                        <form method="post" action="<?= URL_BACK ?>produits/modifier/<?= $_GET['id']; ?>/update">
                                            <?php
                                            $p = new ProductAdmin($db);
                                            foreach ($p->getProduct($_GET['id']) as $data):
                                                if ($data['name'])
                                                {
                                                ?>
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Nom du produit</label>
                                                        <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" value="<?= $data['name']; ?>">
                                                    </div><br />
                                                <?php
                                                }
                                                if ($data['description'])
                                                {
                                                ?>
                                                    <div class="mb-3">
                                                        <label for="description" class="form-label">Description</label>
                                                        <textarea class="form-control" name="description"  id="description" rows="3"><?= $data['description']; ?></textarea>
                                                    </div><br />
                                                <?php
                                                }
                                                if ($data['price'])
                                                {
                                                ?>
                                                    <div class="mb-3">
                                                        <label for="price" class="form-label">Prix</label>
                                                        <input type="number" class="form-control" name="price" id="price" aria-describedby="priceHelp" value="<?= $data['price']; ?>">
                                                    </div><br />
                                                <?php
                                                }
                                                if ($data['slug'])
                                                {
                                                ?>
                                                    <div class="mb-3">
                                                        <label for="slug" class="form-label">Slug</label>
                                                        <input type="text" class="form-control" name="slug" id="slug" aria-describedby="slugHelp" value="<?= $data['slug']; ?>">
                                                    </div><br />
                                                <?php
                                                }
                                                if ($data['colors_list'])
                                                {
                                                ?>
                                                    <div class="mb-3">
                                                        <label for="colors_list" class="form-label">Liste de couleurs</label>
                                                        <input type="text" class="form-control" name="colors_list" id="colors_list" aria-describedby="colors_listHelp" value="<?= $data['colors_list']; ?>">
                                                    </div><br />
                                                <?php
                                                }
                                                if ($data['promotion'])
                                                {
                                                ?>
                                                    <div class="mb-3">
                                                        <label for="promotion" class="form-label">Promotion</label>
                                                        <input type="number" class="form-control" name="promotion" id="promotion" aria-describedby="promotiontHelp" value="<?= $data['promotion']; ?>">
                                                    </div><br />
                                                <?php
                                                }
                                            endforeach;
                                            ?>
                                            <br />
                                            <button type="submit" class="btn btn-primary">Modifier le produit</button>
                                        </form>
                                    <?php
                                else: echo "<b>L'identifiant n'est pas renseigné.</b>";
                                endif;
                            ?>

                        </main>
                    </div>
                </div>

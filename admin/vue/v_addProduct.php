                <div class="border-head">
                    <h3>AJOUTER UN PRODUIT</h3>
                </div>
                <div>
                    <div class="container-fluid">
                        <div class="row">
                            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                                <?php if (!isset($_GET['action'])): ?>
                                <form method="post" action="<?= URL_BACK ?>produits/creer/action">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nom du produit</label>
                                        <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" value="">
                                    </div><br />
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" name="description"  id="description" rows="3"></textarea>
                                    </div><br />
                                    <div class="mb-3">
                                        <label for="price" class="form-label">Prix</label>
                                        <input type="number" class="form-control" name="price" id="price" aria-describedby="priceHelp" value="">
                                    </div><br />
                                    <div class="mb-3">
                                        <label for="slug" class="form-label">Slug</label>
                                        <input type="text" class="form-control" name="slug" id="slug" aria-describedby="slugHelp" value="">
                                    </div><br />
                                    <div class="mb-3">
                                        <label for="colors_list" class="form-label">Liste de couleurs</label>
                                        <input type="text" class="form-control" name="colors_list" id="colors_list" aria-describedby="colors_listHelp" value="">
                                    </div><br />
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Image du produit</label>
                                        <input type="file" class="form-control" name="image" id="image" aria-describedby="imageHelp" value="">
                                    </div><br />
                                    <div class="mb-3">
                                        <label for="promotion" class="form-label">Promotion</label>
                                        <input type="number" class="form-control" name="promotion" id="promotion" aria-describedby="promotiontHelp" value="">
                                    </div><br />
                                    <div class="mb-3">
                                        <label for="category" class="form-label">Sélectionnez une catégorie</label><br />
                                        <select name="category" id="category">
                                            <?php
                                                $c = new CategoryAdmin($db);
                                                foreach ($c->getAllCategories() as $data)
                                                {
                                                    if ($data['id']) $id = $_GET['id'];
                                                    if ($data['name']) echo "<option value='".$data['name']."'>".$data['name']."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div><br /><br />
                                    <button type="submit" class="btn btn-primary">Ajouter le produit</button>
                                </form>
                                <?php endif; ?>
                                    

                                <?php 
                                    if (isset($_GET['action'])):
                                        // On récupère les données du formulaire
                                        $name = $_POST['name'] ?? null;
                                        $description = $_POST['description'] ?? null;
                                        $price = $_POST['price'] ?? null;
                                        $slug = $_POST['slug'] ?? null;
                                        $crush = $_POST['crush'] ?? null;
                                        $colors_list = $_POST['colors_list'] ?? null;
                                        $image = $_POST['image'] ?? null;
                                        $promotion = $_POST['promorion'] ?? null;
                                        $category = $_POST['category'] ?? null;
                                        // On génère la date  d'aujourd'hui
                                        $date = date("Y").'-'.date("m").'-'.date("d");

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

                                        if (empty($image)) {
                                            $errors[] = 'L\'image n\'a pas été uploadé';
                                        }

                                        if (isset($_POST['promotion'])) $promotion = $_POST['promotion'];

                                        // Afficher un message de succès ou les erreurs
                                        if (empty($errors)) {
                                            // On récupère l'ID de la catégorie du produit par rapport à son name
                                            $c = new CategoryAdmin($db);
                                            foreach ($c->searchCategoryId($category) as $data) {
                                                if ($data['id']) $id = $data['id'];
                                            }


                                            //echo $name." - ".$description." - ".$price." - ".$slug." - ".$date." - ".$colors_list." - ".$image." - ".$promotion." - ".$id;


                                            // On enregistre dans la BDD
                                            $u = new ProductAdmin($db);
                                            $res = $p->addProduct($name, $description, $price, $slug, $date, $colors_list, $image, $promotion, $id);
                                            // On affiche le résultat
                                            if($res==1) echo "<p class='success'>Le produit a bien été ajouté.</p><hr />";
                                            else echo "<p class='error'>Une erreur est survenue lors de l'ajout' : veuillez contacter le webmaster.</p><hr />";
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
                            </main>
                        </div>
                    </div>
                </div>

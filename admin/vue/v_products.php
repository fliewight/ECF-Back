                <div class="border-head">
                    <h3>LISTE DES PRODUITS</h3>
                </div>
                <div>
                    <div class="container-fluid">
                        <div class="row">
                            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                    <a class="btn btn-primary" href="<?= URL_BACK ?>produits/creer">Créer un produit</a>
                                </div>

                                <div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Image</th>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Prix</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $p = new ProductAdmin($db);
                                            foreach ($p->getAllProducts() as $data)
                                            {
                                                echo '<tr>';
                                                    echo '<td>';
                                                        echo '<img width="80" src="'.$data['image'].'" alt="">';
                                                    echo '</td>';
                                                    echo '<td>'.$data['name'].'</td>';
                                                    echo '<td>'.$data['price'].' €</td>';
                                                    echo '<td>';
                                                        /*echo '<a class="btn btn-primary" href="index.php?vue=v_updateProduct.php&id='.$data['id'].'">Modifier</a>&nbsp;&nbsp;&nbsp;';*/
                                                        /*echo '<a class="btn btn-primary" href="'.URL_BACK.'"produits/modifier/'.$data['id'].'">Modifier</a>&nbsp;&nbsp;&nbsp;';
                                                        echo '<a class="btn btn-danger" href="'.URL_BACK.'"produits/supprimer/'.$data['id'].'">Supprimer</a>';*/
                                                        ?>
                                                        <a class="btn btn-primary" href="<?= URL_BACK ?>produits/modifier/<?= $data['id'] ?>">Modifier</a>&nbsp;&nbsp;&nbsp;
                                                        <a class="btn btn-danger" href="<?= URL_BACK ?>produits/supprimer/<?= $data['id'] ?>">Supprimer</a>
                                                        <?php
                                                    echo '</td>';
                                                echo '</tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </main>
                        </div>
                    </div>
                </div>


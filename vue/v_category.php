<?php
if (isset($_GET['id'])):
?>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-3">
            <div class="card bg-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i> Filtres</div>
                <form action="" method="post">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="form-check">
                                <input type="checkbox" name="color[]" value="bleu" class="form-check-input" id="color-bleu">
                                <label class="form-check-label" for="color-bleu">Bleu</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-check">
                                <input type="checkbox" name="color[]" value="rouge" class="form-check-input" id="color-red">
                                <label class="form-check-label" for="color-red">Rouge</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-check">
                                <input type="checkbox" name="color[]" value="vert" class="form-check-input" id="color-vert">
                                <label class="form-check-label" for="color-vert">Vert</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <button class="btn btn-primary w-100">Filtrer</button>
                        </li>
                    </ul>
                </form>
            </div>
            <div class="card bg-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i> Catégories</div>
                <ul class="list-group category_block">
                    <?php
                    $c = new Category($db);
                    foreach ($c->getAllCategories() as $data)
                    {
                        if($data['id']) {
                            ?>
                                <li class="list-group-item"><a href="index.php?vue=v_category.php&id=<?= $data['id']; ?>">
                            <?php
                        }
                        if($data['name']) echo $data['name']."</a></li>";
                    }
                    ?>
                </ul>
            </div>
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase">Dernier produit</div>
                <div class="card-body">
                <?php
                    $p = new Product($db);
                    foreach ($p->getLatestProduct() as $data)
                    {
                        if($data['image']) echo "<img class='img-fluid' src='".$data['image']."' />";
                        if($data['name']) echo "<h5 class='card-title mt-3'>".$data['name']."</h5>";
                        if($data['description']) echo "<p class='card-text'>".$data['description']."</p>";
                        if($data['price']) {
                            ?>
                                <div class="row">
                                    <div class="col">
                                        <p class="btn btn-danger w-100"><?= $data['price']; ?> &euro;</p>
                                    </div>
                            <?php
                        }
                        if($data['id']) {
                            ?>
                                <div class="col">
                                    <a href="index.php?vue=v_product.php&id=<?= $data['id']; ?>" class="btn btn-success w-100">Voir</a>
                                </div>
                            <?php
                        }
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                <?php
                    $p = new Product($db);
                    foreach ($p->getAllProducts() as $data)
                    {
                        echo "<div class='card'>";
                            if($data['image']) echo "<img class='card-img-top' src='".$data['image']."' />";
                            if($data['name']) {
                                echo "<div class='card-body'>";
                                    echo "<h5 class='card-title mt-3'>".$data['name']."</h5>";
                            }
                            if($data['description']) echo "<p class='card-text'>".$data['description']."</p>";
                            if($data['price']) {
                                ?>
                                    <div class="row">
                                        <div class="col">
                                            <p class="btn btn-danger w-100"><?= $data['price']; ?> &euro;</p>
                                        </div>
                                <?php
                            }
                            if($data['id']) {
                                ?>
                                    <div class="col">
                                        <a href="index.php?vue=v_product.php&add=<?= $data['id']; ?>" class="btn btn-success w-100">Ajouter</a>
                                    </div>
                                <?php
                            }
                            echo "</div>";
                        echo "</div>";
                    }
                    ?>
                    <div class="card">
                        <img class="card-img-top" src="https://dummyimage.com/600x400/55595c/fff" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"><a href="product.html" title="View Product">Produit</a></h4>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger w-100">99,00 &euro;</p>
                                </div>
                                <div class="col">
                                    <a href="#" class="btn btn-success w-100">Ajouter</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="https://dummyimage.com/600x400/55595c/fff" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"><a href="product.html" title="View Product">Produit</a></h4>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger w-100">99,00 &euro;</p>
                                </div>
                                <div class="col">
                                    <a href="#" class="btn btn-success w-100">Ajouter</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="https://dummyimage.com/600x400/55595c/fff" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"><a href="product.html" title="View Product">Produit</a></h4>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger w-100">99,00 &euro;</p>
                                </div>
                                <div class="col">
                                    <a href="#" class="btn btn-success w-100">Ajouter</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="https://dummyimage.com/600x400/55595c/fff" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"><a href="product.html" title="View Product">Produit</a></h4>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger w-100">99,00 &euro;</p>
                                </div>
                                <div class="col">
                                    <a href="#" class="btn btn-success w-100">Ajouter</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="https://dummyimage.com/600x400/55595c/fff" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"><a href="product.html" title="View Product">Produit</a></h4>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger w-100">99,00 &euro;</p>
                                </div>
                                <div class="col">
                                    <a href="#" class="btn btn-success w-100">Ajouter</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="https://dummyimage.com/600x400/55595c/fff" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"><a href="product.html" title="View Product">Produit</a></h4>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger w-100">99,00 &euro;</p>
                                </div>
                                <div class="col">
                                    <a href="#" class="btn btn-success w-100">Ajouter</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <nav aria-label="...">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Précédent</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Suivant</a>
                            </li>
                        </ul>
                    </nav>
                </div>-->
            </div>
        </div>

    </div>
</div>
<?php endif; ?>
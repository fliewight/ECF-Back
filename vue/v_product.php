<?php
if (isset($_GET['seeAll'])):
?>
    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Produits</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

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
                            ?>
                            <div class="card">
                                <?php if($data['image']): ?>
                                    <img class="card-img-top" src="<?= $data['image'] ?>" alt="Card image cap">
                                <?php endif; ?>
                                <div class="card-body">
                                    <?php if($data['name']): ?>
                                        <h4 class="card-title"><a href="product.html" title="View Product">Produit</a></h4>
                                    <?php endif; ?>
                                    <?php if($data['description']): ?>
                                        <p class="card-text"><?= $data['description'] ?></p>
                                    <?php endif; ?>
                                    <div class="row">
                                        <div class="col">
                                            <?php if($data['price']): ?>
                                                <p class="btn btn-danger w-100"><?= $data['price'] ?> &euro;</p>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col">
                                            <?php if($data['id']): ?>
                                                <a href="index.php?vue=v_product.php&add=<?= $data['id']; ?>" class="btn btn-success w-100">Ajouter</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php
if (isset($_GET['id'])):
$id = $_GET['id'];


$p = new Product($db);
foreach ($p->getProduct($id) as $data)
{
    ?>
    <div class="card">
        <?php if($data['image']): ?>
            <img class="card-img-top" src="<?= $data['image'] ?>" alt="Card image cap">
        <?php endif; ?>
        <div class="card-body">
            <?php if($data['name']): ?>
                <h4 class="card-title"><a href="product.html" title="View Product">Produit</a></h4>
            <?php endif; ?>
            <?php if($data['description']): ?>
                <p class="card-text"><?= $data['description'] ?></p>
            <?php endif; ?>
            <div class="row">
                <div class="col">
                    <?php if($data['price']): ?>
                        <p class="btn btn-danger w-100"><?= $data['price'] ?> &euro;</p>
                    <?php endif; ?>
                </div>
                <div class="col">
                    <?php if($data['id']): ?>
                        <a href="index.php?vue=v_product.php&add=<?= $data['id']; ?>" class="btn btn-success w-100">Ajouter</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php
}


endif;
?>
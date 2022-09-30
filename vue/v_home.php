<div class="container">
    <div class="row">
        <div class="col">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <!--<div class="carousel-item active">
                        <img class="d-block w-100" src="https://dummyimage.com/855x365/55595c/fff" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="https://dummyimage.com/855x365/a30ca3/fff" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="https://dummyimage.com/855x365/1443ff/fff" alt="Third slide">
                    </div>-->
                    <?php
                    $h = new Home($db);
                    foreach ($h->getRandomProduct() as $data)
                    {
                        echo "<div class='carousel-item'>";
                            if($data['image']) echo "<img class='d-block w-100' src='".$data['image']."'>";
                        echo "</div>";
                    }
                    ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="card h-100">
                <div class="card-header bg-success text-white text-uppercase">
                    <i class="fa fa-heart"></i> Coup de coeur
                </div>
                <?php
				$h = new Home($db);
				foreach ($h->getRandomCrush() as $data)
				{
					if($data['image']) echo '<img class="img-fluid border-0" src="'.$data['image'].'" height="400" alt="Card image cap">';
                    if($data['name']) {
                        echo '<div class="card-body">
                            <h4 class="card-title text-center"><a href="product.html" title="'.$data['name'].'">'.$data['name'].'</a></h4>';
                    }
                    if($data['description']) echo '<p class="card-text">'.$data['description'].'</p>';
                    if($data['price']) {
                        echo '<div class="row">
                                <div class="col">
                                    <p class="btn btn-danger w-100">'.$data['price'].' &euro;</p>
                              </div>';
                    }
                    if($data['id']) {
                                echo '<div class="col">
                                    <a href="index.php?vue=v_product&id='.$data['id'].'" class="btn btn-success w-100">Voir</a>
                                </div>
                            </div>
                        </div>';
                    }
				}
				?>
            </div>
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-header bg-primary text-white text-uppercase">
                    <i class="fa fa-star"></i> Derniers produits
                </div>
                <div class="card-body">
                    <div class="row">
                    <?php
                    $h = new Home($db);
                    foreach ($h->getLatestProducts() as $data)
                    {
                        if($data['image']) {
                            ?>
                            <div class="col-sm">
                                <div class="card">
                                    <img height="400" class="card-img-top" src="<?= $data['image']; ?>" alt="Card image cap">
                            <?php
                        }
                        if($data['name']) {
                            ?>
                                        <div class="card-body">
                                            <h4 class="card-title"><a href="product.html" title="<?= $data['name']; ?>"><?= $data['name']; ?></a></h4>
                            <?php
                            }
                            if($data['description']) {
                            ?>
                                            <p class="card-text"><?= $data['description']; ?></p>
                            <?php
                            }
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
                                                    <a href="index.php?vue=v_cart.php&add=<?= $data['id']; ?>" class="btn btn-success w-100">Ajouter</a>
                                                </div>
                            <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                             }
                             ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-3 mb-4">
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-header bg-primary text-white text-uppercase">
                    <i class="fa fa-trophy"></i> Meilleurs produits
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm">
                            <div class="card">
                                <img class="card-img-top" src="https://dummyimage.com/600x400/55595c/fff" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title"><a href="product.html" title="View Product">Produit</a></h4>
                                    <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                                    <div class="row">
                                        <div class="col">
                                            <p class="btn btn-danger w-100">99,00 &euro;</p>
                                        </div>
                                        <div class="col">
                                            <a href="cart.html" class="btn btn-success w-100">Ajouter</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="card">
                                <img class="card-img-top" src="https://dummyimage.com/600x400/55595c/fff" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title"><a href="product.html" title="View Product">Produit</a></h4>
                                    <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                                    <div class="row">
                                        <div class="col">
                                            <p class="btn btn-danger w-100">99,00 &euro;</p>
                                        </div>
                                        <div class="col">
                                            <a href="cart.html" class="btn btn-success w-100">Ajouter</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="card">
                                <img class="card-img-top" src="https://dummyimage.com/600x400/55595c/fff" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title"><a href="product.html" title="View Product">Produit</a></h4>
                                    <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                                    <div class="row">
                                        <div class="col">
                                            <p class="btn btn-danger w-100">99,00 &euro;</p>
                                        </div>
                                        <div class="col">
                                            <a href="cart.html" class="btn btn-success w-100">Ajouter</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="card">
                                <img class="card-img-top" src="https://dummyimage.com/600x400/55595c/fff" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title"><a href="product.html" title="View Product">Produit</a></h4>
                                    <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                                    <div class="row">
                                        <div class="col">
                                            <p class="btn btn-danger w-100">99,00 &euro;</p>
                                        </div>
                                        <div class="col">
                                            <a href="cart.html" class="btn btn-success w-100">Ajouter</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
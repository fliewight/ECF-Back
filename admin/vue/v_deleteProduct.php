                <div class="border-head">
                    <h3>SUPPRIMER UN PRODUIT</h3>
                </div>
                <div>
                    <div class="container-fluid">
                        <div class="row">
                            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                                <?php
                                    if (isset($_GET['id']) && !isset($_GET['validate'])):
                                        echo "<p>Voulez-vous vraiment supprimer le produit n°".$_GET['id']." ?</p>";
                                ?>
                                <!--<form method="post" action="index.php?vue=v_deleteProduct.php&id=<?= $_GET['id']; ?>&validate">-->
                                <form method="post" action="<?= URL_BACK ?>produits/supprimer/<?= $_GET['id']; ?>&validate">
                                    <input type="submit" name="yes" value="Oui">
                                </form>
                                <hr />
                                <a href="javascript: history.go(-1)">← Retour</a>
                                <?php endif; ?>

                                <?php
                                    if (isset($_GET['id']) && isset($_GET['validate'])):
                                        // On supprime le produit de la BDD
                                        $id = $_GET['id'];
                                        
                                        $p = new ProductAdmin($db);
                                        $res = $p->deleteProduct($id);

                                        // On affiche le résultat
                                        if($res==1) echo "<p>Le produit a bien été supprimé</p>";
                                        else echo "<p>Une erreur est survenue lors de la suppression du produit : veuillez contacter le webmaster.</p>";
                                    endif;
                                ?>
                        </main>
                    </div>
                </div>


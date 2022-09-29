<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Formulaire d'inscription</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> Formulaire d'inscription
                </div>
                <div class="card-body">
                    <form method="post" name="contact" action="">
                    <div class="mb-3">
                            <label for="email">Adresse e-mail (ce sera votre login)</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Votre email">
                            <small id="emailHelp" class="form-text text-muted">Nous ne partagerons pas votre email.</small>
                        </div>
                        <div class="mb-3">
                            <label for="name">Nom</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Votre nom">
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
    </div>
</div>
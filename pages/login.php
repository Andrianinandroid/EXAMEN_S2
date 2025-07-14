<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../assets/css/bootstrap/css/bootstrap.min.css">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-center bg-primary text-white">
                        <h2 class="mb-0">Site d'emprunt</h2>
                        <p class="mb-0">Connectez-vous pour emprunter des objets a vos amis</p>
                    </div>
                    <div class="card-body">
                        <form action="verification.php" method="get">
                            <div class="mb-3">
                                <label for="mail" class="form-label">Adresse e-mail</label>
                                <input type="email" name="mail" class="form-control" placeholder="Adresse e-mail" required>
                            </div>
                            <div class="mb-3">
                                <label for="motdepasse" class="form-label">Mot de passe</label>
                                <input type="password" name="motdepasse" class="form-control" placeholder="Mot de passe" required>
                            </div>
                            <div class="d-grid">
                                <input type="submit" value="Se connecter" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <p class="mb-1">Vous n'avez pas encore de compte ?</p>
                        <a href="index.php" class="btn btn-outline-secondary">Créer un compte</a>
                    </div>
                </div>

                <?php if (isset($_GET['erreur'])) { ?>
                    <div class="alert alert-danger text-center mt-3" role="alert">
                        Ce compte n'existe pas. <a href="index.php" class="alert-link">S'inscrire</a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

</body>
</html>
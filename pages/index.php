<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Inscription</title>
    <link rel="stylesheet" href="../assets/css/bootstrap/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-center bg-primary text-white">
                        <h3 class="mb-0">Site d'emprunt</h3>
                    </div>
                    <div class="card-body">
                        <form action="traitement.php" method="get">
                            <div class="mb-3">
                                <label for="mail" class="form-label">Adresse e-mail</label>
                                <input type="email" class="form-control" name="mail" placeholder="Adresse e-mail" required>
                            </div>
                            <div class="mb-3">
                                <label for="naissance" class="form-label">Date de naissance</label>
                                <input type="date" class="form-control" name="naissance" required>
                            </div>
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom d'utilisateur</label>
                                <input type="text" class="form-control" name="nom" placeholder="Nom d'utilisateur" required>
                            </div>
                            <div class="mb-3">
                                <label for="ville" class="form-label">Ville</label>
                                <input type="text" class="form-control" name="ville" placeholder="Ville" required>
                            </div>
                            <div class="mb-3">
                                <label for="genre" class="form-label">Genre</label>
                                <select name="genre" class="form-select" required>
                                    <option value="H">Homme</option>
                                    <option value="F">Femme</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="motdepasse" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" name="motdepasse" placeholder="Nouveau mot de passe" required>
                            </div>
                            <div class="d-grid">
                                <input type="submit" value="S'inscrire" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <p class="mb-1">Vous avez déjà un compte ?</p>
                        <a href="login.php" class="btn btn-outline-secondary">Se connecter</a>
                    </div>
                </div>
                <p class="text-center mt-3 text-muted">&copy; Copyright 2025</p>
            </div>
        </div>
    </div>
</body>
</html>
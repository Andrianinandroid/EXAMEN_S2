<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/connect.css">
</head>
<body>  

    <div class="tout">

        <div class="corps">
        <form action="verification.php" method="get">
        <div class="entete">
                <h1><i>Mini-Réseaux</i></h1>
                <h5>Connectez-vous pour voir les publications de vos ami(e)s</h5>
                <hr>
            </div>
            <div class="formulaire">
                <p><input type="email" name="mail" placeholder="Adresse e-mail"></p>
                <p><input type="password" name="motdepasse" placeholder="Mot de passe"></p>
            </div>
            <div class="submit">
                <p><input type="submit" value="Se Connecter"></p>
            </div>
        </form>
        </div>
        <div class="connex">
            <div class="question">
                <h5>Vous n'avez pas encore de compte?</h5> 
            </div>
            <div class="bouton">
                <a href="index.php">Créer un compte</a>
            </div>
        </div>
     
        <?php 
            if(isset($_GET['erreur'])) { 
        ?>
            <div class="connex">
                <div class="question">
                    <h5> Ce compte n'existe pas</h5>
                </div>
                <div class="bouton">
                    <a href="index.php">S'inscrire</a>
                </div>
            </div>
        <?php } ?>
        
    </div>
        
</body>
</html>
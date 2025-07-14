<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="../assets/css/connect.css">
</head>
<body>        
    <div class="tout">
        <div class="corps">
        <form action="traitement.php" method="get">
            <div class="entete">
                <h1><i>Mini-Réseaux</i></h1>
                <h5> Inscrivez-vous pour voir les publications de vos ami(e)s</h5>
            </div>
        <hr>
            <div class="formulaire">
                <p><input type="email" name="mail" placeholder="Adresse e-mail"></p>
                <p>Date de naissance: <input type="date" name="naissance"></p>
                <p><input type="text" name="nom" placeholder="Nom d'utilisateur"></p>
                <p><input type="password" name="motdepasse" placeholder="Nouveau mot de passe"></p>
            </div>            
            <div class="submit">
                  <p><input type="submit" value="S'inscrire"></p>
            </div>
        </form>
        </div>
            <div class="connex">
                <div class="question">
                    <h5>Vous avez déjà un compte?</h5> 
                </div>
                <div class="bouton">
                    <a href="login.php">Se connecter</a>
                </div>
            </div>
        <div class="foot">
        
        <div class="copyright">
            <p>&copy; Copyright 2025</p>
        </div>
     </div>
     
     </div>
       
</body>
</html>
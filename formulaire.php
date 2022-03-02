<!DOCTYPE html>
<html>
    <head>
        <title>Inscription</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
        <link rel="stylesheet"  href="bootstrap/css/bootstrap.css"/>
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"> </script>
    </head>
    <body>
        <form action="formulaire.php" method="post">
            <p><label for="email">Adresse email: </label>
            <input type="email" id="email" name="email"></p>

            <p><label for="nom">Nom: </label>
            <input type="text" id="nom" name="nom"></p>
            
            <p><label for="prenom">Prenom: </label>
            <input type="text" id="prenom" name="prenom"></p>

            <p><label for="age">age: </label>
            <input type="number" id="age" name="age" min="0"></p>

            <p><label for="sexe">Sexe: </label>
            <input type="radio" id="sexe" name="sexe" value="m">M
            <input type="radio" id="sexe" name="sexe" value="f">F</p>

            <p><select name="nature" value="">Nature: 
                <option value="patient">patient</option>
                <option value="assistant">assistant</option>
                <option value="medecin">medecin</option>
           </select></p>

           <p class="matricule"><label for="matricule">matricule: </label>
            <input type="number" id="matricule" name="matricule" min="1"></p>

            <p class="matricule"><select name="service" value="">service: 
                <option value="patient">patient</option>
                <option value="assistant">assistant</option>
                <option value="medecin">medecin</option>
           </select></p>
        </form>

        <script>
            $(document).ready(function(){
                $('.matricule').hide();
            });
        </script>
    </body>
</html>
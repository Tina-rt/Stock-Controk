<?php 
require_once 'models/Client.php';
require_once 'models/Quotas.php';

session_start();
if (isset($_POST['submit_inscription'])){
    $new_client = new Client(0, $_POST['nom'], $_POST['prenom'], $_POST['nom_societe'], $_POST['numero'], $_POST['nom_utilisateur'], $_POST['email'], $_POST['adresse'], $_POST['quotasID'], sha1($_POST['password']));
    echo $new_client;
    // Client::saveClient($new_client);
    // Database::newDatabaseClient('essai_21');

    $new_quota = new Quotas(0, 'VIP', 3000);
    $new_quota->createQuota();

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock control</title>
</head>


<body>
    <h1>Stock control</h1>
    <h2>Inscription</h2>
    <form action="" method="post">
        <table>
            <tr>
                <td><label for="nom">Nom</label></td>
                <td><input type="text" name="nom" id="nom"></td>
            </tr>
            <tr>
                <td><label for="prenom">Prenom</label></td>
                <td><input type="text" name="prenom" id="prenom"></td>
            </tr>
            <tr>
                <td><label for="adresse">Adresse</label></td>
                <td><input type="text" name="adresse" id="adresse"></td>
            </tr>
            <tr>
                <td><label for="nom_societe">Nom de votre societe</label></td>
                <td><input type="text" name="nom_societe" id="nom_societe"></td>
            </tr>
            <tr>
                <td><label for="numeor">Numero</label></td>
                <td><input type="tel" name="numero" id="numero"></td>
            </tr>
            <tr>
                <td><label for="nom_utilisateur">Nom d'utilisateur</label></td>
                <td><input type="text" name="nom_utilisateur" id="nom_utilisateur"></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td><input type="email" name="email" id="email"></td>
            </tr>
            <tr>
                <td><label for="password">Mot de passe</label></td>
                <td><input  type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <td><label for="quotasID">Offre</label></td>
                <td><select name="quotasID" id="quotaId">
                    <option value="1">Basic</option>
                    <option value="2">Premium</option>
                    <option value="3">VIP</option>
                </select></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name='submit_inscription' value="S'inscrire"></td>
            </tr>
        </table>

    </form>
</body>

</html>
<?php
require 'models/Client.php';
require 'controller/ClientDashboardController.php';
if (!session_status()== PHP_SESSION_ACTIVE){
    session_start();
}
class Clientcontroller
{
    public function form_()
    {
        if (isset($_POST['submit_inscription'])) {
            $new_client = new Client(0, $_POST['nom'], $_POST['prenom'], $_POST['nom_societe'], $_POST['numero'], $_POST['nom_utilisateur'], $_POST['email'], $_POST['adresse'], $_POST['quotasID'], sha1($_POST['password']));
            echo $new_client;
            Client::saveClient($new_client);

            Database::newDatabaseClient($new_client->getNomSociete() . "_DB");
        }
        include 'views/inscription_client.php';
    }

    public function login_form($message = '')
    {

        include 'views/login_client.php';
    }

    

    public function login_process()
    {
        if (isset($_POST['nom_utilisateur'], $_POST['password'])) {
            $nom_utilisateur = $_POST['nom_utilisateur'];
            $password = $_POST['password'];
            // echo $nom_utilisateur;
            $rslt = Client::getClientByNom_utilisateur($nom_utilisateur);
            // echo $rslt['Nom'];
            $home_controller = new HomeController();
            if ($rslt) {

                if ($rslt['Password'] == sha1($password)) {
                    echo "login success";
                    $_SESSION['nom_utilisateur'] = $nom_utilisateur;
                    header("Location: dashboard");
                } else {
                    $message = "Mot de passe incorrect";
                    header("Location: login?message=$message");
                }
            } else {
                $message= "Nom d'utilisateur introuvable";
                header("Location: login?message=$message");
            }
        }

        // include "views/home.php";
    }
}

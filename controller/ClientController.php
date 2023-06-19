<?php 
require 'models/Client.php';
class Clientcontroller{
    public function form_(){
        include 'views/inscription_client.php';
    }

    public function login_form(){
        include 'views/login_client.php';
    }

    public function login_process(){
        if (isset($_POST['nom_utilisateur'], $_POST['password'])){
            $nom_utilisateur = $_POST['nom_utilisateur'];
            $password = $_POST['password'];

            
        }
        include "views/home.php";
    }
}
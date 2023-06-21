<?php 
session_start();
class ClientDashboardController{
    public function dashboard(){
        if (!isset($_SESSION['nom_utilisateur'])){
            header("Location: login");
        }
        include 'views/client_dashboard.php';
    }
    public function logout(){
        session_unset();
        session_destroy();
        header("Location: login");
    }
}
<?php 
if (!session_status()== PHP_SESSION_ACTIVE){
    session_start();
}
class AdminDashboardController{
    public function dashboard(){
        if (isset($_SESSION['nom_utilisateur'])){

            include "views/admin/admin_dashboard.php";
        }
        else{
            header("Location: login");
        }
    }

    public function logout(){
        session_unset();
        session_destroy();
        header("Location: login");
    }
}
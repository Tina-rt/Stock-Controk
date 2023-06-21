<?php
require_once "models/Admin.php";
if (!session_status()== PHP_SESSION_ACTIVE){
    session_start();
}
class AdminController{
    public function login($message=""){
        
        include "views/admin/admin_login.php";
    }

    public function login_process(){
        $message = "";
        if (isset($_POST['nom_utilisateur'])){
            $rslt = Admin::getAdminByNom_utilisateur($_POST['nom_utilisateur']);
            if ($rslt){
                if ($rslt['password']==sha1($_POST['password'])){
                    $_SESSION['nom_utilisateur'] = $rslt['nom_utilisateur'];
                    header("Location: dashboard");
                }
                else{
                    $message = "Mot de passe incorrect";
                    header("Location: login?message=$message");
                }
            }
            else{
                $message = "Nom d'utilisateur introuvable";
                header("Location: login?message=$message");

            }
        }

    }
}
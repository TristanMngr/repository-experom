<?php
include("controller/debug.php");
include("modele/back-office.php");

// variable pour modifier le header
$isLogin = false;




if ($_GET['target'] == 'connexion-control') {
    include('controller/back-office/connexion.php');
} else if ($_GET['target'] == 'cgu') {
    $isLogin = true;
    include("controller/cgu.php");
} else if ($_GET['target'] == 'mention-legal') {
    $isLogin = true;
    include('vue/mention-legal.php');
}

else if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
        if ($_GET['target'] == 'utilisateurs') {
            $isLogin = true;
            if ($_GET['target2'] == 'list') {
                include('controller/back-office/users/users-list.php');
            } else if ($_GET['target2'] == 'home') {
                include('controller/back-office/users/users-home.php');
            }
            else if ($_GET['target2'] == 'edit-perso') {
                include('controller/back-office/users/users-edit.php');
            }
            else {
                include('vue/back-office/users-BO.php');
            }
        } else if ($_GET['target'] == 'cgu-editer') {
            $isLogin = true;
            include('controller/back-office/cgu.php');
        } else if ($_GET['target'] == 'creation-admin') {
            $isLogin = true;
            include('controller/back-office/admin/creation-admin.php');
        } else {
            include('vue/back-office/connexion-BO.php');
        }
    } else {
        include('vue/error.php');
    }
}

else {
    include('vue/back-office/connexion-BO.php');
}


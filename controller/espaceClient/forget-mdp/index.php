<?php


if ($_GET['target2'] == "mail") {
    include('controller/espaceClient/forget-mdp/forget-mdp.php');
}
else if ($_GET['target2'] == "change-mdp") {
    include('controller/espaceClient/forget-mdp/change-mdp.php');
}
else {
    include('vue/espaceClient/forget-mdp.php');
}
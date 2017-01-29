<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="/vue/style/style.css" />
    <link rel="stylesheet" type="text/css" href="/vue/style/font_general/flaticon.css">
    <script type="text/javascript" src="/controller/espaceClient/maison/ajax/getCapteurs.js"></script>
    <script type="text/javascript" src="/controller/espaceClient/maison/ajax/getDataMode.js"></script>
    <script type="text/javascript" src="/controller/back-office/ajax/users.js"></script>
    <script type="text/javascript" src="/controller/back-office/ajax/home.js"></script>
    <script type="text/javascript" src="/controller/back-office/ajax/edit-perso.js"></script>

    <!--<script type="text/javascript" src="/controller/espaceClient/maison/ajax/generalView.js"></script>-->
    <!--<script type="text/javascript" src="/controller/espaceClient/maison/ajax/getHomeSection.js"></script>-->
    <!--<script type="text/javascript" src="/controller/getTrames.js"></script>-->


    <title>
        <?php echo $titre ?>
    </title>
</head>
<body>
<div id="page">
    <?php echo($header);?>
    <?php echo($section);?>
    <?php echo($footer);?>
</div>
<script type="text/javascript" src="/vue/javaScript/inscription.js"></script>
<script type="text/javascript" src="/vue/javaScript/delete.js"></script>
<script type="text/javascript" src="/vue/javaScript/maison.js"></script>
<script type="text/javascript" src="/vue/javaScript/capteur.js"></script>



</body>
</html>
<?php
ob_start();
?>

<footer>

    <ul id="footer">
        <li><img src="/vue/style/images/logo-footer.png" alt="logoExperom" class="logoExperom"></li>
        <li>CGU</li>
        <li><a href="/mention-legal">Mentions légales</a></li>
        <li><a href="/contact">Contact</a></li>
        <li>Partenaires</li>
    </ul>
</footer>
<?php
$footer = ob_get_clean();
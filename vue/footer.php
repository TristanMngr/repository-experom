<?php
ob_start();
?>

<footer>

    <ul id="footer">
        <li><a href="/admin" id="redirAdmin"><img src="/vue/style/images/logo-footer.png" alt="logoExperom" class="logoExperom"></a></li>
        <li><a href="/cgu">CGU</a></li>
        <li><a href="/mention-legal">Mentions légales</a></li>
        <li><a href="/contact">Contact</a></li>
        <li><a href="/trame">Trame</a></li>
    </ul>
</footer>
<?php
$footer = ob_get_clean();
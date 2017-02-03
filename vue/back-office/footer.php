<?php
ob_start();
/*$isLogin = true;*/
?>

    <footer>

        <ul id="footer">
            <li><a href="/admin" id="redirAdmin"><img src="/vue/style/images/logo-footer.png" alt="logoExperom" class="logoExperom"></a></li>
            <li><a href="/admin/cgu">CGU</a></li>
            <li><a href="/admin/mention-legal">Mentions légales</a></li>
            <li><a href="/admin/contact">Contact</a></li>
        </ul>
    </footer>
<?php
$footer = ob_get_clean();
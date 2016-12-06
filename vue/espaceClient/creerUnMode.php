<?php
include("vue/header.php");
include("vue/footer.php");
ob_start();
$titre = "créer un mode";
?>
<section id="mode">
    <h1>Paramétrer mes modes</h1>
    <div>
        <h2>Mode Present</h2>
        <ul>
            <li>
                <h3>Temperature</h3><label for="presentTemp">Lorsque tu es présent</label><input type="text"
                                                                                                 name="presentTemp"
                                                                                                 id="presentTemp"
                                                                                                 class="inputMode"
                                                                                                 value="24">
                <input type="submit" value="Valider">
            </li>
            <li>
                <h3>Lumiere</h3>
                <label>On</label><input type="radio" value="On" name="modePresentLumiere" checked>
                <label>Off</label><input type="radio" value="Off" name="modePresentLumiere">
            </li>
        </ul>
    </div>
    <div>
        <h2>Mode absent</h2>
        <ul>
            <li>
                <h3>Temperature</h3><label for="absentTemp">Lorsque tu es absent</label><input type="text"
                                                                                               id="absentTemp"
                                                                                               class="inputMode"
                                                                                               value="19">
                <input type="submit" value="Valider">
            </li>
            <li>
                <h3>Lumiere</h3>
                <label>On</label><input type="radio" value="On" name="modeAbsentLumiere">
                <label>Off</label><input type="radio" value="Off" name="modeAbsentLumiere" checked>
            </li>
        </ul>
    </div>

</section>

<?php
$section = ob_get_clean();
include("gabarit.php");
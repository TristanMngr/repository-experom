<?php
function displayArray($message,$tableau) {
    echo '</br>';
    echo $message ."</br>";
    echo "<pre>";
    print_r($tableau);
    echo "</pre>";
}
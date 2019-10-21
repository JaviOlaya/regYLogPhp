<?php 
session_start();
session_unset();
session_destroy();

header('Location: /ejerc_php/regYLogPhp')
?>
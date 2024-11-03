<?php

setcookie('cart', '', time() - 3600, '/');
header("location:cart.php");


?>
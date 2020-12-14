<?php

// Page redirect funciton
function redirect($page){
    header('location: '.URLROOT. '/'.$page);
}
?>

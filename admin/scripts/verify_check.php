<?php
    if(empty($_POST["premium"])) { 
        $premium_check = 1;
    } else {
        $premium_check = 0;
    }
    if(empty($_POST["staff"])) { 
        $staff_check = 1;
    } else {
        $staff_check = 0;
    }
    if(empty($_POST["admin"])) { 
        $admin_check = 1;
    } else {
        $admin_check = 0;
    }
    if(empty($_POST["suspended"])) { 
        $suspended_check = 1;
    } else {
        $suspended_check = 0;
    }
    if(empty($_POST["newsletter"])) { 
        $newsletter_check = 1;
    } else {
        $newsletter_check = 0;
    }

?>
<?php
    session_start();
    
    foreach (glob("./controller/*.php") as $filename)
    {
        require_once( $filename);
    }

    foreach (glob("./model/*.php") as $filename)
    {
        require_once( $filename);
    }

    require_once('./database/Database.php');

    Controller::router();
?>

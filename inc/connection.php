<?php 
    function dbconnect()
    {
        static $connect = null;
    
        if ($connect === null) {
            // ('localhost','ETU004017','GLgIenZT','db_s2_ETU004017')
            // $connect = mysqli_connect('localhost','ETU004017','GLgIenZT','db_s2_ETU004017');
            $connect = mysqli_connect('localhost','root','','base');
    
            if (!$connect) {
                die('Erreur de connexion à la base de données : ' . mysqli_connect_error());
            }
    
            mysqli_set_charset($connect, 'utf8mb4');
        }
        return $connect;
    }
    session_start();
?>
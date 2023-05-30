<?php

if (!function_exists('getConnection')) {
    function getConnection()
    {
      
        $conniction = mysqli_connect("localhost", "root", "", "mohammed abushammala");

        if (!$conniction) {
            die("no interner: " . mysqli_connect_error());
        }
        return $conniction;
    }
}

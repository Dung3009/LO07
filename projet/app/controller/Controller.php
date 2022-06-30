<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
class Controller{
    public static function accueil() {
        include 'config.php';
        
        $vue = $root . '/app/view/page_accueil.php';
        
        if (DEBUG)
            echo ("Controller : page_accueil : vue = $vue");
        require ($vue);
    }
}
?>
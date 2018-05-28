<?php

    include_once('traitement.php');

    /**
     * Retourne la distance en metre ou kilometre (si $unit = 'k') entre deux latitude et longitude fournit
     */
    function distance($lat1, $lng1, $lat2, $lng2, $unit = 'k') {
        $earth_radius = 6378137;   // Terre = sphère de 6378km de rayon

        $rlo1 = deg2rad($lng1);
        $rla1 = deg2rad($lat1);

        $rlo2 = deg2rad($lng2);
        $rla2 = deg2rad($lat2);
        $dlo = ($rlo2 - $rlo1) / 2;
        $dla = ($rla2 - $rla1) / 2;
        $a = (sin($dla) * sin($dla)) + cos($rla1) * cos($rla2) * (sin($dlo) * sin($dlo));
        $d = 2 * atan2(sqrt($a), sqrt(1 - $a));
        //
        $meter = ($earth_radius * $d);
        if ($unit == 'k') {
            return $meter / 1000;
        }
        return $meter;
    }
    
    // affichage tableau complet
    // print_r($result);
    

/*     foreach($result as $ligne){
        // Lecture de chaque tableau de chaque ligne
        foreach($ligne as $cle=>$valeur){
            if ($cle == 0){
                echo '<span style="color: blue;">'. $valeur .'</span>';
                echo ' : ';
            }
            if ($cle == 1) {
                echo $valeur;
                echo ' - ';
            }
            if ($cle == 2) {
                echo $valeur;
                echo '<br>';
            }
        }
    } */
    

    


    echo round(distance(45.130986,5.695081,45.184631,5.737119), 3); //affiche 597.833 (pour 597,833 km entre les deux coordonnées fournit



?>
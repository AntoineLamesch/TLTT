<?php 

class Tools{

    public static function checkDate($date){ //vérifie que la date se situe entre 1900 et 2022


        if($date<1900 | $date>2022){

            return FALSE;
        }
        else{
            return TRUE;
        }




    }
}
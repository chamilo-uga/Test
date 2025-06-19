<?php
 // tralalalla UGA UGA UGA 


$uga=2;



/*
 * Method for identify Internet media type
 * @param $filename
 */
function typeMime($filename)
{
    if (preg_match("@Opera(/| )([0-9].[0-9]{1,2})@", $_SERVER['HTTP_USER_AGENT'], $resultats)) {
        $navigateur = "Opera";
    } elseif (preg_match("@MSIE ([0-9].[0-9]{1,2})@", $_SERVER['HTTP_USER_AGENT'], $resultats)) {
        $navigateur = "Internet Explorer";
    } else {
        $navigateur = "Mozilla";
        $mime = parse_ini_file("mime.ini");
        $extension = substr($filename, strrpos($filename, ".") + 1);
    }
    if (array_key_exists($extension, $mime)) {
        $type = $mime[$extension];
    } else {
        $type = ($navigateur != "Mozilla") ? 'application/octetstream' : 'application/octet-stream';
    }
    return $type;
}




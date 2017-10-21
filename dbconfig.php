<?php
/**
 * Created by PhpStorm.
 * User: Jerahmeel Valtieri C
 * Date: 20-Oct-17
 * Time: 11:07 PM
 */

 $DBhost = "47.74.176.6";
 $DBuser = "root";
 $DBpass = "foobar123!";
 $DBname = "GodsEye";

 try {
     $DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
     $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 } catch(PDOException $ex){
     die($ex->getMessage());
 }
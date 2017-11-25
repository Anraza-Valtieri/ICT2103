<?php
        //JSON return
        header("Content-type: application/json; charset=utf-8");
        //DB Stuff
        $servername = "47.74.176.6";
        $username = "root";
        $password = "foobar123!";
        $con=mysqli_connect($servername,$username,$password,"GodsEye");

        //
        //id:ChIJ-0Fy0A8Z2jERAoBRkQtcT3A,
        //name:Aloha%20Poke,
        //add:8A%20Marina%20Boulevard%2C%20%23B2-46%20Singapore%20018984%20Marina%20Blvd%2C%20Singapore%20018984,
        //rating:5,
        //lat:1.2804,
        //long:103.854,
        //ltype:%20establishment%20food%20point_of_interest%20restaurant
        //10:0,11:0,12:0,13:0,14:0,15:0,16:0,17:0,18:0,19:0,110:0,111:80,112:80,113:60,114:60,115:60,116:40,117:30,118:30,119:30,120:0,121:0,122:0,123:0,
        //20:0,21:0,22:0,23:0,24:0,25:0,26:0,27:0,28:0,29:0,210:0,211:60,212:70,213:80,214:70,215:60,216:50,217:40,218:70,219:60,220:0,221:0,222:0,223:0,
        //30:0,31:0,32:0,33:0,34:0,35:0,36:0,37:0,38:0,39:0,310:0,311:50,312:70,313:70,314:70,315:70,316:50,317:30,318:20,319:10,320:0,321:0,322:0,323:0,
        //40:0,41:0,42:0,43:0,44:0,45:0,46:0,47:0,48:0,49:0,410:0,411:60,412:70,413:70,414:50,415:40,416:40,417:40,418:40,419:30,420:0,421:0,422:0,423:0,
        //50:0,51:0,52:0,53:0,54:0,55:0,56:0,57:0,58:0,59:0,510:0,511:80,512:100,513:100,514:80,515:70,516:50,517:30,518:40,519:70,520:0,521:0,522:0,523:0,
        //60:0,61:0,62:0,63:0,64:0,65:0,66:0,67:0,68:0,69:0,610:0,611:0,612:0,613:0,614:0,615:0,616:0,617:0,618:0,619:0,620:0,621:0,622:0,623:0,
        //70:0,71:0,72:0,73:0,74:0,75:0,76:0,77:0,78:0,79:0,710:0,711:0,712:0,713:0,714:0,715:0,716:0,717:0,718:0,719:0,720:0,721:0,722:0,723:0,:
        //$sql = "UPDATE `user` SET `password`='" . $_POST['pass2'] . "' WHERE `email`='" . $_POST['email'] . "'";
        $sql = "UPDATE `location` SET `name`='".$_POST['name']."', `address`='".$_POST['add']."',
         `rating`='".$_POST['rating']."', `lat`='".$_POST['lat']."', `lng`='".$_POST['lng']."'  WHERE id = '" . $_POST['id'] . "'";
        //$u_query = mysqli_query($con, $sql);
        if (mysqli_query($con,$sql) == TRUE) {
            //exit("Initial Record updated successfully");
        } else {
            exit("Error updating record 1");
        }
        $arrayType = explode(" ",$_POST['ltype']);

        $sql21 = "DELETE FROM `location_has_type` WHERE `id` = '" . $_POST['id'] . "'";
        if (mysqli_query($con,$sql21) == TRUE) {
          foreach ($arrayType as $key) {
            $sql22 = "SELECT `type_name` FROM `location_type` WHERE `type_name`='" . $key . "'";
            if(mysqli_query($con,$sql22) == TRUE){ // EXIST IN LOCATION_TYPE
              $sql23 = "INSERT INTO `location_has_type` VALUES ('" . $key . "','".$_POST['id']."')";
              if (mysqli_query($con,$sql23) == TRUE) { // ADD INTO LOCATION_HAS_TYPE
                  //exit("Part 2 Record updated successfully");
              } else { // FAILED TO ADD INTO LOCATION_HAS_TYPE
                // ERROR?
              }
            } else { // KEY DOES NOT EXIST
              $sql24 = "INSERT INTO `location_type` VALUES ('" .$key. "')";
              if (mysqli_query($con,$sql24) == TRUE) {
                  //exit("Part 2 Record updated successfully");
                  $sql25 = "INSERT INTO `location_has_type` VALUES ('" . $key . "','".$_POST['id']."')";
                  if (mysqli_query($con,$sql25) == TRUE) {
                      //exit("Part 2 Record updated successfully");
                  } else { // FAILED TO ADD INTO LOCATION_HAS_TYPE
                    // ERROR?
                  }
              } else { // FAILED TO ADD INTO LOCATION_TYPE
                // ERROR?
              }
            }
          }
        }
        for($day=1; $day<8; $day++){
          for($hour=0; $hour<24; $hour++){
            $curr= (string)$day . (string)$hour;
            $sql3 = "UPDATE `time_popularity` SET `popularity`='".$_POST[$curr]."' WHERE id = '" . $_POST['id'] . "' AND day = '".$day."' AND hour = '".$hour."';";
            //$u_query = mysqli_query($con, $sql);
            if (mysqli_query($con,$sql3) == TRUE) {
                //exit("All Record updated successfully");
            } else {
                exit("Error updating record 3");
            }
          }
        }
        $con->close();
        exit("All Record updated successfully");


?>

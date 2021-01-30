<?php
session_start();
class Bank{
    function Regis($id,$name,$pass,$balance){
      if (isset($_SESSION['id'])) {
        foreach ($_SESSION['id'] as $key => $value) {
          if ($value==$id) {
            $checkid = true;
            echo "ID ซ้ำนะจ้ะ";
          }
        }
    }
        if(@$checkid==false){
            $_SESSION["id"][]=$id;
            $_SESSION['name'][]=$name;
            $_SESSION["pass"][]=$pass;
            $_SESSION["balance"][]=$balance;
        }
    }
    function Deposit($id,$amount){
      if (isset($_SESSION['id'])) {
        foreach ($_SESSION['id'] as $key => $value) {
          if ($value==$id) {
            $checkid = true;
            $_SESSION['balance'][$key]+=$amount;
          }
        }
         if(!isset($checkid)){
          echo "ไม่มีรหัส";
        }
            }
          }



    function Withdraw($id,$pass,$amount){
      if (isset($_SESSION['id'])) {
        foreach ($_SESSION['id'] as $key => $value) {
            if ($value==$id&&$_SESSION['pass'][$key]==$pass){
              $checkid = true;
              if ($_SESSION['balance'][$key]<$amount) {
                echo "เงินไม่พอ";
              }else
                $_SESSION['balance'][$key]-=$amount;
          }
        }
        if(!isset($checkid)){
         echo "ID หรือ รหัสผ่าน ไม่ถูกต้อง";
       }
      }else{
        echo "ไม่มีรหัสจ่ะ";
      }
    }
    function Report($id,$pass){
      if (isset($_SESSION['id'])) {
        foreach ($_SESSION['id'] as $key => $value) {
            if ($value==$id&&$_SESSION['pass'][$key]==$pass){
              $checkid = true;
              echo "<table border='1'>";
              echo "<tr>";
              echo "<td>id</td><td>name</td><td>balance</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>";
              echo $_SESSION['id'][$key];
              echo "</td>";
              echo "<td>";
              echo $_SESSION['name'][$key];
              echo "</td>";
              echo "<td>";
              echo $_SESSION['balance'][$key];
              echo "</td>";
              echo "</tr>";
              echo "</table>";
          }
        }
        if(!isset($checkid)){
         echo "ID หรือ รหัสผ่าน ไม่ถูกต้อง";
       }
      }else{
        echo "ไม่มีรหัสจ่ะ";
      }
    }
    function Transfer(){

    }
}
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
 </head>
 <body><center>
    <?php
    $probank = new Bank();
    if ($_POST['menu']=="register") {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $pass = $_POST['pass'];
        $balance = $_POST['balance'];
        $probank->Regis($id,$name,$pass,$balance);
    }else if($_POST['menu']=="deposit"){
        $id = $_POST['id'];
        $amount = $_POST['amount'];
        $probank->Deposit($id,$amount);
    }else if($_POST['menu']=="withdraw"){
        $id = $_POST['id'];
        $pass = $_POST['pass'];
        $amount = $_POST['amount'];
        $probank->Withdraw($id,$pass,$amount);
    }else if ($_POST['menu']=="report") {
        $id = $_POST['id'];
        $pass = $_POST['pass'];
        echo $probank->Report($id,$pass);
    }
     ?>
    <a href="index.php"><input type="button" value="back"></a>
 </body>
 </html>

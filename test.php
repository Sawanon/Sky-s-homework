<?php
session_start();
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
}
class Bank{
    function Regis($id,$name,$pass,$balance){
        foreach ($_SESSION['id'] as $key => $value) {
           if ($value==$id) {
               $checkid = true;
               echo "ID ซ้ำนะจ้ะ";
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
        foreach ($_SESSION['id'] as $key => $value) {
            if ($value==$id){
                $_SESSION['balance'][$key]+=$amount;
            }
        }
    }
}
// $id = $_SESSION['id'];
print_r($_SESSION['id']);
// $_SESSION["bankaccount"]['id']=$_POST["ID"];
// $_SESSION["bankaccount"]['PASS']=$_POST["PASS"];
// $_SESSION["bankaccount"]['Balance']=$_POST["Balance"];

// $test = new Bank();
// echo $test->Regis('11','22','name1','100');

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
 </head>
 <body>
    <a href="index.php"><input type="button" value="back"></a>
 </body>
 </html>
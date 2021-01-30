<!DOCTYPE html>
<?php 
session_start();
// session_destroy();
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  <a href="destroy.php"> <input type="button" value="Destroy"> </a>
  <?php
    print_r($_SESSION['id']);
  ?>
  <table border='1'>
    <tr>
      <td>id</td><td>name</td><td>pass</td><td>balance</td>
    </tr>
    <?php
      foreach ($_SESSION['id'] as $key => $value) {
        ?>
    <tr>
      <td><?php echo $value; ?></td> 
      <td><?php echo $_SESSION['name'][$key]; ?></td> 
      <td><?php echo $_SESSION['pass'][$key]; ?></td> 
      <td><?php echo $_SESSION['balance'][$key]; ?></td>
    </tr>
    <?php
      }
    ?>
  </table>
    <div style="border-style: solid;">
      <h2>เปิดบัญชี</h2>
      <form action="test.php" method="post">
        <table>
          <tr>
            <td>Name :</td><td> <input type="text" name="name" value=""> </td>
          </tr>
          <tr>
            <td>ID :</td><td> <input type="text" name="id" value=""> </td>
          </tr>
          <tr>
            <td>PASS :</td><td> <input type="password" name="pass" value=""> </td>
          </tr>
          <tr>
            <td>Balance :</td><td> <input type="number" name="balance" value=""min="1"max="100"> </td>
          </tr>
          <tr>
            <td> <input type="submit" name="" value="เปิดบัญชี"> </td>
            <td> <input type="reset" name="" value="รีเซ็ต"> </td>
          </tr>
        </table>
        <input type="hidden" name="menu" value="register">
      </form>
    </div>
    <div style="border-style: solid;">
    <h2>ฝากเงินจ้า</h2>
      <form action="test.php" method="post">
        <table>
          <tr>
            <td>ID :</td>
            <td><input type="text" name="id"></td>
          </tr>
          <tr>
            <td>จำนวนเงินที่จะฝาก :</td>
            <td><input type="text" name="amount"></td>
          </tr>
        </table>
        <input type="submit" value="ฝาก">
        <input type="reset" value="รีเซ็ต">
        <input type="hidden" name="menu" value="deposit">
      </form>
    </div>
  </body>
</html>
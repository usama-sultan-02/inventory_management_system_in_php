<?php
include('conn.php');




//Purchase Ledger
if(isset($_POST["purchase_ledger"])){

  $id=$_POST["purchase_ledger"];

  $sql=mysqli_query($conn, "SELECT * FROM `customer_ledger_purchase` WHERE `customer_id`='$id'");
  while ($row=mysqli_fetch_array($sql)){
    $customer_name="";
    $c_id=$row['id'];
    $qury = "SELECT * FROM `customer` WHERE `customer_id`='$c_id'";
      $sql2=mysqli_query($conn, $qury);
      while ($rows=mysqli_fetch_array($sql2)){
        $customer_name=$rows["customer_name"];
        }
    ?>

    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['customer_id']; ?></td>
        <td><?php echo $customer_name; ?></td>
        <td><?php echo $row['paid']; ?></td>
        <td><?php echo $row['payable']; ?></td>
        <td><?php echo $row['balance']; ?></td>
    </tr>

  <?php
  }
}



?>
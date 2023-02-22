<?php
include('conn.php');

if(isset($_POST["item_delete"]))
{
 $query = "DELETE FROM items WHERE id = '".$_POST["item_delete"]."'";
 if(mysqli_query($conn, $query))
 {
  echo 'Deleted Successfuly';
 }
}


///////////////////----------SALE ITEM DELETE
if(isset($_POST["sale_item_delete"]))
{
 $query = "DELETE FROM sale_item WHERE id = '".$_POST["sale_item_delete"]."'";
 if(mysqli_query($conn, $query))
 {
  echo 'Deleted Successfuly';
 }
}



if(isset($_POST["customer_delete"]))
{
 $query = "DELETE FROM customer WHERE id = '".$_POST["customer_delete"]."'";
 if(mysqli_query($conn, $query))
 {
  echo 'Deleted Successfuly';
 }
}


if(isset($_POST["payment_delete"]))
{
 $query = "DELETE FROM main WHERE id = '".$_POST["payment_delete"]."'";
 if(mysqli_query($conn, $query))
 {
  echo 'Deleted Successfuly';
 }
}

if(isset($_POST["sale_ledger_delete"]))
{
 $query = "DELETE FROM customer_ledger WHERE id = '".$_POST["sale_ledger_delete"]."'";
 if(mysqli_query($conn, $query))
 {
  echo 'Deleted Successfuly';
 }
}


if(isset($_POST["purchase_ledger_delete"]))
{
 $query = "DELETE FROM customer_ledger_purchase WHERE id = '".$_POST["purchase_ledger_delete"]."'";
 if(mysqli_query($conn, $query))
 {
  echo 'Deleted Successfuly';
 }
}


?>
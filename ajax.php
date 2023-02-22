<?php
include('conn.php');

$item_name_from_items="";
$item_image_from_items="";
$data="";


if(isset($_POST["item_id"]))
{
	$item_id=$_POST['item_id'];
  $qty=$_POST['qty'];
  $unit_price=$_POST['unit_price'];
  $total_price=$_POST['total_price'];
  $sale_code=$_POST['sale_code'];
  $item_name_from_items="";
  $item_image_from_items="";


  $query = "INSERT INTO `sale_item` (`id`, `item_id`, `sale_id`, `qty`, `unit_price`, `total_price`) VALUES (NULL, '$item_id', '$sale_code', '$qty', '$unit_price', '$total_price');";
  $sql=mysqli_query($conn, $query);
  


	$data="";
 //$query = "SELECT * FROM `sale_item` WHERE `sale_id`='$sale_code'";
 // $query = "SELECT `sale_item`.`id`, 
 //               `sale_item`.`item_id`, 
 //               `sale_item`.`sale_id`, 
 //               `sale_item`.`qty`, 
 //               `sale_item`.`unit_price`, 
 //               `sale_item`.`total_price`, 
 //               `items`.`item_code`, 
 //               `items`.`item_name`, 
 //               `items`.`item_image` 
 //               FROM `sale_item` 
 //               INNER JOIN  `items` 
 //               ON `sale_item`.'$item_id'='$item_id'
 //               AND `sale_item`.`sale_id`='$sale_code'";



 $query = "SELECT * FROM `sale_item` WHERE `sale_id`='$sale_code'";

 if($sql=mysqli_query($conn, $query))
 {
  while ($row=mysqli_fetch_array($sql)){

      $i_id=$row["item_id"];
      $qury = "SELECT * FROM `items` WHERE `item_code`='$i_id'";
      $sqll=mysqli_query($conn, $qury);
       while ($rows=mysqli_fetch_array($sqll)){
          $item_name_from_items=$rows["item_name"];
          $item_image_from_items=$rows["item_image"];
        }

  	$data.='<tr>
  		<td>'.$row["sale_id"].'</td>
      <td>'.$row["item_id"].'</td>
      <td>'.$item_name_from_items.'</td>
  		<td>'.$row["qty"].'</td>
  		<td>'.$row["unit_price"].'</td>
      <td>'.$row["total_price"].'</td>
      
      <td><img src="upload/'.$item_image_from_items.'" width="40px" height="40px"></td>
  		<td><a href="#" name="delete" id='.$row['id'].' class="btn btn-danger btn-sm btn-icon icon-left sale_item_delete">
              <i class="entypo-cancel"></i>
              Delete
            </a></td>
  	</tr>';
  	//<td>'.$item_image_from_items.'</td>
  }
  echo $data;
 }else{
 	echo "failed";
 }
}




//////////////////---------------Fetch sale item on sale edit
if(isset($_POST["fetch_sale_items"]))
{
    $sale_id=$_POST['fetch_sale_items'];


  $query = "SELECT * FROM `sale_item` WHERE `sale_id`='$sale_id'";

    if($sql=mysqli_query($conn, $query))
    {
      while ($row=mysqli_fetch_array($sql)){

          $i_id=$row["item_id"];

          $qury = "SELECT * FROM `items` WHERE `item_code`='$i_id'";
          $sqll=mysqli_query($conn, $qury);
          while ($rows=mysqli_fetch_array($sqll)){
              $item_name_from_items=$rows["item_name"];
              $item_image_from_items=$rows["item_image"];
            }

        $data.='<tr>
                <td>'.$row["sale_id"].'</td>
                <td>'.$row["item_id"].'</td>
                <td>'.$item_name_from_items.'</td>
                <td>'.$row["qty"].'</td>
                <td>'.$row["unit_price"].'</td>
                <td>'.$row["total_price"].'</td>
                
                <td><img src="upload/'.$item_image_from_items.'" width="40px" height="40px"></td>
                <td>
                <button type="button" id="test">test</button>
                  <a href="#" name="edit" id="s_ed" class="btn btn-default btn-sm btn-icon icon-left sale_item_edit">
                    <i class="entypo-pencil"></i>
                    Edit
                  </a>
                  <a href="#" name="delete" id='.$row['id'].' class="btn btn-danger btn-sm btn-icon icon-left sale_item_delete">
                    <i class="entypo-cancel"></i>
                    Delete
                  </a>
                </td>
              </tr>';
        //<td>'.$item_image_from_items.'</td>
      }
      echo $data;
    }else{
      echo "failed";
    }
}








//////////////////---------------load sale item on sale item edit
if(isset($_POST["sale_item_edit"]))
{
    $sale_id=$_POST['sale_id_on_sale_item_edit'];
    $item_id=$_POST['sale_item_edit'];


  $query = "SELECT * FROM `sale_item` WHERE `sale_id`='$sale_id' AND `item_id`='$item_id'";

    if($sql=mysqli_query($conn, $query))
    {
      while ($row=mysqli_fetch_array($sql)){

          //$item_id=$row["item_id"];
          $qty=$row["qty"];
          $unit_price=$row["unit_price"];
          $total_price=$row["total_price"];
          //$i_id=$row["item_id"];

          $qury = "SELECT * FROM `items` WHERE `item_code`='$item_id'";
          $sqll=mysqli_query($conn, $qury);
          while ($rows=mysqli_fetch_array($sqll)){
              $item_name_from_items=$rows["item_name"];
            }

            
      }

      $data = array(
        'item_id' => $item_id,
        'item_name' => $item_name_from_items,
        'qty' => $qty,
        'unit_price' => $unit_price,
        'total_price' => $total_price,
    );
    echo json_encode($data);


      //echo $data;
    }else{
      echo "failed";
    }
}









if(isset($_POST["rowclickid"])){
  $id=$_POST["rowclickid"];
  $sql=mysqli_query($conn,"SELECT * FROM `sale_item` WHERE `sale_id`='$id'");
  while($row=mysqli_fetch_array($sql)){
    $item_name_from_items="";
    $item_image_from_items="";

      $i_id=$row["item_id"];
      $qury = "SELECT * FROM `items` WHERE `item_code`='$i_id'";
      $sqll=mysqli_query($conn, $qury);
       while ($rows=mysqli_fetch_array($sqll)){
          $item_name_from_items=$rows["item_name"];
          $item_image_from_items=$rows["item_image"];
        }
    ?>

    <tr>
      <td><?php echo $row['item_id']; ?></td>
      <td><?php echo $item_name_from_items; ?></td>
      <td><?php echo $row['qty']; ?></td>
      <td><?php echo $row['unit_price']; ?></td>
      <td><?php echo $row['total_price']; ?></td>
      <!-- <td><?php //echo $item_image_from_items; ?></td> -->
      <td><img src="upload/<?php echo $item_image_from_items; ?>" width="40px" height="40px"></td>
    </tr>

<?php  }
}


 




if(isset($_POST["invoice"])){
  $id=$_POST["invoice"];
  //$total_price=0;

  $sql=mysqli_query($conn,"SELECT * FROM `sale_item` WHERE `sale_id`='$id'");
  while($row=mysqli_fetch_array($sql)){
      

      $i_id=$row["item_id"];
      $qury = "SELECT * FROM `items` WHERE `item_code`='$i_id'";
      $sqll=mysqli_query($conn, $qury);
       while ($rows=mysqli_fetch_array($sqll)){
          $item_name_from_items=$rows["item_name"];
          $item_image_from_items=$rows["item_image"];
        } 

        ?>
  <tr>
      <td><?php echo $row['item_id']; ?></td>
      <td><?php echo $item_name_from_items; ?></td>
      <td><?php echo $row['qty']; ?></td>
      <td><?php echo $row['unit_price']; ?></td>
      <td><?php echo $sub_total=$row['total_price']; ?></td>
      <?php //$total_price+=$sub_total; ?>
      <td><img src="upload/<?php echo $item_image_from_items; ?>" width="40px" height="40px"></td>
    </tr> <?php

      // $d = "<tr>
      //     <td>".$i_id."</td>
      //     <td>".$item_name_from_items."</td>
      //     <td>".$row['qty']."</td>
      //     <td>".$row['unit_price']."</td>
      //     <td>".$sub_total=$row['total_price']."</td>
      //   </tr>";

        //$total_price+=intval($sub_total); 
     

 }

 //echo $d;

  // $data = array(
  //     'table' => $d,
  //     'inv_total_price' => $total_price,
  // );
  // echo json_encode($data);

}




if(isset($_POST["get_total_amount"])){
  $id=$_POST["get_total_amount"];
  $total_price=0;

  $sql=mysqli_query($conn,"SELECT * FROM `sale_item` WHERE `sale_id`='$id'");
  while($row=mysqli_fetch_array($sql)){
        $row['item_id'];
        $row['qty']; 
        $row['unit_price'];
        $sub_total=$row['total_price'];
        
        $total_price+=intval($sub_total); 

 }

 echo $total_price;

}


if(isset($_POST["item_id_check_stock"])){
  $item_id_check_stock=$_POST["item_id_check_stock"];
  $stock_item_qty=0;
  //$total_price=0;

  $sql=mysqli_query($conn,"SELECT * FROM `stock` WHERE `item_code`='$item_id_check_stock'");
  while($row=mysqli_fetch_array($sql)){
        $stock_item_qty=$row['qty']; 
        
        //$total_price+=intval($sub_total); 

 }

 echo $stock_item_qty;

}







if(isset($_POST["sale_to_customer"])){
  $id=$_POST["sale_to_customer"];
  $sql=mysqli_query($conn,"SELECT * FROM `customer` WHERE `customer_id`='$id'");
  while($row=mysqli_fetch_array($sql)){

      echo $c_name_address=$row["customer_name"]."<br>".$row["address"]."<br>".$row['phone'];
      
   }
}


if(isset($_POST["get_whatsapp_number"])){
  $id=$_POST["get_whatsapp_number"];
  $sql=mysqli_query($conn,"SELECT * FROM `customer` WHERE `customer_id`='$id'");
  while($row=mysqli_fetch_array($sql)){

      echo $row['phone'];
      
   }
}





//Sale Report From Date
if(isset($_POST["date_from"])){

  $date_from=$_POST["date_from"];
  //$date_from=strtodate($_POST["date_from"]);
  $date_to=$_POST["date_to"];
  $customer_name="";
  $s_id="";
  $item_name="";
  $id="";
  $i_id="";
  $item_qty="";
  $item_unit_price="";
  $item_total_price="";

  $sql=mysqli_query($conn,"SELECT * FROM sale WHERE `date` BETWEEN '$date_from' AND '$date_to'");
  while($row=mysqli_fetch_array($sql)){
      $id=$row['sale_to'];

      $sql2=mysqli_query($conn,"SELECT * FROM `customer` WHERE `customer_id`='$id'");
      while($row2=mysqli_fetch_array($sql2)){
          $customer_name=$row2["customer_name"];
       }
    ?>
    <tr>
        <td><?php echo $s_id=$row['sale_id']; ?></td>
        <td><?php echo $row['date']; ?></td>
        <td><?php echo $row['sale_to']; ?></td>
        <td><?php echo $customer_name; ?></td>
        <td><?php 

            $sql3=mysqli_query($conn,"SELECT * FROM `sale_item` WHERE `sale_id`='$s_id'");
            while($row3=mysqli_fetch_array($sql3)){
                $i_id=$row3['item_id'];

                $sql4=mysqli_query($conn,"SELECT * FROM `items` WHERE `item_code`='$i_id'");
                while($row4=mysqli_fetch_array($sql4)){
                    $item_name=$row4["item_name"];
                 }
              echo "<strong>Item Name:</strong> ".$item_name;
              echo "<br>";
              echo "<strong>Item Qty:</strong> ".$row3['qty'];
              echo "<br>";
              echo "<strong>Unit Price:</strong> ".$row3['unit_price'];
              echo "<br>";
              echo "<strong>Total Price:</strong> ".$row3['total_price'];
              echo "<hr>";
                
              
                
             }


         ?></td>
         
      </tr> 
    <?php
      
   }
}



//Purchase Report
if(isset($_POST["purchase_date_from"])){

  $date_from=$_POST["purchase_date_from"];
  $date_to=$_POST["purchase_date_to"];

  $item_name="";

  $sql=mysqli_query($conn,"SELECT * FROM `purchase` WHERE `date` BETWEEN '$date_from' AND '$date_to'");
  while($row=mysqli_fetch_array($sql)){
      $item_code=$row['item'];

      $sql2=mysqli_query($conn,"SELECT * FROM `items` WHERE `item_code`='$item_code'");
      while($row2=mysqli_fetch_array($sql2)){
          $item_name=$row2["item_name"];
       }
    ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $item_name; ?></td>
        <td><?php echo $row['date']; ?></td>
        <td><?php echo $row['quantity']; ?></td>
        <td><?php echo $row['unit_price']; ?></td>
        <td><?php echo $row['total_price']; ?></td>
        <td><?php echo $row['purchase_from']; ?></td>
      </tr> 
    <?php
      
   }
}




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






//Sale Ledger 
if(isset($_POST["sale_ledger"])){
  $id=$_POST["sale_ledger"];
  $t=0;
  $debit=0;
  $credit=0;
  $balance=0;

  $sql=mysqli_query($conn, "SELECT * FROM `customer_ledger` WHERE `customer_id`='$id'");
    while ($row=mysqli_fetch_array($sql)){
      $customer_name2="";
      $c_id=$row['id'];
        $qury = "SELECT * FROM `customer` WHERE `customer_id`='$id'";
        $sql2=mysqli_query($conn, $qury);
        while ($rows=mysqli_fetch_array($sql2)){
          $customer_name2=$rows["customer_name"];
        }
    ?>

    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['customer_id']; ?></td>
      <td><?php echo $customer_name2; ?></td>
      <td><?php echo $debit=$row['debit']; ?></td>
      <td><?php echo $credit=$row['credit']; ?></td>

        <!-- <?php //$balance=($balance-$credit)+$debit;   ?>
      <td><?php //echo $t=$balance; ?></td> -->

      
      <td><?php echo $t=$row['sale_balance']; ?></td>
      <td>
          <a href="#" name="delete" id="<?php echo $row['id']; ?>" class="btn btn-danger btn-sm btn-icon icon-left sale_delete">
          <i class="entypo-cancel"></i>
              Delete
            </a>
                    </td>

    </tr>
    
  <?php $tt+=$t;
  }
  ?>
  <!-- <tfoot>
			    <tr>
			      <td></td>
			      <td></td>
			      <td><h4><?php echo $tt; ?></h4></td>
			      <td></td>
			      <td></td>
			      <td></td>
			    </tr>
			  </tfoot> -->
  <?php
}




if(isset($_POST["sale_ledger_cal"])){
  $id=$_POST["sale_ledger_cal"];
  $t=0;
  $tt=0;
  $debit=0;
  $credit=0;
  $balance=0;

  $sql=mysqli_query($conn, "SELECT * FROM `customer_ledger` WHERE `customer_id`='$id'");
    while ($row=mysqli_fetch_array($sql)){
      $customer_name2="";
      $c_id=$row['id'];
        
      $row['id'];
      $debit=$row['debit'];
      $credit=$row['credit'];
      $balance=($balance-$credit)+$debit;
      $t=$balance;

      //$t=$row['sale_balance'];

     //$tt+=$t;
  }
  echo $t;
}




/////////////////-------------ADD DEBIT CREDIT
if(isset($_POST["add_debit_credit"])){
  
  $debit=$_POST["add_debit_credit"];
  $credit=$_POST["credit"];
  $sale_balance=$_POST["sale_balance"];
  $c_id=$_POST["c_id"];
  $empty=0;

  $query=mysqli_query($conn,"INSERT INTO `customer_ledger` (`id`, `customer_id`, `debit`, `credit`, `sale_balance`) VALUES (NULL, '$c_id', '$debit', '$credit', '$sale_balance')");
  
  
  $customer_name="";
  $sql=mysqli_query($conn, "SELECT * FROM `customer_ledger` WHERE `customer_id`='$c_id'");
    while ($row=mysqli_fetch_array($sql)){
      $customer_name="";
      $cc_id=$row['id'];
        $qury = "SELECT * FROM `customer` WHERE `customer_id`='$cc_id'";
        $sql2=mysqli_query($conn, $qury);
        while ($rows=mysqli_fetch_array($sql2)){
          $customer_name=$rows["customer_name"];
        }
    ?>

    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['customer_id']; ?></td>
      <td><?php echo $customer_name; ?></td>
      <td><?php echo $debit=$row['debit']; ?></td>
      <td><?php echo $debit=$row['credit']; ?></td>

      <!-- <?php //$balance=($balance-$credit)+$debit;   ?>
      <td><?php //echo $t=$balance; ?></td> -->

      <td><?php echo $row['sale_balance']; ?></td>
    </tr>
  <?php
  }

  
}






/////////////-----------ADD PAID PAYABLE
if(isset($_POST["add_paid_payable"])){
  
  $paid=$_POST["add_paid_payable"];
  $payable=$_POST["payable"];
  $balance=$_POST["balance"];
  $c_id=$_POST["c_id"];
  $empty=0;

  $query=mysqli_query($conn,"INSERT INTO `customer_ledger_purchase` (`id`, `customer_id`, `paid`, `payable`, `balance`) VALUES (NULL, '$c_id', '$paid', '$payable', '$balance')");
  
  
  $customer_name="";
  $sql=mysqli_query($conn, "SELECT * FROM `customer_ledger` WHERE `customer_id`='$c_id'");
    while ($row=mysqli_fetch_array($sql)){
      $customer_name="";
      $cc_id=$row['id'];
        $qury = "SELECT * FROM `customer` WHERE `customer_id`='$cc_id'";
        $sql2=mysqli_query($conn, $qury);
        while ($rows=mysqli_fetch_array($sql2)){
          $customer_name=$rows["customer_name"];
        }
    ?>

    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['customer_id']; ?></td>
      <td><?php echo $customer_name; ?></td>
      <td><?php echo $row['debit']; ?></td>
      <td><?php echo $row['credit']; ?></td>
      <td><?php echo $row['sale_balance']; ?></td>
    </tr>
  <?php
  }

  
}




/////////////////////-----------SALE CHECKOUT
if(isset($_POST["sale_checkout"])){
  
  $sale_code=$_POST['sale_checkout'];
	$date=$_POST['date'];
	$sale_to=$_POST['sale_to'];
	$sale_description=$_POST['sale_description'];

	//$sql="INSERT INTO `sale` (`id`, `item`, `date`, `quantity`, `unit_price`, `total_price`, `sale_to`, `description`) VALUES (NULL, '$item_code', '$date', '$quantity', '$unit_price', '$total_price', '$sale_to', '$sale_description')";

	$sql="INSERT INTO `sale` (`id`, `sale_id`, `date`, `sale_to`, `description`) VALUES (NULL, '$sale_code', '$date', '$sale_to', '$sale_description')";
	$query=mysqli_query($conn, $sql);

	if (!$query){
		echo "<script> alert('Failed to Connect'); </script>";
	}else{

		$sql2=mysqli_query($conn,"SELECT * FROM `sale_item` WHERE `sale_id`='$sale_code'");
		while($row2=mysqli_fetch_array($sql2)){
				
				$sale_item_id=$row2['item_id'];
				$sale_item_qty=$row2['qty'];
				//echo "<script> alert('Item Exist'+$sale_item_id); </script>";		


				$sql=mysqli_query($conn, "SELECT * FROM `stock` WHERE `item_code`='$sale_item_id'");
				$check=mysqli_num_rows($sql);
				while ($row=mysqli_fetch_array($sql)){
					$qty=$row['qty'];
				}
				if($check==1){
					//echo "<script> alert('Item Exist'); </script>";
					$update_qty=$qty-$sale_item_qty;//deducting from stock
					$stock_update="UPDATE `stock` SET `qty`='$update_qty' WHERE `item_code`='$sale_item_id'";
					$stock_update_query=mysqli_query($conn, $stock_update);
				}else{
					echo "<script> alert('Item Does Not Exist In Stock'); </script>";
					// $stock="INSERT INTO `stock` (`id`, `item_code`, `qty`) VALUES (NULL, '$item_code', '$quantity');";
					// $stock_query=mysqli_query($conn, $stock);
				}

				
		}

		//echo "<script> alert('Data Inserted Successfully'); </script>";
		//echo "<script> //window.location.replace('item_detail.php'); </script>";
		echo "Success";
			
	}

  
}



?>
<?php include 'actorheader.php';


$cid=$_SESSION['customer_id'];


if(isset($_GET['remove_item'])){
    extract($_GET);
     $qu="UPDATE `booking` SET `total`=`total`-'$amount' WHERE `booking_id`='$bmid'";
    update($qu);
     $qd="DELETE FROM `bookingchild` WHERE `seating_id`='$remove_item' AND `booking-id`='$bmid'";
    delete($qd);

     $g="select * from  booking where booking_id='$bmid' and total='0'";
    $hg=select($g);
    if(sizeof($hg)>0)
    {
       $j="delete from booking where booking_id='$bmid'";
        delete($j);
        
    }


    alert("Successfully Removed");
   return redirect('user_cart.php');

}


$q="select * from booking where status='pending'";
$res=select($q);
if (sizeof($res)>0) {
  

?>


<center>
  <h1 class="display-3 text-black mb-4 pb-3 animated slideInDown">View Bookings</h1>
  <table class="table" style="width: 500px">
    <tr>

  
                <th>screen</th>
                <th>time</th>
             
                <th>moive</th>
                <th>amount</th>
                <th>date</th>
                <th>status</th>
      
    </tr>
    <?php 


            $q="SELECT *,concat(booking.status) as bsatus FROM `bookingchild` INNER JOIN `booking` USING (booking_id) INNER JOIN `allocate`  USING (`allocate_id`) INNER JOIN `seattype`  USING (`seating_id`) INNER JOIN screen ON screen.screen_id=`allocate`.screen_id INNER JOIN `time`  ON time.time_id=`allocate`.`time_id`  WHERE `customer_id`='$cid' AND booking.`status`='Pending'  group by booking_id";
            $res=SELECT($q);
            foreach ($res as $row) {
              ?>
              
            <tr>
            
                <td><?php echo $row['screenname']?></td>
                <td><?php echo $row['time_name']?><?php echo $row['time'] ?></td>
                <td><?php echo $row['total']?></td>
                <td><?php echo $row['date'] ?></td>
                <td><?php echo $row['bsatus'] ?></td>
              
               <td><a class=" btn btn-danger" type="button" href="?remove_item=<?php echo $row['seating_id']; ?>&bmid=<?php echo $row['booking_id']; ?>&amount=<?php echo $row['total']; ?>"/>cancel Now</td>
              
            
</tr>


               


                   



<?php  
}
}else{?>

<h1 align="center">No Bookings</h1>


<?php }
     ?>
 

      <?php 
    if (sizeof($res)>0) {?>
     <td align="center" colspan="9"><a class=" btn btn-success"  href="user_makepayment3.php?amt=<?php echo $row['total'] ?>&omid=<?php echo $row['booking_id'] ?>&qty=<?php echo $row['no_of_seat'] ?>&amt=<?php echo $row['total'] ?>&bid=<?php echo $row['seating_id'] ?>">Book Now</a>Total:<?php echo $row['total'] ?></td>
   <?php   }




 ?>


      </table>
</center>

            
        
 

<?php include 'footer.php' ?>
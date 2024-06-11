<?php include'theaterheader.php';
 $theater_id=$_SESSION['theater_id'];
extract($_GET);

?>

<div style="width: 100%;height: 200px;background: url('images/netflixbg.jpg');" >

</div>
<style>
    /* table tr{
        display: flex;
        justify-content: space-between;
        align-items: center;
    } */
    td{
        padding-bottom: -20px !important;
    }
</style>
<center>
    <h1 class="g-head">View Bookings</h1> 
          <table class="table" style="box-shadow: 0px 0px 16px 1px hsl(264,44%,32%);width: 97%;margin-top: 20px;" >
            <tr align="">
                

                
                <th>customer</th>
                <th>screen</th>
                <th>time</th>
             
                <th>moive</th>
                <th>amount</th>
                <th>date</th>
                <th>status</th>
            </tr>
            <?php 
            $q="SELECT *,concat(booking.status) as bsatus FROM `bookingchild` INNER JOIN `booking` USING (booking_id) INNER JOIN `allocate`  USING (`allocate_id`) INNER JOIN `seattype`  USING (`seating_id`) INNER JOIN screen ON screen.screen_id=`allocate`.screen_id INNER JOIN `time`  ON time.time_id=`allocate`.`time_id`  inner join customer using (customer_id) ";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <tr align="">
                
                <td><?php echo $row['fname']?></td>
                <td><?php echo $row['screenname']?></td>
                <td><?php echo $row['time_name']?><?php echo $row['time'] ?></td>
                <td><?php echo $row['total']?></td>
                <td><?php echo $row['date'] ?></td>
                <th><?php echo $row['bsatus'] ?></th>
                <td><a class="btn btn-warning" href="teater_customerdetails.php?cid=<?php echo $row['customer_id']  ?>">View Customer</a></td>


                  <td><a class="btn btn-warning" href="teater_viewpayment.php?bid=<?php echo $row['booking_id']  ?>">View Payment</a></td>
                
            </tr>
            <?php }?>
          </table>
          <?php include 'footer.php'?>
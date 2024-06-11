<?php include'actorheader.php';
 $cid=$_SESSION['customer_id'];
extract($_GET);



if (isset($_GET['cid'])) {
    extract($_GET);

    $q="update booking set status='cenceled' where booking_id='$cid'";
    update($q);
    alert("cancel your bookings");
    return redirect('user_viewmybookings.php');
}

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
                

                
                
                <th>screen</th>
                <th>time</th>
             
                <th>moive</th>
                <th>amount</th>
                <th>date</th>
                <th>status</th>
            </tr>
            <?php 
            $q="SELECT *,concat(booking.status) as bsatus FROM `bookingchild` INNER JOIN `booking` USING (booking_id) INNER JOIN `allocate`  USING (`allocate_id`) INNER JOIN `seattype`  USING (`seating_id`) INNER JOIN screen ON screen.screen_id=`allocate`.screen_id INNER JOIN `time`  ON time.time_id=`allocate`.`time_id`  inner join customer using (customer_id)  inner join film using (film_id) where customer_id='$cid'  and booking.status='paid'  or booking.status='cenceled'";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <tr align="">
                
               
                <td><?php echo $row['screenname']?></td>
                <td><?php echo $row['time_name']?><?php echo $row['time'] ?></td>
                <td><?php echo $row['film_name'] ?></td>
                <td><?php echo $row['total']?></td>
                <td><?php echo $row['date'] ?></td>
                <td><?php echo $row['bsatus'] ?></td>


                <?php 

                if ($row['status']=="paid") {
                   ?>

 <td><a href="?cid=<?php echo $row['booking_id'] ?>">cancel</a></td>
                   <?php  
                }

                 ?>
               
             
                
            </tr>
            <?php }?>
          </table>
          <?php include 'footer.php'?>
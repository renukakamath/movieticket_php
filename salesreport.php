<?php include 'theaterheader.php';


$theater_id=$_SESSION['theater_id'];
extract($_GET);
 




 ?>

<center>
  <h1>Search  Sales</h1>
  <form method="post">
    <table border="10" style="color: black;width: 100px">

  
       <td style="color: black"><input type="date" name="daily" > daily </td>
        <td  style="color: black"> <input type="month" name="monthly"> monthly</td>

     <tr>
       <td align="center" colspan="2"><input type="submit" name="sale" class="btn btn-success" value="submit"></td>
      </tr>
    

      </tr>
    </table>
  </form>
</center>







<center>
  <h1 style="color: black">View Sales</h1>
  <h2><a class="btn btn-success" href="sales.php">print</a></h2>
  <table class="table" style="width: 500px;color: black">
    <tr>
      <th></th>
    <th>customer</th>
                <th>screen</th>
                <th>time</th>
             
                <th>moive</th>
                <th>amount</th>
                <th>date</th>
                <th>status</th>
                
    </tr>
    <?php 
         if (isset($_POST['sale'])) {
           extract($_POST);
           // echo $monthly;
           if ($daily!="") {
             // "hi";
           $q="SELECT *,concat(booking.status) as bsatus FROM `bookingchild` INNER JOIN `booking` USING (booking_id) INNER JOIN `allocate`  USING (`allocate_id`) INNER JOIN `seattype`  USING (`seating_id`) INNER JOIN screen ON screen.screen_id=`allocate`.screen_id INNER JOIN `time`  ON time.time_id=`allocate`.`time_id`  inner join customer using (customer_id)   where `date`='$daily' and booking.status='paid'   ";
           }
            else if ($monthly!="") {

            
             $q="SELECT *,concat(booking.status) as bsatus FROM `bookingchild` INNER JOIN `booking` USING (booking_id) INNER JOIN `allocate`  USING (`allocate_id`) INNER JOIN `seattype`  USING (`seating_id`) INNER JOIN screen ON screen.screen_id=`allocate`.screen_id INNER JOIN `time`  ON time.time_id=`allocate`.`time_id`  inner join customer using (customer_id)   where `date` like '$monthly%' and booking.status='paid'  ";

             }
           }
             else{
            $q="SELECT *,concat(booking.status) as bsatus FROM `bookingchild` INNER JOIN `booking` USING (booking_id) INNER JOIN `allocate`  USING (`allocate_id`) INNER JOIN `seattype`  USING (`seating_id`) INNER JOIN screen ON screen.screen_id=`allocate`.screen_id INNER JOIN `time`  ON time.time_id=`allocate`.`time_id`  inner join customer using (customer_id)  where booking.status='paid'   ";
            }

                $res=select($q);
                $_SESSION['res']=$res;
                $r=$_SESSION['res'];

       $slno=1;
       foreach ($res as $row) {
        ?>
    <tr>
       <td><?php echo $slno++; ?></td>
          <td><?php echo $row['fname']?></td>
                <td><?php echo $row['screenname']?></td>
                <td><?php echo $row['time_name']?><?php echo $row['time'] ?></td>
                <td><?php echo $row['total']?></td>
                <td><?php echo $row['date'] ?></td>
                <th><?php echo $row['bsatus'] ?></th>
      
        
    </tr>
  
     <?php
       }


     ?>
  </table>
</center>
<?php include 'footer.php' ?>
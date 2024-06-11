<?php include 'actorheader.php';
 $cid=$_SESSION['customer_id'];
extract($_GET);


?>
<div style="width: 100%;height: 200px;background: url('images/netflixbg.jpg');" >

</div>
<center>
    <h1>View Schedule</h1>
          <table class="table" style="width: 1000px;" >
            <tr align="">
              
                <th>date</th>
                <th>Time</th>
                <th>Venue</th>
              
              
            </tr>
            <?php 
            $q="SELECT * FROM `schedule` where request_id='$rid'";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <tr align="">
               
                <td><?php echo $row['date']?></td>
                <td><?php echo $row['time']?></td>
                <td><?php echo $row['venue'] ?></td>
             
                         </tr>

            <?php }?>
          </table>

          <?php include 'footer.php'?>
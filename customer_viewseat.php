
<?php include'actorheader.php';
 
?>
<div style="width: 100%;height: 200px;background: url('images/netflixbg.jpg');" >

</div>
<center>
    <h1>View Seats</h1>
          <table class="table" style="width: 1000px;" >
            <tr align="">
              
                <th>seattype</th>
                <th>rowname</th>
                <th>seatnumber</th>
                <th>rate</th>
              
            </tr>
            <?php 
            $q="SELECT * FROM seattype  inner join allocate using (screen_id) where screen_id='$sid'";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <tr align="">
               
                <td><?php echo $row['seattype']?></td>
            
                <td><?php echo $row['rowname']?></td>
                <td><?php echo $row['seatnumber']?></td>

                 <td><?php echo $row['rate']?></td>
               <td><a class="btn btn-success" href="user_booking.php?sid=<?php echo $row['seating_id']?>&seat=<?php echo $row['seatnumber'] ?>&allocate_id=<?php echo $row['allocate_id'] ?>&aid=<?php echo $row['rate'] ?>">Book Now</a></td>

                         </tr>
            <?php }?>
          </table>
          <?php include 'footer.php'?>
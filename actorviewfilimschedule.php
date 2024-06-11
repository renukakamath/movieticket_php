
<?php include'actorheader.php';

?>
<div style="width: 100%;height: 200px;background: url('images/netflixbg.jpg');" >

</div>
<center>
    <h1>Availabe Film Schedules</h1>
          <table class="table" >
            <tr align="">
          <!--       <th></th> -->
                <th>Movie </th>
                <th>Screen</th>
                <th>Timing</th>
                <th>played date</th>
                <th>Status</th>
               
            </tr>
            <?php 
            $q="SELECT * FROM `allocate` INNER JOIN `screen`  USING (screen_id) INNER JOIN `film`  USING (film_id) INNER JOIN `time`  USING (`time_id`)";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <tr align="">
                <!-- <td><img width="100" height="120" src="<?php echo $row['poster'] ?>" alt=""></td> -->
                <td><?php echo $row['film_name']?></td>
                <td><?php echo $row['screenname']?></td>
                <td><?php echo $row['time_name']?><?php echo $row['time'] ?></td>
                <td><?php echo $row['playeddate']?></td>
                <td><?php echo $row['status']?></td>
                <td><a href="customer_viewseat.php?sid=<?php echo $row['screen_id'] ?>">View Seats</a></td>
              
                         </tr>
            <?php }?>
          </table>
          <?php include 'footer.php'?>
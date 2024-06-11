
<?php include 'distributorheader.php';

?>
<div style="width: 100%;height: 200px;background: url('images/netflixbg.jpg');" >

</div>
<center>
    <h1>View Request</h1>
          <table class="table" style="width: 1000px;" >
            <tr align="">
              
                <th>opportunities</th>
                <th>customer</th>
                <th>image</th>
                <th>date</th>
               
                <th>status</th>
              
            </tr>
            <?php 
            $q="SELECT * FROM `request` INNER JOIN `opportunities` USING (`opportunities_id`)  INNER JOIN `customer` USING (`customer_id`)";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <tr align="">
               <td><?php echo $row['title']?></td>
                <td><?php echo $row['fname'].$row['lname']?></td>
            <td><img src="<?php echo $row['image']?>" width="100" height="100"></td>
                <td><?php echo $row['date']?></td>
               
                <td><?php echo $row['status'] ?></td>
               <td><a class="btn btn-success" href="addschedule.php?rid=<?php echo $row['request_id']?>">Add Schedule</a></td>

                         </tr>
            <?php }?>
          </table>

          <?php include 'footer.php'?>
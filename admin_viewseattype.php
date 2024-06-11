<?php include'adminheader.php';
?>
<div style="width: 100%;height: 200px;background: url('images/netflixbg.jpg');" >

</div>
<center>
    <h1>Seat Type</h1>
          <table class="table" >
            <tr align="">
   
                <th>screenname</th>
                <th>seattype</th>
                <th>rowname </th>
                <th>seatnumber </th>
                <th>rate</th>
             
              
            </tr>
            <?php 
            $q="select * from seattype inner join screen using (screen_id) ";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <tr align="">
                <td><?php echo $row['screenname']?></td>
            
                <td><?php echo $row['seattype']?></td>
                <td><?php echo $row['rowname']?></td>
                <td><?php echo $row['seatnumber']?></td>
                <td><?php echo $row['rate'] ?></td>
           
                
            </tr>
            <?php }?>
          </table>
          <?php include 'footer.php'?>
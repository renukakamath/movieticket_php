
<?php include'adminheader.php';
 
?>
<div style="width: 100%;height: 200px;background: url('images/netflixbg.jpg');" >

</div>
<center>
    <h1>View Customer</h1>
          <table class="table" style="width: 1300px;" >
            <tr align="">
         
                <th>Name</th>
                <th>City</th>
                <th>Districts</th>
             
                <th>Pincode</th>
                <th>Phone</th>
            
                <th>gender</th>
                <th>Dob</th>
              
            </tr>
            <?php 
            $q="select * from customer  ";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <tr align="">
               
                <td><?php echo $row['fname'].$row['lname']?></td>
            
                
                <td><?php echo $row['city']?></td>
                <td><?php echo $row['dist']?></td>
                <td><?php echo $row['pin']?></td>
                <td><?php echo $row['phone']?></td>
                   <td><?php echo $row['gender']?></td>

                      <td><?php echo $row['cust_dob']?></td>
             
                         </tr>
            <?php }?>
          </table>
          <?php include 'footer.php'?>
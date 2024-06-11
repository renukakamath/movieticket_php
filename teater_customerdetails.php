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
    <h1 class="g-head">View customer</h1> 
          <table class="table" style="box-shadow: 0px 0px 16px 1px hsl(264,44%,32%);width: 97%;margin-top: 20px;" >
            <tr align="">
                

                
                <th>name</th>
                <th>Place</th>
                <th>pin</th>
             
                <th>phone</th>
                <th>gender</th>
            </tr>
            <?php 
            $q="select * from customer where customer_id='$cid'  ";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <tr align="">

              
                
                <td><?php echo $row['fname']?><?php echo $row['lname']?></td>
                <td><?php echo $row['city']?><?php echo $row['dist']?></td>
                <td><?php echo $row['pin']?></td>
                <td><?php echo $row['phone']?></td>
                <td><?php echo $row['gender'] ?></td>
              <!--   <td><a class="btn btn-warning" href="producerviewactorschedule.php?aid=<?php echo $row['theater_id']  ?>">View Schedule</a></td> -->
                
            </tr>
            <?php }?>
          </table>
          <?php include 'footer.php'?>
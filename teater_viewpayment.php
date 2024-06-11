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
    <h1 class="g-head">View Payment</h1> 
          <table class="table" style="box-shadow: 0px 0px 16px 1px hsl(264,44%,32%);width: 97%;margin-top: 20px;" >
            <tr align="">
                

               
                <th>amount</th>
                <th>date</th>
                <th>status</th>
            </tr>
            <?php 
            $q="select * from payment inner join booking using (booking_id) where booking_id='$bid'";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <tr align="">
                
              
                <td><?php echo $row['amount']?></td>
                <td><?php echo $row['date'] ?></td>
                <th><?php echo $row['status'] ?></th>
               
                
            </tr>
            <?php }?>
          </table>
          <?php include 'footer.php'?>
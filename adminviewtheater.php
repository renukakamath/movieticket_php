<?php include'adminheader.php';
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
    <h1 class="g-head">View Theater</h1> 
          <table class="table" style="box-shadow: 0px 0px 16px 1px hsl(264,44%,32%);width: 97%;margin-top: 20px;" >
            <tr align="">
                

                
                <th>name</th>
                <th>city</th>
                <th>pin</th>
             
                <th>phone</th>
                <th>email</th>
            </tr>
            <?php 
            $q="select * from theater  ";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <tr align="">
                
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['city']?></td>
                <td><?php echo $row['pin']?></td>
                <td><?php echo $row['phone']?></td>
                <td><?php echo $row['email'] ?></td>
              <!--   <td><a class="btn btn-warning" href="producerviewactorschedule.php?aid=<?php echo $row['theater_id']  ?>">View Schedule</a></td> -->
                
            </tr>
            <?php }?>
          </table>
          <?php include 'footer.php'?>
<?php include'actorheader.php';
 $cid=$_SESSION['customer_id'];
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
    <h1 class="g-head">View Preference</h1> 
          <table class="table" style="box-shadow: 0px 0px 16px 1px hsl(264,44%,32%);width: 97%;margin-top: 20px;" >
            <tr align="">
                

                
                
              
                <th>Title</th>
             
                <th>Preference</th>
                
            </tr>
            <?php 
            $q="SELECT * FROM `preference` INNER JOIN `opportunities` USING (opportunities_id) ";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <tr align="">
                
               
                
               
                <td><?php echo $row['title'] ?></td>
                <td><?php echo $row['preference']?></td>
             <!--   <td><a href="user_viewpreference.php?opid=<?php echo $row['opportunities_id'] ?>">View Preference</a></td>
           -->   
                
            </tr>
            <?php }?>
          </table>
          <?php include 'footer.php'?>
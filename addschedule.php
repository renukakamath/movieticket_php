<?php include 'distributorheader.php';
extract($_GET);



if(isset($_POST['sub'])){
    extract($_POST);

  

         $q="insert into schedule values(null,'$rid','$date','$time','$venue')";
        insert($q);

        $q="update request status='schedule' where request_id='$rid'";
        update($q);
        alert('added successfully');
        return redirect("production_viewrequest.php");
    }





  


?>
<div style="width: 100%;height: 100vh;background: url('images/tc.jpg');background-size: cover;" >
<div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center" style="display: flex;align-items: center;justify-content:center;width: 100%;">
          <div data-aos="zoom-out" style="width: 400px;box-sizing: content-box;padding: 50px; border: 2px solid #000; box-shadow: 2px 4px 16px grey ;width: 600px;" >
          <center>
          <form  method="post" enctype="multipart/form-data">

    <h2 style="font-size: 30px;color: white;" class="text-white" id="hstyle">Add schedule</h2>


  

<table class="table " style="color: black;" >

 
      <tr>
        <th style="color: white">Date</th>
        <td >
            <input type="date" class="form-control" name="date" id="">
        </td>
    </tr>
    <tr>
        <th style="color: white">Time</th>
        <td >
            <input type="time" class="form-control" name="time" id="">
        </td>
    </tr>
    <tr>
        <th style="color: white">venue</th>
        <td >
            <input type="text" class="form-control" name="venue" id="">
        </td>
    </tr>
  
    <tr>
        <td colspan="2" align="center">
            <input type="submit" class="btn btn-success" name="sub" id="">
        </td>
    </tr>
</table>


</form>
</div>




          </center>
            </div>
          </div>
<!-- <center>
          <table class="table" style="box-shadow: 0px 0px 16px 1px darkred;width: 100%;margin-top: 20px;" >
            <tr align="">
               
              <th></th>
                 <th>Type name</th>
                
               
            </tr>
            <?php 
            $q="select * from type";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <tr align="">
                
                <td><?php echo $i++?></td>
               
                <td><?php echo $row['type_name']?></td>
                <td><a href="?did=<?php echo $row['type_id'] ?>">delete</a></td>
                <td><a href="?uid=<?php echo $row['type_id'] ?>">update</a></td>
                
            </tr>
            <?php }?>
          </table>
       -->

<?php include 'footer.php'?>
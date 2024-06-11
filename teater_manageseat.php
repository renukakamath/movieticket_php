<?php include'theaterheader.php';
extract($_GET);



if(isset($_POST['sub'])){
    extract($_POST);

  

         $q="insert into seattype values(null,'$sid','$title', '$desc', '$poster', '$date')";
        insert($q);
        alert('added successfully');
        return redirect("teater_manageseat.php");
    }




if (isset($_GET['did'])) {
    extract($_GET);

    $q="delete from seattype where seating_id='$did'";

    delete($q);
      alert('deleted successfully');
    return redirect("teater_manageseat.php");

}



if (isset($_GET['uid'])) {
  extract($_GET);

  $q="select * from seattype inner join screen using (screen_id) where seating_id='$uid'";
  $dee=select($q);  
}


if (isset($_POST['update'])) {
   extract($_POST);

   $q="update seattype set seattype='$title',rowname='$desc', seatnumber='$poster',rate='$date'  WHERE seating_id='$uid'";
   update($q);
   alert('updated successfully');

    return redirect("teater_manageseat.php");

}
  

  


?>
<div style="width: 100%;height: 100vh;background: url('images/tc.jpg');background-size: cover;" >
<div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center" style="display: flex;align-items: center;justify-content:center;width: 100%;">
          <div data-aos="zoom-out" style="width: 400px;box-sizing: content-box;padding: 50px; border: 2px solid #000; box-shadow: 2px 4px 16px grey ;width: 600px;" >
          <center>
          <form  method="post" enctype="multipart/form-data">

    <h2 style="font-size: 30px;color: white;" class="text-white" id="hstyle">Manage Movies</h2>


    <?php if (isset($_GET['uid'])) { ?>
<table class="table " style="color: white;" >

    <tr>
        <th>Seattype </th>
        <td><input type="text" required class="form-control"  value="<?php echo $dee[0]['seattype'] ?>" name="title" id=""></td>
    </tr>
    <tr>
        <th>Rowname </th>
        <td><input type="text" required class="form-control"  value="<?php echo $dee[0]['rowname'] ?>" name="desc" id=""></td>
    </tr> 
  
    <tr>
        <th>Seatnumber</th>
        <td><input type="text" required class="form-control"  value="<?php echo $dee[0]['seatnumber'] ?>" name="poster" id=""></td>
    </tr>
   
   
      <tr>
        <th>Rate</th>
        <td><input type="text" required class="form-control"  value="<?php echo $dee[0]['rate'] ?>" name="date" id=""></td>
    </tr>
      
    <tr>
        <td colspan="2" align="center">
            <input type="submit" class="btn btn-success" name="update" id="">
        </td>
    </tr>
</table>

<?php }else{ ?>


<table class="table " style="color: white;" >

  
    <tr>
        <th>Seattype </th>
        <td><input type="text" required class="form-control"   name="title" id=""></td>
    </tr>
    <tr>
        <th>Rowname </th>
        <td><input type="text" required class="form-control"  name="desc" id=""></td>
    </tr> 
  
    <tr>
        <th>Seatnumber</th>
        <td><input type="text" required class="form-control"   name="poster" id=""></td>
    </tr>
   
   
      <tr>
        <th>Rate</th>
        <td><input type="text" required class="form-control"  name="date" id=""></td>
    </tr>
      
    <tr>
        <td colspan="2" align="center">
            <input type="submit" class="btn btn-success" name="sub" id="">
        </td>
    </tr>
</table>

<?php } ?>
</form>
</div>




          </center>
            </div>
          </div>
<center>
          <table class="table" style="box-shadow: 0px 0px 16px 1px darkred;width: 100%;margin-top: 20px;" >
            <tr align="">
               
                 <th>Seattype </th>
               <th>Rowname</th>
                <th>Seatnumber</th>
                 <th>Rate</th>
                
               
            </tr>
            <?php 
            $q="select * from seattype";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <tr align="">
                
                <td><?php echo $row['seattype']?></td>
                <td><?php echo $row['rowname']?></td>
                <td><?php echo $row['seatnumber']?></td>
                <td><?php echo $row['rate']?></td>
                <td><a class="btn btn-success"  href="?did=<?php echo $row['seating_id'] ?>">delete</a></td>
                <td><a  class="btn btn-danger" href="?uid=<?php echo $row['seating_id'] ?>">update</a></td>
               
            </tr>
            <?php }?>
          </table>
      

<?php include 'footer.php'?>
<?php include'theaterheader.php';


if(isset($_POST['sub'])){
    extract($_POST);

  

         $q="insert into screen values(null,'$screenname','$noofseats')";
        insert($q);
        alert('added successfully');
        return redirect("theateraddscreen.php");
    }




if (isset($_GET['did'])) {
    extract($_GET);

    $q="delete from screen where screen_id='$did'";

    delete($q);
      alert('deleted successfully');
    return redirect("theateraddscreen.php");

}



if (isset($_GET['uid'])) {
  extract($_GET);

  $q="select * from screen where screen_id='$uid'";
  $dee=select($q);  
}


if (isset($_POST['update'])) {
   extract($_POST);

   $q="update screen set screenname='$screenname',noofseats='$noofseats'  WHERE screen_id='$uid'";
   update($q);
   alert('updated successfully');

    return redirect("theateraddscreen.php");

}
  

  


?>
<div style="width: 100%;height: 100vh;background: url('images/tc.jpg');background-size: cover;" >
<div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center" style="display: flex;align-items: center;justify-content:center;width: 100%;">
          <div data-aos="zoom-out" style="width: 400px;box-sizing: content-box;padding: 50px; border: 2px solid #000; box-shadow: 2px 4px 16px grey ;width: 600px;" >
          <center>
          <form  method="post" enctype="multipart/form-data">

    <h2 style="font-size: 30px;color: white;" class="text-white" id="hstyle">Manage screen</h2>


    <?php if (isset($_GET['uid'])) { ?>
<table class="table " style="color: white;" >

   
    <tr>
        <th>screenname </th>
        <td><input type="text" required class="form-control"  value="<?php echo $dee[0]['screenname'] ?>" name="screenname" id=""></td>
    </tr>

      <tr>
        <th>noofseats   </th>
        <td><input type="text" required class="form-control"  value="<?php echo $dee[0]['noofseats'] ?>" name="noofseats" id=""></td>
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
        <th>screenname  </th>
        <td><input type="text" required class="form-control" name="screenname" id=""></td>
    </tr>


     <tr>
        <th>noofseats   </th>
        <td><input type="text" required class="form-control"  name="noofseats" id=""></td>
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
               
              <th></th>
                 
                 <th>screenname</th>
                 <th>noofseats </th>
                
               
            </tr>
            <?php 
            $q="select * from screen";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <tr align="">
                
                <td><?php echo $i++?></td>
               
                <td><?php echo $row['screenname']?></td>
                <td><?php echo  $row['noofseats'] ?></td>
                <td><a href="?did=<?php echo $row['screen_id'] ?>">delete</a></td>
                <td><a href="?uid=<?php echo $row['screen_id'] ?>">update</a></td>
                <td><a href="teater_manageseat.php?sid=<?php echo $row['screen_id'] ?>">Manage Seat</a></td>
                <td><a href="teater_allocate.php?sid=<?php echo $row['screen_id'] ?>">allocate screen</a></td>
            </tr>
            <?php }?>
          </table>
      

<?php include 'footer.php'?>
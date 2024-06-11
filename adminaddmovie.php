<?php include'adminheader.php';


if(isset($_POST['sub'])){
    extract($_POST);

  

         $q="insert into film values(null,'$mid','$date', '$desc', '$poster', '$title')";
        insert($q);
        alert('added successfully');
        return redirect("adminaddmovie.php");
    }




if (isset($_GET['did'])) {
    extract($_GET);

    $q="delete from film where film_id='$did'";

    delete($q);
      alert('deleted successfully');
    return redirect("adminaddmovie.php");

}



if (isset($_GET['uid'])) {
  extract($_GET);

  $q="select * from film inner join type using (type_id) where film_id='$uid'";
  $dee=select($q);  
}


if (isset($_POST['update'])) {
   extract($_POST);

   $q="update film set type_id='$mid',film_name='$title',filim_desc='$desc', duration='$poster',film_release='$date'  WHERE film_id='$uid'";
   update($q);
   alert('updated successfully');

    return redirect("adminaddmovie.php");

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
        <th>Movie Type </th>
        <td><select  style="color: black"  name="mid">
            <option value="<?php echo $dee[0]['type_id'] ?>"><?php echo $dee[0]['type_name'] ?></option>
            <option>--select--</option>
            <?php 

                $q="select * from type";
                $res=select($q);

                foreach ($res as $key) {
                   ?>

                   <option value="<?php echo $key['type_id'] ?>"><?php echo $key['type_name'] ?></option>

                   <?php 
                }
             ?>
        </select></td>
    </tr>
    <tr>
        <th>Movie Title </th>
        <td><input type="text" required class="form-control"  value="<?php echo $dee[0]['film_name'] ?>" name="title" id=""></td>
    </tr>
    <tr>
        <th>Movie Description </th>
        <td><input type="text" required class="form-control"  value="<?php echo $dee[0]['filim_desc'] ?>" name="desc" id=""></td>
    </tr> 
  
    <tr>
        <th>Duration</th>
        <td><input type="text" required class="form-control"  value="<?php echo $dee[0]['duration'] ?>" name="poster" id=""></td>
    </tr>
   
   
      <tr>
        <th>Release Date</th>
        <td><input type="date" required class="form-control"  value="<?php echo $dee[0]['film_release'] ?>" name="date" id=""></td>
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
        <th>Movie Type </th>
        <td><select  style="color: black"  name="mid">
            <option>--select--</option>
            <?php 

                $q="select * from type";
                $res=select($q);

                foreach ($res as $key) {
                   ?>

                   <option value="<?php echo $key['type_id'] ?>"><?php echo $key['type_name'] ?></option>

                   <?php 
                }
             ?>
        </select></td>
    </tr>
    <tr>
        <th>Movie Title </th>
        <td><input type="text" required class="form-control" name="title" id=""></td>
    </tr>
    <tr>
        <th>Movie Description </th>
        <td><input type="text" required class="form-control" name="desc" id=""></td>
    </tr> 
  
    <tr>
        <th>Duration</th>
        <td><input type="text" required class="form-control" name="poster" id=""></td>
    </tr>
   
   
      <tr>
        <th>Release Date</th>
        <td><input type="date" required class="form-control" name="date" id=""></td>
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
               
                 <th>release Date</th>
               <th>duration</th>
                <th>description</th>
                 <th>Title</th>
                
               
            </tr>
            <?php 
            $q="select * from film";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <tr align="">
                
                <td><?php echo $row['film_release']?></td>
                <td><?php echo $row['filim_desc']?></td>
                <td><?php echo $row['duration']?></td>
                <td><?php echo $row['film_name']?></td>
                <td><a class="btn btn-success"  href="?did=<?php echo $row['film_id'] ?>">delete</a></td>
                <td><a  class="btn btn-danger" href="?uid=<?php echo $row['film_id'] ?>">update</a></td>
               
            </tr>
            <?php }?>
          </table>
      

<?php include 'footer.php'?>
<?php include 'actorheader.php';
 $cid=$_SESSION['customer_id'];
extract($_GET);



if(isset($_POST['sub'])){
    extract($_POST);

     $dir = "uploads/";
  $file = basename($_FILES['img']['name']);
  $file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
  $target = $dir.uniqid("images_").".".$file_type;
  if(move_uploaded_file($_FILES['img']['tmp_name'], $target))
  {

  

         $q="insert into request values(null,'$opid','$cid','$target',curdate(),'send request')";
        insert($q);
        alert('added successfully');
        return redirect("user_viewoppertunities.php");
    }
      else
    {
        echo "file uploading error occured";
    }

}



  


?>
<div style="width: 100%;height: 100vh;background: url('images/tc.jpg');background-size: cover;" >
<div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center" style="display: flex;align-items: center;justify-content:center;width: 100%;">
          <div data-aos="zoom-out" style="width: 400px;box-sizing: content-box;padding: 50px; border: 2px solid #000; box-shadow: 2px 4px 16px grey ;width: 600px;" >
          <center>
          <form  method="post" enctype="multipart/form-data">

    <h2 style="font-size: 30px;color: white;" class="text-white" id="hstyle">Send Request</h2>


  

<table class="table " style="color: black;" >

 
      <tr>
        <th style="color: white">Image</th>
        <td >
            <input type="file" class="form-control" name="img" id="">
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


<?php include 'footer.php'?>
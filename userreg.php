<?php include 'publicheader.php';

if(isset($_POST['sub'])){
	extract($_POST);
	$q="INSERT INTO `login` VALUES(null,'$uname','$pss','customer')";
	$ids=insert($q);
	$qry="INSERT INTO `customer` VALUES(null,'$ids','$fname','$lname','$city','$district','$pin','$phone','$gen','$dob')";
	insert($qry);
  alert("registration Successful");
    return redirect("userreg.php");
}
?> 

<section id="hero">

    <div class="container-floating" style="background: url('images/netflixbg.jpg');height:200vh;">
      <div class="row justify-content-center"  style="display: flex;align-items: center;justify-content:center;padding-top: 150px;background: rgba(0,0,0,.6);height: 150vh;">
        <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center" style="display: flex;align-items: center;justify-content:center">
          <div data-aos="zoom-out" style="width: 400px;box-sizing: content-box;padding: 50px; border: 2px solid #000; box-shadow: 2px 4px 16px 383636;background: rgba(0,0,0,.8);margin-top: -250px;" >
          <center>
          <form  method="post">

    <h2 style="font-size: 30px;color:white" class="text-white" id="hstyle">Customer Registraion</h2>
<table class="table "  style="color:white" >
    <tr>
        <th>First Name </th>
        <td><input type="text" required class="form-control" name="fname" id=""></td>
    </tr>

     <tr>
        <th>Last Name </th>
        <td><input type="text" required class="form-control" name="lname" id=""></td>
    </tr>
    <tr>
        <th>city </th>
        <td><input type="text" required class="form-control" name="city" id=""></td>
    </tr> 

     <tr>
        <th>District </th>
        <td><input type="text" required class="form-control" name="district" id=""></td>
    </tr> 
    <tr>
        <th>Phone </th>
        <td><input type="text"  pattern="[0-9]{10}" required   class="form-control" name="phone" id=""></td>
    </tr>
      
<tr>
        <th>Pin Code </th>
        <td><input type="text"  pattern="[0-9]{6}"  required class="form-control" name="pin" id=""></td>
    </tr>
    <tr>
        <th>gender</th>
        <td><input type="radio" required   value="male" name="gen" id="">male
          <input type="radio" required   value="female" name="gen" id="">Female</td>
    </tr>
   <tr>
        <th>Dob </th>
        <td><input type="date"    required class="form-control" name="dob" id=""></td>
    </tr>
   
      <tr>
        <th>username</th>
        <td><input type="text" required class="form-control" name="uname" id=""></td>
    </tr>
      <tr>
        <th>Password</th>
        <td><input type="text" required class="form-control" name="pss" id=""></td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <input type="submit" class="btn btn-success" name="sub" id="">
        </td>
    </tr>
</table>
</form>
          </center>
            </div>
          </div>
        </div>
        
      </div>
    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg>

  </section><!-- End Hero -->

<?php include 'footer.php' ?> 
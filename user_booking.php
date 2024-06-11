<?php include 'actorheader.php';
  $cid=$_SESSION['customer_id'];
    extract($_GET);

if (isset($_POST['booking'])) {
    extract($_POST);

    echo$data=$noseat;
    echo$stock=$seat;

    if ($stock < $data ) {

        alert('try another seat!! ');
    }
else{


   

    echo$q2="select * from booking where customer_id='$cid' and status='pending'";
    $res=select($q2);
    if (sizeof($res)>0) {
        $bmid=$res[0]['booking_id'];
    }else{

    echo$q="insert into booking values(null,'$cid','$allocate_id','0',curdate(),'pending')";
    $bmid=insert($q);


// echo$q3="insert into booking_child values(null,'$bmid','$bid','$noseat','$spid','$epid','$total')";
//     insert($q3);


    // alert('successfuly');
    // return redirect('user_cart.php');
}
  $q4="select * from bookingchild where seating_id='$sid' and booking_id='$bmid' ";
  $res2=select($q4);

  if (sizeof($res2)>0) {
    $bdid=$res2[0]['bookingchild_id'];

    echo$q5="update bookingchild set no_of_seat=no_of_seat+'$noseat', price=price+'$total' where bookingchild_id='$bdid' ";
    update($q5);
    
  }else{

    echo$q3="insert into bookingchild values(null,'$bmid','$sid','$total','0','$noseat')";
    insert($q3);
    }

    echo$q6="update booking set total=total+'$total' where booking_id='$bmid' ";
    update($q6);
    alert('successfuly');
    return redirect('user_cart.php');

}

}


 ?>
 



  <script type="text/javascript">
    function TextOnTextChange()
    {
        var x =document.getElementById("p_amount").value;
        var y =document.getElementById("p_qnty").value;
        
        document.getElementById("t_amount").value = x * y;
    }

</script>

<center>
    <h1 style="color: black">Booking</h1>
    <form method="post">
        <table class="table" style="width: 500px;;color: black">
            
            
          <!--   <tr>
                <th>From Place</th>
                <td style="color: black"><input type="text" required="" readonly="" value="<?php echo $sp ?>" name="sp"></td>
                    
            </tr>
            <tr>
                <th>To Place</th>
                <td style="color: black"><input type="text" required="" readonly="" value="<?php echo $ep ?>" name="sp"></td>
            </tr> -->
        <tr>
            <th>amount</th>
            <td style="color: black"><input type="text"  id="p_amount" value="<?php echo $aid ?>"   readonly name="total" class="form-control"></td>
        </tr>
            <tr>
                <th>Number Of Seats</th>
                <td style="color: black"><input type="text"  value="1" id="p_qnty"  name="noseat"    class="form-control"></td>
            </tr>
       
        
            <tr>
                <td align="center" colspan="2"><input type="submit" class="btn btn-success" name="booking" value="submit"></td>
            </tr>
        </table>
    </form>
</center>
 

<?php include 'footer.php' ?>
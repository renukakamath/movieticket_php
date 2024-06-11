<?php include 'actorheader.php';
$cid=$_SESSION['customer_id'];
extract($_GET);

if (isset($_POST['payment'])) {
	extract($_POST);


		echo $exp_date=$mon;
	echo $cd=date("Y-m");

if ($exp_date < $cd) {


alert('expired'); 
			

}else{



	$q="insert into payment values(null,'$cid','$omid','$amt')";
	insert($q);
$q2="update booking set status='paid' where booking_id='$omid'";
update($q2);


	$q3="SELECT * FROM bookingchild INNER JOIN `seattype` USING (seating_id) where booking_id='$omid'";
$res=select($q3);



foreach ($res as $key) {

  $pid= $key['seating_id'] ;

 $qty=$key['no_of_seat'];

echo$q6="update seattype set seat_number=seat_number-'$qty' where seating_id='$pid'";
update($q6);

alert('Successfully');
	return redirect('user_viewmybookings.php');
}





}
}

 ?>

<center>
	<h1 style="color: black">Make Payment</h1>
	<form method="post">
		<table class="table" style="width: 500px;color: black">
			<tr>
				<th>card Nunber</th>
				<td style="color: black"><input type="text" required="" maxlength="16" class="form-control" name="card"></td>
			</tr>
			<tr>
				<th>Cvv</th>
				<td style="color: black"><input type="text" required="" maxlength="3" class="form-control" name="cv"></td>
			</tr>
			<tr>
				<th>Expire date</th>
				<td style="color: black"><input type="month"  name="mon" required="" class="form-control"></td>
			</tr>
			<tr>
				<th>Amount</th>
				<td style="color: black"><input type="text" required="" value="<?php echo $amt ?>" class="form-control" name="am"></td>
			</tr>
			<th align="center" colspan="2"><input type="submit" name="payment" value="submit" class="btn btn-success"></th>
		</table>
	</form>
</center>


<?php include 'footer.php' ?>
<?php include 'connection.php';
extract($_GET);
 $r=$_SESSION['res'];

 ?>
<script> 
    function printDiv() { 
      var divContents = document.getElementById("div_print").innerHTML; 
      var a = window.open('', '', 'height=500, width=500'); 
      a.document.write(divContents); 
      a.document.close(); 
      a.print(); 
    } 
  </script> 
<body onload="printDiv()">
  <div id="div_print" >
<center>
  
<h1 style="padding-top: 30px;font-size: 60px">Sales Report</h1>

<!-- <h1>View Sales</h1> -->
<table class="table" style="width: 1000px;color: black;font-style: italic;font-family: monospace;font-size: 22px" border="5">
		<tr>
	 <th></th>
    <th>customer</th>
                <th>screen</th>
                <th>time</th>
             
                <th>moive</th>
                <th>amount</th>
                <th>date</th>
                <th>status</th>
                
        
        
		</tr>
		<?php 

       
      $res=$r;
       $slno=1;
       foreach ($res as $row) {
      ?>
        
        
     <td><?php echo $slno++; ?></td>
          <td><?php echo $row['fname']?></td>
                <td><?php echo $row['screenname']?></td>
                <td><?php echo $row['time_name']?><?php echo $row['time'] ?></td>
                <td><?php echo $row['total']?></td>
                <td><?php echo $row['date'] ?></td>
                <th><?php echo $row['status'] ?></th>
     
    </tr>
     <?php
       }


		 ?>
	</table>
</center>
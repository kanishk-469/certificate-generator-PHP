<?php
$conn= new mysqli('localhost','participant','','db_name_participant');
$res=mysqli_query($conn,"select * from participant");
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dynamic Datatable</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
</head>
<body>
	<div class="container" style="margin-top:50px;">
	  <table class="table table-striped table-dark" >
		<thead>
			<tr>
			    <th>Sno.</th>
				<th>Name</th>
				<th>Gender</th>
				<th>Contact</th>
				<th>email</th>
				<th>dob</th>
				<th>event_name</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$sno = 0;
			while($row=mysqli_fetch_assoc($res)){
			 $sno += 1;
			?>
			<tr>
			    <td><?php echo $sno;?></td>
				<td><?php echo $row['name']?></td>
				<td><?php echo $row['gender']?></td>
				<td><?php echo $row['contact']?></td>
				<td><?php echo $row['email']?></td> 
				
				<td><?php echo $row['dob']?></td>
				<td><?php echo $row['eventname']?></td>
				<td><a href='delete.php?id=<?php echo $row['id']?>'>DELETE</a></td>
			</tr>
			<?php } ?>
		</thead>
	  </table>
   </div>
   	<div class="container" style="margin-top:20px;"><a href="cert_form.php" class="btn btn-primary">Generate Certificate</a></div>
   	<div class="container" style="margin-top:10px;"><a href="participant_form.php" class="btn btn-primary">Back</a></div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" ></script>
  <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready( function () {
		$('.table').DataTable();
  });
  </script>
</body>
</html>
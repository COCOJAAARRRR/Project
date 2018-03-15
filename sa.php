<html>
<head>

<link rel="stylesheet" type="text/css" href="css/surveyor.css">
<link rel="stylesheet" type="text/css" href="css/modal_box.css">
<link href="https://fonts.googleapis.com/css?family=Orbitron|Rajdhani" rel="stylesheet">
</head>

<body> 
<div class="userbar">
<h1> Welcome Surveyor!</h1>
</div>
<div class="cover">
<div class="menubar">
<div id="logo">
<img src="images/logo.png" alt="AVATAR">
</div>
<div id="user_info">
<h3>Name:<?php echo "$row[surveyor]";?><!-- php get user info --></h3>
<h3>E-mail:<!-- php get user info --></h3>
<h3>Department:<!-- php get user info --></h3>
</div>
<ul class="inbox">
                          <li class="active">
                              <a href="#"><i class="fa fa-inbox"></i> Inbox </a>

                          </li>
                          <li>
                              <a href="#"><i class="fa fa-envelope-o"></i> Sent Mail</a>
                          </li>
                          <li>
                              <a href="#"><i class="fa fa-bookmark-o"></i> Senarai Pegawai</a>
                          </li>
                          <li>
                              <a href="#"><i class=" fa fa-external-link"></i> Block/PA no/ Zone <span class="label label-info pull-right">30</span></a>
                          </li>
                          <li>
                              <a href="#"><i class=" fa fa-trash-o"></i> </a>
                          </li>
						  <li><button id="addbtn">Compose</button></li>
                      </ul>
</div>
<div class="messagespace">
<div class="actionmsg">
	


<div id="addModal" class="modal">
  <!-- Modal content 1 -->
  <div class="modal-content">
    <span class="close closeAdd">&times;</span>
<form name="frmNotification" id="frmNotification" action="" method="post" >
			<div id="form-header" class="form-row">Add New Message</div>
			<div class="form-row">
				<div class="form-label">Subject:</div><div class="error" id="subject"></div>
				<div class="form-element">
					<input type="text"  name="subject" id="subject" required>
					
				</div>
			</div>
			<div class="form-row">
				<div class="form-label">Message:</div><div class="error" id="comment"></div>
				<div class="form-element">
					<textarea rows="4" cols="30" name="comment" id="comment"></textarea>
				</div>
			</div>
			<div class="form-row">
				<div class="form-label">Upload folder:</div><div class="error" id="comment"></div>
				<div class="form-element">
					<input type="file" name="file" id="InputFile" placeholder="pilihfile" multiple=""/>
				</div>
			</div>
			<div class="form-row">
				<div class="form-element">
					<input type="submit" name="add" id="btn-send" value="Send">
				</div>
			</div>
		</form>


</div>
</div>




<script type="text/javascript">
var addModal = document.getElementById('addModal');
 //Get the button that opens the modal
var addbtn = document.getElementById("addbtn");

// Get the <span> element that closes the modal
var spanCloseAdd = document.getElementsByClassName("closeAdd")[0];

// When the user clicks the button, open the modal 
addbtn.onclick = function() {
    addModal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spanCloseAdd.onclick = function() {
    addModal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == addModal) {
        addModal.style.display = "none";
    }
}
</script>

<table id="noti_inbox">
	<tr><th>Date</th><th>Surveyor</th><th>Task</th><th>Message</th><th>Kc name</th><th>Attached Media</th></tr>

<?php
$server = "DESKTOP-MPDN7G2\MSSQLSERVER2016";
$options = array(  "UID" => "sa",  "PWD" => "P@ssw0rD",  "Database" => "joblist");
$conn = sqlsrv_connect($server, $options);
	if( $conn ) {
     echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}



$sql = "SELECT surveyor,kc,task,media,message,tarikh FROM dbo.notifications"; 
$query = sqlsrv_query($conn, $sql);
if ($query == false){  die( "<pre>".print_r( sqlsrv_errors(), true) );


}while ($row = sqlsrv_fetch_array($query,SQLSRV_FETCH_ASSOC ))

{  
	
	echo"<tr>
	<td>$row[date]</td>
	<td>$row[surveyor]</td>
	<td>$row[task]</td>
	<td>$row[message]</td>
	<td>$row[kc]</td>
	<td>$row[media]</td>
	</tr>";

	


	/*echo"<tr><td>";
	echo "$row[surveyor]";
	echo"</td>";
	echo"<td>";
	echo "$row[kc]";
	echo"</td>";
	echo"</t r>";
echo"</table>";*/


}
sqlsrv_free_stmt($query);
?>



</table>
</div>
</div>
</div>
</div>
</body>




</html>

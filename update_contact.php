<?php 

	require_once"connection.php";

	if (isset($_GET['id'])) {
		
		$id = $_GET['id']; 
		$get_contact = "select * from contacts where contact_id = '$id' ";
		$sql_get_contact = $conn->query($get_contact);

		$row = mysqli_fetch_assoc($sql_get_contact);

//		var_dump($row);
	}

 ?>

<?php 

if (isset($_POST['submit'])) {

	$id = $_POST['id'];
   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $nickname = $_POST['nickname'];
   $profile = $_FILES['profile']['name'];
   $profile_tmp = $_FILES['profile']['tmp_name'];
   $cphone = $_POST['cphone'];
   $sphone = $_POST['sphone'];
   $tphone = $_POST['tphone'];
   $address = $_POST['address'];
   $city = $_POST['city'];
   $zipcode = $_POST['zipcode'];

   move_uploaded_file($profile_tmp, "profile_img/profile");

   $update_contact = "update contacts set 
   									contact_fname = '$fname',
   									contact_lname = '$lname',
   									contact_nickname = '$nickname', 
   									contact_profile = '$profile',
   									contact_cphone = '$cphone' ,
   									contact_sphone = '$sphone',
   									tphone = '$tphone',
   									contact_address = '$address',
   									contact_city= '$city',
   									contact_zipcode = '$zipcode'
   									where contact_id = '$id'";

   	$sql_update_contact = $conn->query($update_contact);

      echo $sql;

   	if ($sql_update_contact == true) {
   		header('Location: index.php');
   	}
}


  ?>





<!DOCTYPE html>
<html>

<head>
    <?php include"includes/head.inc"; ?>
    <script>tinymce.init({selector:'textarea'});</script>
</head>

<body>
    <div class="wrapper">

        <!-- header section -->
        <div class="header">
            <div class="headerContent">
                <h1>CONTACT LIST</h1>
            </div>
        </div>

        <!-- content section -->
        <div class="content">
            <div>
                <h1>Update Contact</h1>
            </div>
            <hr>
            <div class="contact">
                <div class="contact_insert">
                    <form action="" method="post" enctype="multipart/form-data">
                        <table style="float:left" width="50%">
                            <input type="hidden" name="id" value="<?php echo $row['contact_id']?>">
                            <tr>
                                <td>First Name:</td>
                                <td><input type="text" name="fname" value=" <?php echo $row['contact_fname'] ?>" size="40%"></td>
                            </tr>
                            <tr>
                                <td>Last Name:</td>
                                <td><input type="text" name="lname" value="<?php echo $row['contact_lname'] ?>" size="40%"></td>
                            </tr>
                            <tr>
                                <td>Nickname:</td>
                                <td><input type="text" name="nickname" value="<?php echo $row['contact_nickname'] ?>" size="40%"></td>
                            </tr>
                            <tr>
                                <td>Profile Image:</td>
                                <td><input type="file" name="profile"></td>
                            </tr>
                            <tr>
                                <td>Cell Phone:</td>
                                <td><input type="text" name="cphone" value="<?php echo $row['contact_cphone'] ?>" size="40%"></td>
                            </tr>
                            <tr>
                                <td>Secondary Phone:</td>
                                <td><input type="text" name="sphone" value="<?php echo $row['contact_sphone'] ?>" size="40%"></td>
                            </tr>
                            <tr>
                                <td>Tertiary Phone:</td>
                                <td><input type="text" name="tphone" value="<?php echo $row['tphone'] ?>" size="40%"></td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td><input type="text" name="address" value="<?php echo $row['contact_address'] ?>" size="40%"></td>
                            </tr>
                            <tr>
                                <td>City:</td>
                                <td><input type="text" name="city" value="<?php echo $row['contact_city'] ?>" size="40%"></td>
                            </tr>
                            <!-- <tr>
								<td>State:</td>
								<td><input type="text" name="state" value="" size="40%"></td>
							</tr> -->
                            <tr>
                                <td>Zipcode:</td>
                                <td><input type="text" name="zipcode" value="<?php echo $row['contact_zipcode'] ?>" size="40%"></td>
                            </tr>
                        </table>
                        <table style="float:right" width="45%">
                            <tr>
                                <td>Bio:</td>
                                <td><textarea name="bio" id="bio" cols="30" rows="10"></textarea></td>
                            </tr>
                        </table>
                        <div class="clear"></div>
                        <input class="insert_contact_button" type="submit" name="submit" value="Update Contact">
                        <a href="index.php"><input class="cancel_contact_button" type="button" value="Cancel"></a>
                    </form>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</body>

</html>

<?php 

if (isset($_POST['submit'])) {
   
   require_once "connection.php";

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

   $insert_contact = "INSERT INTO contacts(contact_fname, contact_lname, contact_nickname, contact_cphone, contact_sphone, tphone, contact_address, contact_city, contact_zipcode, contact_profile) VALUES ('$fname','$lname','$nickname','$cphone','$sphone','$tphone','$address','$city','$zipcode','$profile')";
       
   $sql_insert_contact = $conn->query($insert_contact);

    if ($sql_insert_contact == true) {
        header("Location: index.php");
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
                <h1>Create New Contact</h1>
            </div>
            <hr>
            <div class="contact">
                <div class="contact_insert">
                    <form action="insert_contact.php" method="post" enctype="multipart/form-data">
                        <table style="float:left" width="50%">
                            <tr>
                                <td>First Name:</td>
                                <td><input type="text" name="fname" placeholder="First Name" size="40%"></td>
                            </tr>
                            <tr>
                                <td>Last Name:</td>
                                <td><input type="text" name="lname" placeholder="Last Name" size="40%"></td>
                            </tr>
                            <tr>
                                <td>Nickname:</td>
                                <td><input type="text" name="nickname" placeholder="Nickname" size="40%"></td>
                            </tr>
                            <tr>
                                <td>Profile Image:</td>
                                <td><input type="file" name="profile"></td>
                            </tr>
                            <tr>
                                <td> Primary Phone Number:</td>
                                <td><input type="text" name="cphone" placeholder="Cell Phone" size="40%"></td>
                            </tr>
                            <tr>

                                <td>Seconadry Phone Number:</td>
                                <td><input type="text" name="sphone" placeholder="Home Phone" size="40%"></td>
                            </tr>
                            <tr>
                                <td>Tertiary Phone Number:</td>
                                <td><input type="text" name="tphone" placeholder="Work Phone" size="40%"></td>
                            </tr>
                            <tr>

                                <td>Address:</td>
                                <td><input type="text" name="address" placeholder="Address" size="40%"></td>
                            </tr>
                            <tr>
                                <td>City:</td>
                                <td><input type="text" name="city" placeholder="City" size="40%"></td>
                            </tr>

                            <!-- <tr>
								<td>State:</td>
								<td><input type="text" name="state" placeholder="State" size="40%"></td>
							</tr> -->
                            <tr>
                                <td>Zipcode:</td>
                                <td><input type="text" name="zipcode" placeholder="Zipcode" size="40%"></td>
                            </tr>

                        </table>
                        <table style="float:right" width="45%">
                            <tr>
                                <td>Bio:</td>
                                <td><textarea name="bio" id="bio" cols="30" rows="10"></textarea></td>
                            </tr>
                        </table>
                        <div class="clear"></div>
                        <input class="insert_contact_button" type="submit" name="submit" value="Insert Contact">
                        <a href="index.php"><input class="cancel_contact_button" type="button" value="Cancel"></a>
                    </form>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</body>

</html>




<!--ALTER TABLE `contacts` ADD `contact_cphone` VARCHAR(50) NOT NULL AFTER `contact_nickname`;-->

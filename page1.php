<?php
   
    include("connection.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!--<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <title>Page1</title>
    <!--link rel = "stylesheet" type = "text/css" href = " page1.css"-->
    
    <style>
        *{
    padding: 0;
    margin: 0;
}

.header-control{
    background-color: black;
    width: 100%;
    height: 90px;
}

.control-align{
    width: 100%;
    height: 90px;
    margin-left: auto;
    margin-right: auto;
}

.control-h1{
    float: left;
}

.control-h1 img{
    width: 200px;
    height: 80px;
    margin-top: 5px;
}

.login{
    float: right;
    font-family: Arial;
    font-size: 13px;
    color: gold;
    margin-top: 20px;
}

.login p{
    margin-left: 10px;
}

.inputtxt{
        width: 150px;
        height: 20px;
        margin-left: 10px;
        color: gold;
        border-color: gold;
        background-color: black;
}

.btn{
    background-color: gold;
    color: black;
    font-family: Arial;
    padding: 05px;
    border: none;
    border-radius: 03px;
    margin-left: 05px;
}

.login a{
    color: gold;
    text-decoration: none;
}

.content-control{
    width: 100%;
    height: 100vh;
    background-image: url(pexels-photo-5668473.webp);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    color: gold;
}

/*.content-control{
    width: 980px;
    height: 1000px;
    margin-left: auto;
    margin-right: auto;
}

.left{
    
    margin-top: 20px;
    width: 400px;
    font-family: Arial;
    color: #8a385f;
}

.left h3{
    margin-top: 10px;
    margin-bottom: 20px;
}*/

.right{
    float: right;
    font-family: arial;
    margin-top: 20px;
    margin-right: 85px;
}
.right h1{
    margin-left: 5px;
}

.right h1{
    margin-left: 5px;
}

.right p{
    margin-left: 5px;
}


.ipt{
    width: 220px;
    height: 35px;
    margin-top: 10px;
    margin-right: auto;
    border-radius: 03px;
    border: none;
    border: 1px solid #95a5a6;
    padding-left: 10px;
    font-size: 20px;
}

.ipt2{
    width: 450px;
    height: 35px;
    border-radius: 03px;
    padding-left: 10px;
    font-size: 20px;
    border: none;
    border: 1px solid #95a5a6;
    margin-left: 05px;
    margin-top: 10px;
}

.bd{
    margin-left: 05px;
    margin-top: 10px;   
}

.dropdown{
    width: 70px;
    height: 30px;
    margin-left: 05px;
    margin-top: 5px;
}

.rb{
    width: 30px;
    height: 30pxpx;
    margin-left: 05px;
    margin-top: 5px;
}

.ft{
    font-size: 12px;
    margin-top: 20px;
    margin-left: 05px;
}

.btncreate{
    width: 250px;
    height: 40px;
    border-radius: 5px;
    font-size: 20px;
    font: bold;
    font-weight: 500;
    font-family: arial;
    background-color: black;
    color: gold;
    margin-left: 05px;
}
    </style>
</head>
<body>
 <div class="control-align">
  <div class="header-control">
         <div class="control-h1">
            <img src="auctionWithfish.png" alt="">
        </div>
        <div class="login">
            <form method="post" action="login.php">
                <table>
                    <tr>
                        <td><p>Email and Number</p></td>
                        <td><p>Password</p></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="inputtxt" name="useraccount"/> </td>
                        <td><input type="password" class="inputtxt" name="userpassword"/> </td>
                        <td><input type="submit" class="btn" value="Log In" name="login"/></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><p><a href="#">Forgot Password</a></p></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

</div>
<form method="post" action="page1todabase.php">
    <div class="content-control">
   
        <div class="right">
            <h1>Create Account</h1>
            <p>It's free and always will be.</p>

            <table>
                <tr>
                <td>
                    <label>
                        <input type="text" placeholder="First name" class="ipt" name="firstname">
                    </label>
                
                    <label>
                        <input type="text" placeholder="Last name" class="ipt" name="lastname">
                    </label>
                </td>
                </tr>

                <tr>
                    <td colspan="2"><input type="text" placeholder="Mobile Number or Email Address" class="ipt2" name="useraccount"></td>
                </tr>

                <tr>
                    <td colspan="2"><input type="password" placeholder="Enter Password" class="ipt2" name="userpassword"></td>
                </tr>

                <tr>
                    <td><p class="bd"><b>Birthday</b></p></td>
                </tr>

                <!-- ... (other HTML code) ... -->
<tr>
    <td>
        <select class="dropdown" name="bday">
            <option value="">Day</option>
            <?php
            for ($bday = 1; $bday <= 31; $bday++) {
                echo "<option value=\"$bday\">$bday</option>";
            }
            ?>
        </select>

        <select class="dropdown" name="bmonth">
            <option value="">Month</option>
            <?php
            for ($bmont = 1; $bmont <= 12; $bmont++) {
                echo "<option value=\"$bmont\">$bmont</option>";
            }
            ?>
        </select>

        <select class="dropdown" name="byear">
            <option value="">Year</option>
            <?php
            for ($byear = 2023; $byear >= 1000; $byear--) {
                echo "<option value=\"$byear\">$byear</option>";
            }
            ?>
        </select>
    </td>
</tr>


                <tr>
                    <td>
                      <label>
                        <input class="rb" type="radio" name="gender" value="male"> Male
                      </label>
                    
                      <label>
                        <input class="rb" type="radio" name="gender" value="female"> Female
                      </label>
                    </td>
                </tr>

                <tr >
                    <td>
                        <p class="ft">People who use our service may have uploaded your contact information to Online Auction.<br> <a href="">Learn more</a>.</p>
                    </td>
                </tr> 
                
                <tr>
                    <td>
                        <p class="ft"> By clicking Sign Up, you agree to our <a href="">Terms</a>, <a href="">Privacy Policy</a> and Cookies Policy. <br>You may receive SMS Notifications from us and can opt out any time. <br></p>
                    </td>
                </tr>

         
            <tr>
            <td>
            <input type="submit" class="btncreate" value="Create New Account" name="create_account">
            </td>
            </tr>
            </table>
        </div>
    </div>
</form>
</body>
</html>
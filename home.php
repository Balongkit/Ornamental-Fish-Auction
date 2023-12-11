<?php

  require_once 'connection.php';
 // Check if the bid form is submitted


// Fetch all products
$sql = "SELECT * FROM product";
$all_product = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="font/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Ecommerce Website</title>
    <style>

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
            margin-top: 3px;
            margin-left: 40px
        }
        
        .login{
            float: right;
            font-family: Arial;
            font-size: 13px;
            color: gold;
            margin-top: 20px;
            margin-right: 40px;
        }
        
        
        .login p{
            margin-left: 10px;
            color: gold;
            font-size: 20px;
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
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            color: gold;
        }
    </style>

</head>
<body>
 
<div class="header-control">

<div class="control-align">

  <div class="control-h1">
    <img src="auctionWithfish.png" alt="">
    </div>
    <div class="login">
        <table>
        <tr>
        <?php
// Start the session
session_start();

// Check if session variables are set
if (isset($_SESSION["firstname"]) && isset($_SESSION["lastname"]) && isset($_SESSION["balance"])) {
    $firstname = $_SESSION["firstname"];
    $lastname = $_SESSION["lastname"];
    $balance = $_SESSION["balance"];

    echo "<p>Hello, $firstname $lastname! <br> amount: $balance</p>" ;
} else {
    // Redirect to the login page if session variables are not set
    //header("Location: page3.php");
    exit();
}
?>
          
        </tr>
        </table>
    </div>

</div>

</div>
    <?php
      include_once 'header.php';

   ?>

   <main>
       <?php
          while($row = mysqli_fetch_assoc($all_product)){
       ?>
       <div class="card">
           <div class="image">
               <img src="<?php echo $row["product_image"]; ?>" alt="">
           </div>
           <div class="caption">
               <p class="rate">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
               </p>
               <p class="product_name"><b>Fish Type:</b> <?php echo $row["product_name"];  ?></p>
               <p class="product_variaty"><b>Fish Variaty:</b> <?php echo $row["fishvar"];  ?></p>
               <p class="descript"><b>Description:</b> <?php echo $row["descript"];  ?></p>
               <p class="price"><b>Starting bid:</b> Php<?php echo $row["price"]; ?></b></p>
               <p class="increm_bid"><b>Increment bid:</b> Php<?php echo $row["increm_bid"]; ?></b></p>
               <p class="bo"><b>BuyOut:</b>
               <button class="bo"> Php<?php echo $row["bo"]; ?></button>
               </p>
               <p class="time"><b>Time:</b> <?php echo $row["time"]; ?></b></p>
               <p class="discount"><b>Bid Amount:</b> Php<?php echo $row["discount"]; ?></p>
           </div>
           <div class="bid">
                <input class= "bid_amount" type="number" name="bid" id="bid" placeholder="Enter amount to bid">
               <input class = "bid_submit" type="submit" value="     Bid     " name="bid_submit">
            </div>
           <button class="add" data-id="<?php echo $row["product_id"];  ?>">Add to cart</button>
           
       </div>
       <?php

          }
     ?>
   </main>
   <script>
       var product_id = document.getElementsByClassName("add");
       for(var i = 0; i<product_id.length; i++){
           product_id[i].addEventListener("click",function(event){
               var target = event.target;
               var id = target.getAttribute("data-id");
               var xml = new XMLHttpRequest();
               xml.onreadystatechange = function(){
                   if(this.readyState == 4 && this.status == 200){
                       var data = JSON.parse(this.responseText);
                       target.innerHTML = data.in_cart;
                       document.getElementById("badge").innerHTML = data.num_cart + 1;
                   }
               }

               xml.open("GET","connection.php?id="+id,true);
               xml.send();
            
           })
       }

   </script>
</body>
</html>
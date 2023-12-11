<?php

require_once 'connection.php';

if(isset($_POST["submit"])){
  $productname = $_POST["productname"];
  $price = $_POST["price"];
  $discount = $_POST["discount"];
  $fishvar = $_POST["fishvar"];
  $descript = $_POST["descript"];
  $increm_bid = $_POST["increm_bid"];
  $bo = $_POST["bo"];
  $time = isset($_POST["time"]) ? date("H:i:s", strtotime($_POST["time"])) : "default_time_value";

  


//this one is added in this script
  $upload_dir = "uploads/";
// Ensure the directory exists or create it
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

ini_set('upload_max_filesize', '10M'); // Set maximum file size
ini_set('post_max_size', '10M');       // Set maximum POST size



  //For uploads photos
  $upload_dir = "uploads/"; //this is where the uploaded photo stored
  $product_image = $upload_dir.$_FILES["imageUpload"]["name"];
  $upload_file = $upload_dir.basename($_FILES["imageUpload"]["name"]);
  $upload_dir.$_FILES["imageUpload"]["name"];
  $imageType = strtolower(pathinfo($upload_file,PATHINFO_EXTENSION)); //used to detected the image format
  $check = $_FILES["imageUpload"]["size"]; // to detect the size of the image
  $upload_ok = 0;




  
  if(file_exists($upload_file)){
      echo "<script>alert('The file already exist')</script>";
      $upload_ok = 0;
  }else{
      $upload_ok = 1;
      if($check !== false){
        $upload_ok = 1;
        if($imageType == 'jpg' || $imageType == 'png' || $imageType == 'jpeg' || $imageType == 'gif'){
            $upload_ok = 1;
        }else{
            echo '<script>alert("please change the image format")</script>';
        }
      }else{
          echo '<script>alert("The photo size is 0 please change the photo ")</script>';
          $upload_ok = 0;
      }
  }

  if($upload_ok == 0){
     echo '<script>alert("sorry your file is doesn\'t uploaded. Please try again")</script>';
  }else{

    if ($productname != "" && $price != "") {
        move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $upload_file);


        /*$sql = "INSERT INTO product(product_name,price,discount,product_image, fishvar, descript, increm_bid, bo, time)
          VALUES('$productname',$price,$discount,'$product_image', '$fishvar', $descript, '$increm_bid', '$bo', '$time')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('your product uploaded successfully')</script>";
      /*if($productname != "" && $price !=""){
          move_uploaded_file($_FILES["imageUpload"]["tmp_name"],$upload_file);

          $sql = "INSERT INTO product(product_name,price,discount,product_image, fishvar, increm_bid, bo, time)
          VALUES('$productname',$price,$discount,'$product_image', '$fishvar', '$increm_bid', '$bo', '$time')";

          if($conn->query($sql) === TRUE){
              echo "<script>alert('your product uploaded successfully')</script>";
          }*/
          // Assuming $conn is your database connection

$sql = "INSERT INTO product(product_name, price, discount, product_image, fishvar, descript, increm_bid, bo, time)
VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

// Bind parameters
$stmt->bind_param("sddssssss", $productname, $price, $discount, $product_image, $fishvar, $descript, $increm_bid, $bo, $time);

// Execute the statement
if ($stmt->execute()) {
echo "<script>alert('Your product uploaded successfully')</script>";
} else {
echo "<script>alert('Error uploading product')</script>";
}

// Close the statement
$stmt->close();

      }
  }


  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="upload.css">
    
  
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
    <section id="upload_container">
        <form action="upload.php" method="POST" enctype="multipart/form-data" >
            <!--input type="text" name="fishtype" id="fishtype" placeholder="Fish Type" required>
            <input type="text" name="fishvar" id="fishvar" placeholder="Fish Variaty" required-->
            <label for="fish-type">Choose a fish type:</label>
                <select name = "productname" class="fishtype" id="fish-type" onchange="showVarieties()">
                    <option value="fishType" disabled selected>Select Fish Type</option>
                    <option value="Goldfish">Goldfish</option>
                    <option value="Koi">Koi</option>
                    <option value="Betta">Betta</option>
                    <option value="Guppy">Guppy</option>
                    <option value="Molly">Molly</option>
                    <option value="Monster">Monster Fish</option>
                </select>

                    <div id="varieties-dropdown" style="display:none;">
                    <label for="fish-variety">Choose a variety:</label>
                <select class="fishtype" id="fish-variety" name = "fishvar">
                        <!-- Varieties will be populated dynamically using JavaScript -->
                        
                </select>
                    </div>

                <script src="script.js"></script>
                
            <input type="text" name="descript" id="descript" placeholder="Enter Description" required>
            <input type="number" name="price" id="starting_bid" placeholder="starting bid" required>
            <input type="number" name="increm_bid" id="increm_bid" placeholder="Increment bid" required>
            <input type="number" name="bo" id="bo" placeholder="Buy Out" required>
            <input type="time" name="time" id="time" placeholder="Bid time limit" required>
            <input type="number" name="discount" id="bid_amount" placeholder="Amount bidded">
            <input type="file" name="imageUpload" id="imageUpload" required hidden>
            <button id="choose" onclick="upload();">Choose Image</button>
            <input type="submit" value="Upload" name="submit">
        </form>
    </section>

    <script>
        var productname = document.getElementById("productname");
        var price = document.getElementById("price");
        var discount = document.getElementById("discount");
        var choose = document.getElementById("choose");
        var uploadImage = document.getElementById("imageUpload");

        function upload(){
            uploadImage.click();
        }

        uploadImage.addEventListener("change",function(){
            var file = this.files[0];
            if(productname.value == ""){
                productname.value = file.name;
            }
            choose.innerHTML = "You can change("+file.name+") picture";
        })
    </script>
</body>
</html>
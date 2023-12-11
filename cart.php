<?php

require_once 'connection.php';

$sql_cart = "SELECT * FROM cart";
$all_cart = $conn->query($sql_cart);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="font/css/all.min.css">
    <!--link rel="stylesheet" href="cart.css"-->
    <title>In cart products</title>

    <style>
        *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    text-decoration: none;
    color: black;
}

html{
    font-size: 62.5%;
}

main{
    max-width: 1500px;
    width: 80%;
    margin: 30px auto;
    display: flex;
    flex-direction: column;
}


main .card{
    height:  150px;
    border: 1px solid lightgray;
    margin: 20px;
    display: flex;
}

main .card .images{
    width: 20%;
}

main .card .images img{
    width: 100%;
    height: 100%;
    object-fit: cover;
}

main .card .caption{
  line-height: 2em;
  margin-left: 30px;
  position: relative;
  width: 75%;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

main .card .caption p{
    font-size: 1.5rem;
}

del{
    text-decoration: line-through;
}

main .card .caption .rate{
    display: flex;
}

main .card .caption .rate i{
    color: gold;
    margin-left:  2px;
}

main .card .caption .price{
    position: absolute;
    top: 5%;
    right: 5%;
}

main .card .caption .remove{
    background-color: red;
    color: white;
    padding: 1em;
    border: none;
    outline: none;
    cursor: pointer;
    border-radius: 3px;
    margin-top: 2em;
    font-weight: bold;
    width: 30%;
    position: absolute;
    top: 5%;
    right: 5%;
}
    </style>

</head>
<body>
    <?php
       include_once 'header.php';

    ?>

    <main>
        <h1><?php echo mysqli_num_rows($all_cart); ?> Items</h1>
        <hr>
        <?php
          while($row_cart = mysqli_fetch_assoc($all_cart)){
              $sql = "SELECT * FROM product WHERE product_id=".$row_cart["product_id"];
              $all_product = $conn->query($sql);
              while($row = mysqli_fetch_assoc($all_product)){
        ?>
        <div class="card">
            <div class="images">
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
               <p class="price"><b>Starting bid:</b> Php<?php echo $row["price"]; ?></b></p>
               <p class="increm_bid"><b>Increment bid:</b> Php<?php echo $row["increm_bid"]; ?></b></p>
               <p class="bo"><b>BuyOut:</b>
               <button class="bo"> Php<?php echo $row["bo"]; ?></button>
               </p>
               <p class="time"><b>Time:</b> <?php echo $row["time"]; ?></b></p>
               <p class="discount"><b>Bid Amount:</b> Php<?php echo $row["discount"]; ?></p>

                <!--p class="product_name"><//?php echo $row["product_name"]; ?></p>
                <p class="price"><b>$<//?php echo $row["price"]; ?></b></p>
                <p class="discount"><b><del>$<//?php echo $row["discount"]; ?></del></b></p-->
                <button class="remove" data-id="<?php echo $row["product_id"]; ?>">Remove from Cart</button>
            </div>
        </div>
        <?php

          }
        }
       ?>
    </main>

    <script>
        var remove = document.getElementsByClassName("remove");
        for(var i = 0; i<remove.length; i++){
            remove[i].addEventListener("click",function(event){
                var target = event.target;
                var cart_id = target.getAttribute("data-id");
                var xml = new XMLHttpRequest();
                xml.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){
                       target.innerHTML = this.responseText;
                       target.style.opacity = .3;
                    }
                }

                xml.open("GET","connection.php?cart_id="+cart_id,true);
                xml.send();
            })
        }
    </script>
</body>
</html>
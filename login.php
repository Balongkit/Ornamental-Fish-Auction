<?php
// Include your database connection file (modify the path accordingly)
include("connection.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {

    // Retrieve form data
    $useraccount = isset($_POST["useraccount"]) ? $_POST["useraccount"] : "";
    $userpassword = isset($_POST["userpassword"]) ? $_POST["userpassword"] : "";

    // Validate and sanitize user input to prevent SQL injection
    $useraccount = mysqli_real_escape_string($conn, $useraccount);
    $userpassword = mysqli_real_escape_string($conn, $userpassword);

    // Query the database to check if the user exists
    $sql = "SELECT firstname, lastname, balance FROM page11 WHERE account = '$useraccount'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, fetch the user's information
        $row = $result->fetch_assoc();

        // Store user information in session variables
        session_start();
        $_SESSION["firstname"] = $row["firstname"];
        $_SESSION["lastname"] = $row["lastname"];
        $_SESSION["balance"] = $row["balance"];

        // Redirect to page3.php
        header("Location: home.php");
        exit();
    } else {
        // User not found or invalid credentials, handle accordingly
        echo "Invalid email or number or password";
    }

    // Close the database connection
    $conn->close();
} elseif (isset($_POST['login'])) {
    // Retrieve form data
    $useraccount = $_POST['useraccount'];
    $userpassword = $_POST['userpassword'];

    // Validate and sanitize user input to prevent SQL injection
    $useraccount = mysqli_real_escape_string($conn, $useraccount);
    $userpassword = mysqli_real_escape_string($conn, $userpassword);

    // Query to check if the user exists in the database
    $sql = "SELECT * FROM page11 WHERE account = ? AND password = ?";
    
    // Use prepared statement
    $stmt = mysqli_prepare($conn, $sql);
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt, 'ss', $useraccount, $userpassword);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Store the result
    $result = mysqli_stmt_get_result($stmt);

    // Check if a row is returned (login successful)
    if ($row = mysqli_fetch_assoc($result)) {
        // Login successful! Redirect to page2.php
        echo "<script>alert('Login successful!'); window.location.href='page3.php';</script>";
        exit(); // Ensure that no further code is executed after the redirect
    } else {
        echo "<script>alert('Login failed. Incorrect email or number and password.'); window.location.href='page1.php';</script>";
    }

    // Close the statement
    mysqli_stmt_close($stmt);

    // Close the database connection
    mysqli_close($conn);
}
?>



<!--?php
// Include your database connection file (modify the path accordingly)
include("connection.php");

// Check if the form is submitted
if(isset($_POST['login'])) {

    // Retrieve form data
    $useraccount = $_POST['useraccount'];
    $userpassword = $_POST['userpassword'];

    // Validate and sanitize user input to prevent SQL injection
    $useraccount = mysqli_real_escape_string($conn, $useraccount);
    $userpassword = mysqli_real_escape_string($conn, $userpassword);

    // Query to check if the user exists in the database
    $sql = "SELECT * FROM page11 WHERE account = ? AND password = ?";
    
    // Use prepared statement
    $stmt = mysqli_prepare($conn, $sql);
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt, 'ss', $useraccount, $userpassword);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Store the result
    $result = mysqli_stmt_get_result($stmt);

    // Check if a row is returned (login successful)
    if ($row = mysqli_fetch_assoc($result)) {
        // Login successful! Redirect to page2.php
        echo "<script>alert('Login successful!'); window.location.href='page3.php';</script>";
        exit(); // Ensure that no further code is executed after the redirect
    } else {
        echo "<script>alert('Login failed. Incorrect email or number and password.'); window.location.href='page1.php';</script>";
    }

    // Close the statement
    mysqli_stmt_close($stmt);

    // Close the database connection
    mysqli_close($conn);
}
?>

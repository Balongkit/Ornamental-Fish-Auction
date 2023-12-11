<?php
// Include your database connection file (modify the path accordingly)
include("connection.php");

// Check if the form is submitted
if(isset($_POST['create_account'])) {

    // Retrieve form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $useraccount = $_POST['useraccount'];
    $userpassword = $_POST['userpassword'];
    $bday = isset($_POST['bday']) ? $_POST['bday'] : '';
    $bmonth = isset($_POST['bmonth']) ? $_POST['bmonth'] : '';
    $byear = isset($_POST['byear']) ? $_POST['byear'] : '';
    $gender = $_POST['gender'];

    // Check if the email already exists
    $checkEmailQuery = "SELECT * FROM page11 WHERE account = ?";
    $checkEmailStmt = mysqli_prepare($conn, $checkEmailQuery);
    mysqli_stmt_bind_param($checkEmailStmt, 's', $useraccount);
    mysqli_stmt_execute($checkEmailStmt);
    mysqli_stmt_store_result($checkEmailStmt);

    if (mysqli_stmt_num_rows($checkEmailStmt) > 0) {
        // Email already exists, show an error message
        echo "Error: Email already exists";
        // Redirect back to page1 after a short delay
        header("refresh:3;url=page1.php");
    } else {
        // Email is unique, proceed with the insertion
        $insertQuery = "INSERT INTO page11 (firstname, lastname, account, password, bday, bmonth, byear, gender) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $insertStmt = mysqli_prepare($conn, $insertQuery);
        mysqli_stmt_bind_param($insertStmt, 'ssssssss', $firstname, $lastname, $useraccount, $userpassword, $bday, $bmonth, $byear, $gender);

        if(mysqli_stmt_execute($insertStmt)) {
            // Record inserted successfully
            echo "Record inserted successfully";
            // Redirect back to page1 after a short delay
            header("refresh:3;url=page1.php");
        } else {
            // Error
            echo "Error: " . mysqli_stmt_error($insertStmt);
            // Redirect back to page1 after a short delay
            header("refresh:3;url=page1.php");
        }

        // Close the insertion statement
        mysqli_stmt_close($insertStmt);
    }

    // Close the email check statement
    mysqli_stmt_close($checkEmailStmt);

    // Close the database connection
    mysqli_close($conn);
}
?>


<!--?php
// Include your database connection file (modify the path accordingly)
include("connection.php");

// Check if the form is submitted
if(isset($_POST['create_account'])) {

    // Retrieve form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $useraccount = $_POST['useraccount'];
    $userpassword = $_POST['userpassword'];
     // Check if the keys exist before accessing them
     $bday = isset($_POST['bday']) ? $_POST['bday'] : '';
     $bmonth = isset($_POST['bmonth']) ? $_POST['bmonth'] : '';
     $byear = isset($_POST['byear']) ? $_POST['byear'] : '';
     
     $gender = $_POST['gender'];
 

     $sql = "INSERT INTO page11 (firstname, lastname, account, password, bday, bmonth, byear, gender) 
     VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

// Use prepared statement
$stmt = mysqli_prepare($conn, $sql);

// Bind parameters
mysqli_stmt_bind_param($stmt, 'ssssssss', $firstname, $lastname, $useraccount, $userpassword, $bday, $bmonth, $byear, $gender);

// Execute the statement
if(mysqli_stmt_execute($stmt)) {
 // Record inserted successfully
 echo "Record inserted successfully";
 // Redirect back to page1 after a short delay
 header("refresh:3;url=page1.php");
} else {
 // Error
 echo "Error: " . mysqli_stmt_error($stmt);
 // Redirect back to page1 after a short delay
 header("refresh:3;url=page1.php");
}

// Close the statement
mysqli_stmt_close($stmt);

}
?>

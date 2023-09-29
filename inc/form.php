<?php

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];

if (isset($_POST['submit'])) {

    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname =  mysqli_real_escape_string($conn, $_POST['lastname']);
    $email =     mysqli_real_escape_string($conn, $_POST['email']);



    $sql = "INSERT INTO users(firstname, lastname, email) VALUES ('$firstname', '$lastname', '$email')";

    if(empty($firstname)){
        echo 'يرجى ادخال الاسم الاول';
    } 
    elseif(empty($lastname)){
        echo 'يرجى ادخال الاسم الاخير';
    } 
    elseif(empty($email)){
        echo 'يرجى ادخال الايميل';
    } 
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo 'يرجى ادخال ايميل صحيح';
    } 
    
    
    else{

    if (mysqli_query($conn, $sql)){
        header('location: index.php');
    } else{
        echo 'error: ' . mysqli_error($conn);
    }
}


}

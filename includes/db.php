<?php

$conn = new mysqli("localhost", "root", "", "flickspree");

if ($conn->connect_error) {
    echo "<script> alert('Connection unsuccessful'); </script>";
} 
//else {
//     echo "<script> alert('Connection successful'); </script>";
// }

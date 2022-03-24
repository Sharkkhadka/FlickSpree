<?php

include('includes/db.php');

session_start();

// unset = remove all the values from session variable
session_unset();

// destroy all the sessions

session_destroy();

header('location: index.php');

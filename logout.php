<?php

session_start();
session_unset();
session_destroy();

header("Location: Sign-up.php");
die();
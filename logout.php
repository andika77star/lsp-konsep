<?php
require_once 'init.php';

    session_unset();
    session_destroy();
    header("location: login.php");

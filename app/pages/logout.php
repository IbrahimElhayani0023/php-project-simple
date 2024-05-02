<?php
if(!empty($_SESSION['user']))
session_destroy();
header("location:home");
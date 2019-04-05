<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <?php $this->load->view('components/assets') ?>
    <style>
        .logo-navbar{
            width:47px;
            height:47px
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php $this->load->view('components/navigator') ?>
</body>
</html>
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
    <?php $this->load->view('components/navigator');?>
</head>
<body>
    <?php
        if($this->session->userdata('login')==1){
            $notification = $this->session->flashdata('notification');
            if($notification==1){}
        }
?>
    
</body>
</html>
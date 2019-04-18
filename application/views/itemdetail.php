<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title><?php  ?></title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <?php 
    $this->load->view('components/assets'); 
        $this->load->view('components/navigator') ;
    ?>
    <style>
        .container{
            height:100vh;
            margin-top:5em;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col" > 
                <img src="<?php echo $image ?>" class="img-fluid rounded gambar">
            </div>
            <div class="col" >
                <h3><?php echo $name ?></h3>
            </div>
        </div>
    </div>
</body>
</html>
<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rental Equipment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
    <?php $this->load->view('components/assets') ?>
    <?php 
        $this->load->view('components/navigator') ;
    ?>
    <style>
        .container{
            text-align:center;
        }

        .box{
            background:#000;
            color:white;
            width:10px;
        }
        .card{
            margin:4.7px;
        }
        .body{
            margin:3.2;
            text-align:left
        }
    </style>
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col title">
                <h1>Rental Mobil</h1>
            </div>
        </div>
        <div class="row"><?php
            foreach($products as $product){
                ?>
                <a style="text-decoration:none" href="http://www.google.com">
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo $product['image'] ?>" class="card-img-top" alt="...">
                        <div class="body">
                            <h5><?php echo $product['name'] ?></h5>
                            <p><?php echo 'Rp '.number_format($product['price']) ?><p>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>
    
</body>
</html>
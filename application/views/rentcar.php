<!DOCTYPE html>
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
            margin-bottom:17px;
            margin-top:17px;
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
        .card:hover{
            -webkit-box-shadow: 5px 4px 23px -11px rgba(51,51,51,0.79);
            -moz-box-shadow: 5px 4px 23px -11px rgba(51,51,51,0.79);
            box-shadow: 5px 4px 23px -11px rgba(51,51,51,0.79);
            transition-duration: 0.6s;
        }
        .ukuran{
            height:30rem;
            overflow:hidden;
            background:#ddd
        }
    </style>
</head>
<body>
        <div id="carouselExampleControls" class="carousel slide ukuran" data-ride="carousel">
                        <?php  
                            $img = array();
                            foreach($products as $product){
                                array_push($img,$product['image']);
                            }
                        ?>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo $img[0]; ?>" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item ">
                                <img src="<?php echo $img[1]; ?>" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item ">
                                <img src="..." class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon bd-dark" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon bd-dark" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
    <div class="container">
        <div class="row">
            
        </div>
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
    <?php
        $this->load->view('/components/footer');
    ?>
    
</body>
</html>
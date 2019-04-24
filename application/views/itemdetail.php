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
        .container1{
            height:100vh;
            margin-top:5em;
        }
        
    </style>
</head>
<body>
        <div class="container container1">
            <div class="row">
                <div class="col" > 
                    <img src="<?php echo $image ?>" class="img-fluid rounded gambar">
                </div>
                <div class="col" >
                    <div class="container rounded" >
                        <div style="padding:5px">
                            <div class="row">
                                <h5><strong><?php echo $name ?></strong></h5>
                            </div>
                            <div class="row">
                                <p>TOTAL <strong><?php echo ' Rp '.number_format($price).', '; ?></strong>for 1 day</p>
                            </div>
                        <?php if($this->session->userdata('login')==1){ ?>
                            <div class="row">
                                <form method='POST' action="<?php echo site_url().'/welcome/order' ?>">
                                    <input type='hidden' name='custId' value="<?php echo $this->session->userdata('id');?>">
                                    <input type='hidden' name='productId' value="<?php echo $id ;?>">
                                    <input type='hidden' name='total' value="<?php echo $price;?>">
                                    <input type='submit' name='submit' value='Order Now' class='btn btn-sm btn-danger'>
                                </form>
                            </div>
                        <?php }else{ ?>
                            <div class="row">
                                <div class="alert alert-danger" role="alert">
                                    <strong>Sans Organizer</strong>
                                    <p>Please login before ordering product</p>
                                </div>
                            </div>
                        <?php } ?>
                        <div>
                    </div>
                </div>
            </div>
        </div>
        
</body>
<?php $this->load->view('components/footer') ; ?>
</html>
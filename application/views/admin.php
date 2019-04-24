<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <style>
           
        @panel-heading-padding-negate: -10px -15px;

        .panel {
            .panel-heading {
                .nav-tabs {
                    margin:@panel-heading-padding-negate;
                    border-bottom-width:0;

                    > li {
                        > a {
                            // re-apply the original padding 
                            padding:@panel-heading-padding;
                            margin-bottom:1px;

                            border:solid 0 transparent;
                            &:hover {
                                border-color: transparent;
                            }


                        }

                        &.active > a {
                            &, 
                            &:hover,
                            &:focused {
                                border:solid 0 transparent;                         
                            }
                        }
                    }
                }
            }
        }

        &:first-child > a { 
                border-top-left-radius:@panel-border-radius;
            }
            &:last-child > a {
                border-top-right-radius:@panel-border-radius;
            }
        ul li{
            padding:5px
        }
        .container{
            width:100%;
        }
    </style>
    <?php
        if($this->session->userdata('type')!=1){
            redirect('/welcome/lost');
        }
        $this->load->view('components/assets');
    ?>
</head>
<body>
    
    
    <div class="panel panel-default" style="padding:7px">
        <div class="panel-heading">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist" style="padding:7px">
                <li class="active"><a href="#dashboard" role="tab" data-toggle="tab">Home</a></li>
                <li><a href="#user" role="tab" data-toggle="tab">User</a></li>
                <li><a href="#transaction" role="tab" data-toggle="tab">Transaction</a></li>
                <li><a href="#product" role="tab" data-toggle="tab">Product</a></li>
            </ul>
    
        </div>
    
        <!-- Tab panes + Panel body -->
        <div class="panel-body tab-content">
            <div class="tab-pane active" id="dashboard">
                Home
            </div>
            <div class="tab-pane" id="user">
                <div class="container" >
                    <h2 style="width:100%;text-align:center">User</h2>
                    
                            <table class="table table-hover" id="tab3">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id </th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Account Number</th>
                                                <th scope="col">E-Mail</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Registered</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <?php  $data = $this->session->flashdata('user') ;
                                            foreach($data as $d){ ?>
                                                <tr>
                                                    <td><?php echo $d['id_user'] ?></td>
                                                    <td><?php echo $d['name'] ?></td>
                                                    <td><?php echo $d['nomor_rekening'] ?></td>
                                                    <td><?php echo $d['email'] ?></td>
                                                    <td><?php echo $d['address'] ?></td>
                                                    <td><?php echo $d['registered'] ?></td>
                                                    <td></td>
                                                </tr>
                                           <?php }
                                        ?>
                                        <tbody>
                                        </tbody>
                            </table>
                    
                </div>
            </div>
            <div class="tab-pane" id="transaction">
                <div class="container" >
                        <h2 style="width:100%;text-align:center">Transaction</h2>
                        
                                <table class="table table-hover" id="tab1">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Id </th>
                                                    <th scope="col">Product Number</th>
                                                    <th scope="col">User</th>
                                                    <th scope="col">TOTAL</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Created</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <?php  $data = $this->session->flashdata('transaction') ;
                                                foreach($data as $d){ ?>
                                                    <tr>
                                                        <td><?php echo $d['id_trasaction'] ?></td>
                                                        <td><?php echo $d['Id_product'] ?></td>
                                                        <td><?php echo $d['id_user'] ?></td>
                                                        <td><?php echo number_format($d['total']) ?></td>
                                                        <td><?php echo $d['status'] ?></td>
                                                        <td><?php echo $d['created'] ?></td>
                                                        <td> 
                                                            <?php if($d['status'] == 'waiting for payment'){ ?>
                                                            <a  class="btn-sm btn-danger " data-toggle="modal" data-target="#verification"  href="">verification payment</a>
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="verification" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <form method='post' action="<?php echo site_url().'/welcome/paymentverification'; ?>">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="LoginLabel">Bukti Transaksi</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    
                                                                                        <div class="form-group row">
                                                                                            <label for="staticEmail" class="col-sm-2 col-form-label"></label>
                                                                                            <div class="col-sm-10">
                                                                                                <input type="text" class="form-control" placeholder="Bukti Transaksi" name='bukti' required>
                                                                                            </div>
                                                                                        </div>
                                                                                        <input type="hidden" class="form-control" name='id' value="<?php echo $d['id_trasaction'] ?>">
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <input type="submit" class="btn btn-sm btn-danger" id="submit" name='submit' value='Publish'>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--end of modal -->  
                                                            <?php }else{ ?>

                                                                Paid
                                                                <?php }?>
                                                        </td>
                                                    </tr>
                                            <?php }
                                            ?>
                                            <tbody>
                                            </tbody>
                                </table>
                        
                    </div>
                </div>
            <div class="tab-pane" id="product">
                <div class="container" >
                            <h2 style="width:100%;text-align:center">Product</h2>
                                    <a  class="btn-sm btn-danger " data-toggle="modal" data-target="#Login"  href="">ADD</a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="Login" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form method='post' action="<?php echo site_url().'/welcome/addproduct'; ?>">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="LoginLabel">Add new product</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        
                                                            <div class="form-group row">
                                                                <label for="staticEmail" class="col-sm-2 col-form-label">Type</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" placeholder="Type" name='type' required>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="staticEmail" class="col-sm-2 col-form-label">Image</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" placeholder="Image" name='image' required>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="staticEmail" class="col-sm-2 col-form-label">Price</label>
                                                                <div class="col-sm-10">
                                                                    <input type="number" class="form-control" placeholder="Price" name='price' required>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="staticEmail" class="col-sm-2 col-form-label">Owner</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" placeholder="Owner" name='owner' required>
                                                                </div>
                                                            </div>
                                                           
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="submit" class="btn btn-sm btn-danger" id="submit" name='submit' value='Add new product'>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end of modal -->  
                                    <table class="table table-hover" id="tab2" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Product Number </th>
                                                        <th scope="col">Type</th>
                                                        <th scope="col">Image</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Owner</th>
                                                        <th scope="col">Created</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <?php  $data = $this->session->flashdata('product') ;
                                                    foreach($data as $d){ ?>
                                                        <tr>
                                                            <td><?php echo $d['id_product'] ?></td>
                                                            <td><?php echo $d['name'] ?></td>
                                                            <td><img src="<?php echo $d['image'] ?>" class="img-thumbnail rounded float-left" alt="..." style="width:200px;height:127px"></img></td>
                                                            <td><?php echo number_format($d['price']) ?></td>
                                                            <td><?php echo $d['pemilik'] ?></td>
                                                            <td><?php echo $d['created'] ?></td>
                                                            <td><a class="btn-sm btn-danger" href=" " style="margin:2px">edit</a><a class="btn-sm btn-danger" href=" " style="margin:2px">delete</a></td>
                                                        </tr>
                                                <?php }
                                                ?>
                                                <tbody>
                                                </tbody>
                                    </table>
                            </div>
                        </div>
                    
            </div>
    </div>
    <script>
    $(document).ready( function () {
        $('#tab1').DataTable();
    } );
    $(document).ready( function () {
        $('#tab2').DataTable();
    } );
    $(document).ready( function () {
        $('#tab3').DataTable();
    } );
    </script>
    <?php
        if($this->session->userdata('type')!=1){
            redirect('/welcome/lost');
        }
        $this->load->view('components/assets');
    ?>
</body>
</html>
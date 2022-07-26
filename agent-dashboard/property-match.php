<?php
include('config.php');
include('session.php');

$query = "SELECT * FROM tbl_property_sell  ";
$conditions = $SM = array();

if ((isset($_GET['property_type']) != '') ||  (isset($_GET['budget']) != '') || (isset($_GET['address']) != '')  ||  (isset($_GET['city']) != '')) {

    $property_type = $_GET['property_type'];
    $city = $_GET['city'];
     
    // $minimum = slug($_GET['budget']) - 300000;
    // $maximum = slug($_GET['budget']) + 300000;
    $maximum = $_GET['budget'] + (($_GET['budget'] *15)/100);
    // echo $maximum;
    $minimum = $_GET['budget'] - (($_GET['budget'] *15)/100);
    // echo $minimum;
    $address = $_GET['address'];
    if (isset($_GET['property_type']) != '') {
        $conditions[] = " `property_type` = '$property_type'";
    }
    

    if (isset($_GET['address']) != '') {
        
        $add = explode( ',', $_GET['address'] );
        
        foreach($add as $k){
            
         $SM[] =   "`area`  Like ('%" . $k . "%') "; 
         
        // $SM .=   "`area`  IN ('%" . $k . "%')  OR   ";
        
        }
            
     
     $conditions[] = implode( $SM , ' OR ' ) ;
         
            
      
    }

    if (isset($_GET['city']) != '') {
        $conditions[] = "  `city` =  '$city'";
    }

    
    if (($minimum != '') && ($maximum != '')) {
        $conditions[] = "   `property_price` BETWEEN  $minimum AND $maximum ";
    }
    if (($minimum != '') && ($maximum == '')) {
        $conditions[] = "  `property_price` >=  $minimum";
    }
    if (($minimum == '') && ($maximum != '')) {
        $conditions[] = "  `property_price` <=  $maximum";
    }
    if (count($conditions) > 0) {
        $query .= " WHERE " . implode(' AND ', $conditions);
    }
    // echo $query;
        // exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Shubham Property: Buy/Sale/Rent Top Residential, Commercial Properties in India</title>
    <?php include 'header-link.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body class="skin-default fixed-layout">

    <div id="main-wrapper">
        <?php include 'header.php'; ?>

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Matched Property List</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <!--<ol class="breadcrumb justify-content-end">-->
                            <!--    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>-->
                            <!--    <li class="breadcrumb-item active">Seller</li>-->

                            <!--</ol>-->
                            <!-- <a href="saller-add.php" type="button" class="btn btn-info d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle"></i> Add Seller</a> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $i = 0;

                    $pro = mysqli_query($con, $query);
                    if(mysqli_num_rows($pro) > 0){
                    while ($property = mysqli_fetch_array($pro)) {
                        $i = $i + 1;

                        $list_img = mysqli_query($con, "SELECT * FROM `tbl_property_image` WHERE `pro_id` = '" . $property['sell_id'] . "' GROUP BY `pro_id`");
                        $img = mysqli_fetch_array($list_img);

                        $ptype = mysqli_query($con, "SELECT * FROM `tbl_property_type` WHERE `type_id` = '" . $property['property_type'] . "' ");
                        $type = mysqli_fetch_array($ptype);


                        $sal = mysqli_query($con, "SELECT * FROM `tbl_state` WHERE `state_id` = '" . $property['state'] . "' ");
                        $row = mysqli_fetch_array($sal);

                        $loc = mysqli_query($con, "SELECT * FROM `tbl_city` WHERE `city_id` = '" . $property['city'] . "' ");
                        $city = mysqli_fetch_array($loc);

                        $realtor = mysqli_query($con, "SELECT * FROM `tbl_agent` WHERE `agent_id` = '" . $property['ba_id'] . "'");
                        $age = mysqli_fetch_array($realtor);
                    ?>

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-row">
                                        <div class="">
                                            <img src="images/property/<?= $img['image']  ?>" alt="<?= $property['property_name'] ?>" class="img-circle" height="70" width="70" />

                                        </div>
                                        <div class="p-l-20">
                                            <a href="property-details.php?id=<?= base64_encode($property['sell_id']) ?>">
                                                <h5 class="font-light"><?= wordwrap($property['property_name'], 30, '<br>') ?></h5>
                                            </a>
                                            <h6>
                                                <?= (($property['status'] == '4') ? '<span class="badge text-capitalize font-weight-normal fs-12 btn btn-success">Complete</span>' : (($property['status'] == '1') ? '<span class="badge text-capitalize font-weight-normal fs-12 btn btn-info">New</span>' : '<span class="badge text-capitalize font-weight-normal fs-12 btn btn-warning">Pending</span>')); ?>

                                                <?= (($property['approval'] == '1') ? '<span class="badge text-capitalize font-weight-normal fs-12 btn btn-success">Approved</span>' : '<span class="badge text-capitalize font-weight-normal fs-12 btn btn-danger">Not Approved </span>'); ?>
                                            </h6>

                                            <a href="<?= $base_url ?>property-detail.php?id=<?= $property['sell_id'] ?>" class="badge btn-success text-white" target="_blank">
                                                 Website View</a>
                                            <a href="property-edit.php?id=<?= base64_encode($property['sell_id']) ?>" class=" fs-12 badge btn-dark">Edit</a>
                                        </div>
                                    </div>
                                    <div class="row m-t-40">
                                        <div class="col b-r text-center">
                                            <h5 class="font-light"><?= date_format(date_create($property['create_date']), "d M Y") ?></h5>
                                            <h6>Create date</h6>
                                        </div>
                                        <div class="col b-r text-center">
                                            <h5 class="font-light"><?= $type['type'] ?></h5>
                                            <h6>Type</h6>
                                        </div>
                                        <div class="col text-center">
                                            <h5 class="font-light">Rs.<?= $property['property_price'] ?>/-</h5>
                                            <h6>Price</h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row m-t-20">

                                        <div class="col b-r text-center">
                                            <h5 class="font-light "><?= $property['transaction_type'] ?></h5>
                                            <h6>Transaction Type</h6>
                                        </div>
                                        <div class="col b-r text-center">
                                            <h5 class="font-light"><?= $row['state_name'] ?></h5>
                                            <h6>State</h6>
                                        </div>
                                        <div class="col b-r text-center">
                                            <h5 class="font-light"><?= $city['city_name'] ?></h5>
                                            <h6>City</h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row m-t-20">


                                        <div class="col-md-4 b-r text-center">
                                            <img src="<?= (($age['agent_image'] == '') ? $base_url . 'images/user.jpg'  : $base_url . 'dashboard/images/agents/' . $age['agent_image'] . ' ') ?>" alt="<?= $age['agent_name'] ?>" style="width:50px">
                                        </div>
                                        <div class="col-md-8  b-r text-center">
                                            <h4 class="font-light"><a href="realtor-details.php?id=<?= base64_encode($age['agent_id']); ?>"><?= $age['agent_name'] ?></a></h4>
                                            <h4><span><i class="lni-phone-handset"></i><?= $age['agent_phone'] ?></span></h4>
                                        </div>


                                    </div>
                                </div>
                                <div>

                                </div>

                            </div>
                        </div>

                    <?php
                    }
                    }else
                    {
                        echo 'No matched property found';
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>


    <?php include 'footer.php'; ?>
    </div>
    <?php include 'footer-link.php'; ?>

    <script>
        $('#find').click(function() {

            findlead();

        });

        function findlead() {
            var status = $('#lead_status').val();

            //alert(status);

            $.ajax({
                url: "ajax/Seller_list.php",
                method: "POST",
                data: {

                    status: status,


                },
                success: function(data) {
                    console.log(data);
                    $('#data').html(data);
                    //location.reload();

                }
            });
        }
        findlead();
    </script>

</body>

</html>
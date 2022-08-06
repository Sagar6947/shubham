<?php
include('config.php');


if (isset($_POST['bsubmit'])) {

    $grand_total = $_POST['grand_total'];
    $quantity = $_POST['cartstr'];
    $name = $_POST['name'];
    $user_id = $_POST['user_id'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $number = $_POST['number'];

    $pincode = $_POST['pincode'];

 if ($total_price == 0) {
        echo '<script>alert("Your Cart is Empty");</script>';
    } else {

        $que = "INSERT INTO `checkout`( `user_id`, `name`, `number`, `email`,   `pincode`, `address`,  `grand_total`  ,`cart`) VALUES ('" . $user_id . "','" . $name  . "','" . $number . "','" . $email . "','" . $pincode . "','" . $address . "','" . $grand_total . "','" . $quantity . "')";

        $insert = mysqli_query($con, $que);
        $update = mysqli_query($con, "UPDATE `tbl_user` SET `address`= '$address' , `pincode`= '$pincode' WHERE `uid` =  '" . $user_id . "'  ");

        $last_id = mysqli_insert_id($link);


        $_SESSION['purid'] = $last_id;
        $data['company'] = "Wholesale kiranawala";
        $data['title']              = 'Checkout payment ';
        $data['currency_code']      = 'INR';
        $data['grandtotal']         = (int)$this->input->post('grand_total');
        $data['name']               = $this->input->post('name');
        $data['email']              = $this->input->post('email');
        $data['number']             = $this->input->post('number');
        $data['callback_url']       = base_url() . '/Index/callback';
        $data['surl']               = base_url() . '/Index/success';
        $data['furl']               = base_url() . '/Index/failed';
        $data['product']             = $post;
        $this->load->view('checkout', $data);
    }
}

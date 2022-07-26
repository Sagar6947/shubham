<?php

include 'config.php';
include 'session.php';

$tag = $_GET['tag'];

if ($tag == 'agent') {
    $i = $_GET['id'];
    $er = "SELECT * FROM `tbl_agent` WHERE `agent_id` = '" . $i . "'";
    $pro = mysqli_query($con, $er);
    $age = mysqli_fetch_array($pro);
    unlink('images/agents/' . $age['image']);


    $s = mysqli_query($con, "DELETE FROM `tbl_agent` WHERE `agent_id` = '" . $i . "'");

    echo '<script>window.location="agent-list.php"</script>';
}


if ($tag == 'Service') {
    $i = $_GET['id'];
    $er = "SELECT * FROM `tbl_service` WHERE `sid`  = '" . $i . "'";
    $pro = mysqli_query($con, $er);
    $age = mysqli_fetch_array($pro);
    unlink('images/service/' . $age['image']);
    $s = mysqli_query($con, "DELETE FROM `tbl_service` WHERE `sid`  = '" . $i . "'");
    echo '<script>window.location="service.php"</script>';
}

if ($tag == 'client') {
    $i = $_GET['id'];
    $er = "SELECT * FROM `tbl_client` WHERE `id`  = '" . $i . "'";
    $pro = mysqli_query($con, $er);
    $age = mysqli_fetch_array($pro);
    unlink('images/client/' . $age['image']);
    $s = mysqli_query($con, "DELETE FROM `tbl_client` WHERE `id`  = '" . $i . "'");
    echo '<script>window.location="clients.php"</script>';
}

if ($tag == 'Team') {
    $i = $_GET['id'];
    $er = "SELECT * FROM `tbl_team` WHERE `id`  = '" . $i . "'";
    $pro = mysqli_query($con, $er);
    $age = mysqli_fetch_array($pro);
    unlink('images/team/' . $age['image']);
    $s = mysqli_query($con, "DELETE FROM `tbl_team` WHERE `id`  = '" . $i . "'");
    echo '<script>window.location="team.php"</script>';
}

if ($tag == 'newservice') {
    $i = $_GET['id'];
    $er = "SELECT * FROM `new_service` WHERE `nsid`  = '" . $i . "'";
    $pro = mysqli_query($con, $er);
    $age = mysqli_fetch_array($pro);
    unlink('images/newservice/' . $age['image']);
    $s = mysqli_query($con, "DELETE FROM `new_service` WHERE `nsid`  = '" . $i . "'");
    echo '<script>window.location="new-service.php"</script>';
}


if ($tag == 'main_category') {
    $i = $_GET['id'];
    
    $s = mysqli_query($con, "DELETE FROM `tbl_category` WHERE `cid`  = '" . $i . "'");
    $pro = mysqli_query($con, $s);
    echo '<script>window.location="main-category.php"</script>';
}


if ($tag == 'sub_category') {
    $i = $_GET['id'];
    $s = mysqli_query($con, "DELETE FROM `tbl_sub_category` WHERE `sid`  = '" . $i . "'");
    $pro = mysqli_query($con, $s);
    echo '<script>window.location="sub-category.php"</script>';
}

if ($tag == 'gallery') {
    $i = $_GET['id'];
    $er = "SELECT * FROM `tbl_gallery` WHERE `gid`  = '" . $i . "'";
    $pro = mysqli_query($con, $er);
    $age = mysqli_fetch_array($pro);
    unlink('images/gallery/' . $age['image']);
    $s = mysqli_query($con, "DELETE FROM `tbl_gallery` WHERE `gid`  = '" . $i . "'");
    echo '<script>window.location="gallery.php"</script>';
}


if ($tag == 'ameneties') {
    $i = $_GET['id'];
    $s = mysqli_query($con, "DELETE FROM `tbl_amenities` WHERE `ami_id` = '" . $i . "'");
    echo '<script>window.location="ameneties.php"</script>';
}

if ($tag == 'testimonial') {
    $i = $_GET['id'];
    $s = mysqli_query($con, "DELETE FROM `tbl_testimonials` WHERE `tstid` = '" . $i . "'");
    echo '<script>window.location="testimonials.php"</script>';
}


if ($tag == 'testimonial_image') {
    $i = $_GET['id'];
    $er = "SELECT * FROM `tbl_testimonial_image` WHERE `id` = '" . $i . "'";
    $pro = mysqli_query($con, $er);
    $age = mysqli_fetch_array($pro);
    if ($age['img'] != '') {
        unlink('images/testimonials/' . $age['img']);
    }

    $s = mysqli_query($con, "DELETE FROM `tbl_testimonial_image` WHERE `id` = '" . $i . "'");

    echo '<script>window.location="testimonial-image.php"</script>';
}

if ($tag == 'Joining') {
    $i = $_GET['id'];
    $s = mysqli_query($con, "DELETE FROM `tbl_join_remax` WHERE `id` = '" . $i . "'");
    echo '<script>window.location="join-request.php"</script>';
}





if ($tag == 'location') {
    $i = $_GET['id'];
    $s = mysqli_query($con, "DELETE FROM `tbl_areas` WHERE `area_id` = '" . $i . "'");
    echo '<script>window.location="property-location.php"</script>';
}

if ($tag == 'contact') {
    $i = $_GET['id'];
    $s = mysqli_query($con, "DELETE FROM `tbl_contact` WHERE `id` = '" . $i . "'");
    echo '<script>window.location="contact.php"</script>';
}

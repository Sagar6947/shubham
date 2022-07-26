<?php
// if ($_SESSION['agent_login'] == '') 
if(isset($_SESSION['agent_login'])  == '')
{
    echo' <script>window.location="index.php"</script>';
  
}
else{
    //echo '<script>window.location="profile.php"</script>';
} 
?>
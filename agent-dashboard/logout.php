<?php

session_start();
unset($_SESSION['AGNETLOGIN']);
unset($_SESSION['agent_login']);
session_destroy();

?>
<script type="text/javascript">
window.location="index.php";
</script>
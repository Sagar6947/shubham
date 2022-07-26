	<?php
	session_start();
	unset($_SESSION['Remaxproperty']);
	session_destroy();

	?>
	<script type="text/javascript">
	window.location="index.php";
	</script>
<?php

	require_once(dirname(__FILE__) . "/src/managers/_sessionManager.php");
	require_once(dirname(__FILE__) . "/src/utilities/_functions.php");
	require_once(dirname(__FILE__) . "/src/utilities/_enumeration.php");

	SessionManager::startSession();
	checkIfLoggedIn();
	checkStatus();

?>

<!doctype html>
<html lang="en">
<head>
	<?php
		$headTitle = "Utama";

		require_once(dirname(__FILE__) . "/src/components/_head.php");
		require_once(dirname(__FILE__) . "/src/components/_modal.php");
	?>
</head>

<body class="hold-transition layout-navbar-fixed layout-fixed light-mode" id="body-theme">
<div class="wrapper">
	<?php
		$navigationActive = array(1, null);

		include_once(dirname(__FILE__) . "/src/components/_navigation.php");

	?>
</div>

<?php
	require_once(dirname(__FILE__) . "/src/components/_script.php");
?>
</body>
</html>


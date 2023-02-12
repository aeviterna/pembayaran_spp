<?php
	require_once(dirname(__FILE__, 2) . "/managers/_databaseManager.php");
	require_once(dirname(__FILE__, 2) . "/managers/_sessionManager.php");
	require_once(dirname(__FILE__, 2) . "/managers/_roleManager.php");
	require_once(dirname(__FILE__, 2) . "/utilities/_functions.php");
	require_once(dirname(__FILE__, 2) . "/utilities/_enumeration.php");

	SessionManager::startSession();
	checkIfLoggedIn();
?>

<!doctype html>
<html lang="en">
<head>
	<?php
		$headTitle = "Status Aktivasi";

		require_once(dirname(__FILE__, 2) . "/components/_head.php");
		require_once(dirname(__FILE__, 2) . "/components/_dataTableHead.php");
		require_once(dirname(__FILE__, 2) . "/components/_modal.php");
	?>
</head>
<body class="hold-transition layout-navbar-fixed layout-fixed light-mode" id="body-theme">
<div class="preloader">
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm">
                        <div class="card p-2">
                            <h1 class="headline">
                                test
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php
	require_once(dirname(__FILE__, 2) . "/components/_script.php");
	require_once(dirname(__FILE__, 2) . "/components/_dataTableScript.php");
?>
</body>
</html>


<?php

require_once(dirname(__FILE__, 2)."/managers/_roleManager.php");
require_once(dirname(__FILE__, 2)."/managers/_utilsManager.php");

$roleManager = new RoleManager(SessionManager::get("role"));
?>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link">Utama</a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link">
                <?php
                echo ucwords(SessionManager::get("username") ? $username = SessionManager::get("username") : $username = SessionManager::get("nisn")); ?>
                Sebagai
                <?php
                echo ucwords($roleManager->getRoleName(SessionManager::get("role"))); ?>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>

<aside class="main-sidebar sidebar-light-primary elevation-4">
    <a href="/" class="brand-link text-black navbar-light">
        <span class="brand-text font-weight-light text-center">Pembayaran SPP</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="align-items: center;">
            <div class="info">
                <a class="d-block">
                    <p class="h5 m-0 p-0">
                        <?php
                        echo ucwords(SessionManager::get("username") ? $username = SessionManager::get("username") : $username = SessionManager::get("nisn")); ?>
                    </p>
                    <p class="h6 text-muted m-0 p-0">
                        <?php
                        echo ucwords($roleManager->getRoleName(SessionManager::get("role"))); ?>
                    </p>
                </a>
            </div>
        </div>

        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Cari" aria-label="Search">

                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <nav class="mt-4">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                data-accordion="false">
                <?php
                $pageArray = [
                        1 => [
                                "id"    => 1,
                                "title" => "Utama",
                                "icon"  => "fas fa-home",
                                "link"  => "",
                                "child" => null,
                        ]
                ];

                if ($roleManager->checkMinimumRole(RoleEnumeration::ADMINISTRATOR)) {
                    $pageArray[2] = [
                            "id"    => 2,
                            "title" => "Pengguna",
                            "icon"  => "fas fa-users",
                            "link"  => "user",
                            "child" => [
                                    1 => [
                                            "id"    => 1,
                                            "title" => "Petugas",
                                            "icon"  => "fas fa-user-tie",
                                            "link"  => generateUrl('petugas'),
                                    ],
                                    2 => [
                                            "id"    => 2,
                                            "title" => "Siswa",
                                            "icon"  => "fas fa-user",
                                            "link"  => generateUrl('siswa'),
                                    ]
                            ]
                    ];
                }

                if ($roleManager->checkMinimumRole(RoleEnumeration::SISWA)) {
                    $pageArray[3] = [
                            "id"    => 3,
                            "title" => "Riwayat Pembayaran",
                            "icon"  => "fas fa-history",
                            "link"  => UtilsManager::generateRoute('pembayaran_history'),
                            "child" => null,
                    ];
                }

                if ($roleManager->checkMinimumRole(RoleEnumeration::PETUGAS)) {
                    $pageArray[4] = [
                            "id"    => 4,
                            "title" => "Transaksi Pembayaran",
                            "icon"  => "fas fa-exchange",
                            "link"  => UtilsManager::generateRoute('pembayaran_transaksi'),
                            "child" => null,
                    ];
                }

                $pageArray[5] = [
                        "id"    => 6,
                        "title" => "Pengaturan",
                        "icon"  => "fas fa-cog",
                        "link"  => null,
                        "child" => [
                                1 => [
                                        "id"    => 1,
                                        "title" => "Data Pribadi",
                                        "icon"  => "fas fa-user-circle",
                                        "link"  => "src/models/pengaturan/data-pribadi",
                                ],
                                2 => [
                                        "id"    => 1,
                                        "title" => "Logout",
                                        "icon"  => "fas fa-sign-out",
                                        "link"  => generateUrl('logout'),
                                ]
                        ]
                ];
                ?>

                <?php
                foreach ($pageArray as $page) {
                    $isActive = false;
                    $isChildActive = false;

                    if ($page["link"] != null) {
                        $isActive = str_contains($_SERVER["REQUEST_URI"], $page["link"]);
                    }

                    if ($page["child"] != null) {
                        foreach ($page["child"] as $child) {
                            if (str_contains($_SERVER["REQUEST_URI"], $child["link"])) {
                                $isChildActive = true;
                                break;
                            }
                        }
                    }

                    if ($isActive || $isChildActive) {
                        echo "<li class='nav-item menu-open'>";
                    } else {
                        echo "<li class='nav-item'>";
                    }

                    if ($page["link"] != null) {
                        echo "<a href='".$page["link"]."' class='nav-link ".($isActive ? "active" : "")."'>";
                    } else {
                        echo "<a href='#' class='nav-link ".($isActive ? "active" : "")."'>";
                    }

                    echo "<i class='".$page["icon"]." nav-icon'></i>";
                    echo "<p>".$page["title"]."</p>";

                    if ($page["child"] != null) {
                        echo "<i class='right fas fa-angle-left'></i>";
                    }

                    echo "</a>";

                    if ($page["child"] != null) {
                        echo "<ul class='nav nav-treeview'>";

                        foreach ($page["child"] as $child) {
                            echo "<li class='nav-item'>";
                            echo "<a href='".$child["link"]."' class='nav-link ".(str_contains($_SERVER["REQUEST_URI"],
                                            $child["link"]) ? "active" : "")."'>";
                            echo "<i class='".$child["icon"]." nav-icon'></i>";
                            echo "<p>".$child["title"]."</p>";
                            echo "</a>";
                            echo "</li>";
                        }

                        echo "</ul>";
                    }

                    echo "</li>";
                }
                ?>
            </ul>
        </nav>
    </div>
</aside>
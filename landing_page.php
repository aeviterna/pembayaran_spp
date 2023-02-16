<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pembayaran SPP</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap"
          rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css"
          integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css"
          integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"
          integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.2.0/css/glightbox.min.css"
          integrity="sha512-T+KoG3fbDoSnlgEXFQqwcTC9AdkFIxhBlmoaFqYaIjq2ShhNwNao9AKaLUPMfwiBPL0ScxAtc+UYbHAgvd+sjQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/9.0.5/swiper-bundle.css"
          integrity="sha512-CTWIgc35lLPcCl1OP7MNcrrES+jyBBvMEz8Cqx/v0hifPNjIpPsd/jUYTJ/41CYCrQdfuw7LopKaqqjXVLqejg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <style>
        :root {

            /* Fonts */
            --font-default: 'Open Sans', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            --font-primary: 'Source Sans Pro', sans-serif;
            --font-secondary: 'Poppins', sans-serif;

            /* Colors */
            /* The *-rgb color names are simply the RGB converted value of the corresponding color for use in the rgba() function */

            /* Default text color */
            --color-default: #1a1f24;
            --color-default-rgb: 26, 31, 36;

            /* Defult links color */
            --color-links: #0ea2bd;
            --color-links-hover: #1ec3e0;

            /* Primay colors */
            --color-primary: #FF6363;
            --color-primary-light: #1ec3e0;
            --color-primary-dark: #0189a1;

            --color-primary-rgb: 14, 162, 189;
            --color-primary-light-rgb: 30, 195, 224;
            --color-primary-dark-rgb: 1, 137, 161;

            /* Secondary colors */
            --color-secondary: #485664;
            --color-secondary-light: #8f9fae;
            --color-secondary-dark: #3a4753;

            --color-secondary-rgb: 72, 86, 100;
            --color-secondary-light-rgb: 143, 159, 174;
            --color-secondary-dark-rgb: 58, 71, 83;

            /* General colors */
            --color-blue: #0d6efd;
            --color-blue-rgb: 13, 110, 253;

            --color-indigo: #6610f2;
            --color-indigo-rgb: 102, 16, 242;

            --color-purple: #6f42c1;
            --color-purple-rgb: 111, 66, 193;

            --color-pink: #f3268c;
            --color-pink-rgb: 243, 38, 140;

            --color-red: #df1529;
            --color-red-rgb: 223, 21, 4;

            --color-orange: #fd7e14;
            --color-orange-rgb: 253, 126, 20;

            --color-yellow: #ffc107;
            --color-yellow-rgb: 255, 193, 7;

            --color-green: #059652;
            --color-green-rgb: 5, 150, 82;

            --color-teal: #20c997;
            --color-teal-rgb: 32, 201, 151;

            --color-cyan: #0dcaf0;
            --color-cyan-rgb: 13, 202, 240;

            --color-white: #ffffff;
            --color-white-rgb: 255, 255, 255;

            --color-gray: #6c757d;
            --color-gray-rgb: 108, 117, 125;

            --color-black: #000000;
            --color-black-rgb: 0, 0, 0;

        }

        /*--------------------------------------------------------------
        # 2. Override default Bootstrap variables
        --------------------------------------------------------------*/
        :root {

            --bs-blue: var(--color-blue);
            --bs-indigo: var(--color-indigo);
            --bs-purple: var(--color-purple);
            --bs-pink: var(--color-pink);
            --bs-red: var(--color-red);
            --bs-orange: var(--color-orange);
            --bs-yellow: var(--color-yellow);
            --bs-green: var(--color-green);
            --bs-teal: var(--color-teal);
            --bs-cyan: var(--color-cyan);
            --bs-white: var(--color-white);
            --bs-gray: var(--color-gray);
            --bs-gray-dark: #343a40;
            --bs-gray-100: #f8f9fa;
            --bs-gray-200: #e9ecef;
            --bs-gray-300: #dee2e6;
            --bs-gray-400: #ced4da;
            --bs-gray-500: #adb5bd;
            --bs-gray-600: #6c757d;
            --bs-gray-700: #495057;
            --bs-gray-800: #343a40;
            --bs-gray-900: #212529;
            --bs-primary: var(--color-blue);
            --bs-secondary: var(--color-blue);
            --bs-success: #198754;
            --bs-info: #0dcaf0;
            --bs-warning: #ffc107;
            --bs-danger: #dc3545;
            --bs-light: #f8f9fa;
            --bs-dark: #212529;
            --bs-primary-rgb: var(--color-primary-rgb);
            --bs-secondary-rgb: var(--color-secondary-rgb);
            --bs-success-rgb: 25, 135, 84;
            --bs-info-rgb: 13, 202, 240;
            --bs-warning-rgb: 255, 193, 7;
            --bs-danger-rgb: 220, 53, 69;
            --bs-light-rgb: 248, 249, 250;
            --bs-dark-rgb: 33, 37, 41;
            --bs-white-rgb: var(--color-white-rgb);
            --bs-black-rgb: var(--color-black-rgb);
            --bs-body-color-rgb: var(--color-default-rgb);
            --bs-body-bg-rgb: 255, 255, 255;
            --bs-font-sans-serif: var(--font-default);
            --bs-font-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            --bs-gradient: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));
            --bs-body-font-family: var(--font-default);
            --bs-body-font-size: 1rem;
            --bs-body-font-weight: 400;
            --bs-body-line-height: 1.5;
            --bs-body-color: var(--color-default);
            --bs-body-bg: #fff;

        }

        /* Fonts */
        .font-default {
            font-family: var(--font-default) !important;
        }

        .font-primary {
            font-family: var(--font-primary) !important;
        }

        .font-secondary {
            font-family: var(--font-secondary) !important;
        }

        /* Text Colors */
        .color-default {
            color: var(--color-default) !important;
        }

        .color-links {
            color: var(--color-links) !important;
        }

        .color-links:hover {
            color: var(--color-links-hover) !important;
        }

        .color-primary {
            color: var(--color-primary) !important;
        }

        .color-primary-light {
            color: var(--color-primary-light) !important;
        }

        .color-primary-dark {
            color: var(--color-primary-dark) !important;
        }

        .color-secondary {
            color: var(--color-secondary) !important;
        }

        .color-secondary-light {
            color: var(--color-secondary-light) !important;
        }

        .color-secondary-dark {
            color: var(--color-secondary-dark) !important;
        }

        .color-blue {
            color: var(--color-blue) !important;
        }

        .color-indigo {
            color: var(--color-indigo) !important;
        }

        .color-purple {
            color: var(--color-purple) !important;
        }

        .color-pink {
            color: var(--color-pink) !important;
        }

        .color-red {
            color: var(--color-red) !important;
        }

        .color-orange {
            color: var(--color-orange) !important;
        }

        .color-yellow {
            color: var(--color-yellow) !important;
        }

        .color-green {
            color: var(--color-green) !important;
        }

        .color-teal {
            color: var(--color-teal) !important;
        }

        .color-cyan {
            color: var(--color-cyan) !important;
        }

        .color-white {
            color: var(--color-white) !important;
        }

        .color-gray {
            color: var(--color-gray) !important;
        }

        .color-black {
            color: var(--color-black) !important;
        }

        /* Background Colors */
        .bg-default {
            background-color: var(--color-default) !important;
        }

        .bg-primary {
            background-color: var(--color-primary) !important;
        }

        .bg-primary-light {
            background-color: var(--color-primary-light) !important;
        }

        .bg-primary-dark {
            background-color: var(--color-primary-dark) !important;
        }

        .bg-secondary {
            background-color: var(--color-secondary) !important;
        }

        .bg-secondary-light {
            background-color: var(--color-secondary-light) !important;
        }

        .bg-secondary-dark {
            background-color: var(--color-secondary-dark) !important;
        }

        .bg-blue {
            background-color: var(--color-blue) !important;
        }

        .bg-indigo {
            background-color: var(--color-indigo) !important;
        }

        .bg-purple {
            background-color: var(--color-purple) !important;
        }

        .bg-pink {
            background-color: var(--color-pink) !important;
        }

        .bg-red {
            background-color: var(--color-red) !important;
        }

        .bg-orange {
            background-color: var(--color-orange) !important;
        }

        .bg-yellow {
            background-color: var(--color-yellow) !important;
        }

        .bg-green {
            background-color: var(--color-green) !important;
        }

        .bg-teal {
            background-color: var(--color-teal) !important;
        }

        .bg-cyan {
            background-color: var(--color-cyan) !important;
        }

        .bg-white {
            background-color: var(--color-white) !important;
        }

        .bg-gray {
            background-color: var(--color-gray) !important;
        }

        .bg-black {
            background-color: var(--color-black) !important;
        }
    </style>
    <style>
        :root {
            scroll-behavior: smooth;
        }

        a {
            color: var(--color-links);
            text-decoration: none;
        }

        a:hover {
            color: var(--color-links-hover);
            text-decoration: none;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: var(--font-primary);
        }

        /*--------------------------------------------------------------
        # Preloader
        --------------------------------------------------------------*/
        #preloader {
            position: fixed;
            inset: 0;
            z-index: 9999;
            overflow: hidden;
            background: var(--color-white);
            transition: all 0.6s ease-out;
            width: 100%;
            height: 100vh;
        }

        #preloader:before,
        #preloader:after {
            content: "";
            position: absolute;
            border: 4px solid var(--color-primary);
            border-radius: 50%;
            -webkit-animation: animate-preloader 2s cubic-bezier(0, 0.2, 0.8, 1) infinite;
            animation: animate-preloader 2s cubic-bezier(0, 0.2, 0.8, 1) infinite;
        }

        #preloader:after {
            -webkit-animation-delay: -0.5s;
            animation-delay: -0.5s;
        }

        @-webkit-keyframes animate-preloader {
            0% {
                width: 10px;
                height: 10px;
                top: calc(50% - 5px);
                left: calc(50% - 5px);
                opacity: 1;
            }

            100% {
                width: 72px;
                height: 72px;
                top: calc(50% - 36px);
                left: calc(50% - 36px);
                opacity: 0;
            }
        }

        @keyframes animate-preloader {
            0% {
                width: 10px;
                height: 10px;
                top: calc(50% - 5px);
                left: calc(50% - 5px);
                opacity: 1;
            }

            100% {
                width: 72px;
                height: 72px;
                top: calc(50% - 36px);
                left: calc(50% - 36px);
                opacity: 0;
            }
        }

        /*--------------------------------------------------------------
        # Sections & Section Header
        --------------------------------------------------------------*/
        section {
            padding: 60px 0;
            overflow: hidden;
        }

        .section-header {
            text-align: center;
            padding-bottom: 40px;
        }

        .section-header h2 {
            font-size: 48px;
            font-weight: 300;
            margin-bottom: 20px;
            color: var(--color-secondary);
        }

        .section-header p {
            margin: 0 auto;
            color: var(--color-secondary-light);
        }

        @media (min-width: 1280px) {
            .section-header p {
                max-width: 80%;
            }
        }

        /*--------------------------------------------------------------
        # Breadcrumbs
        --------------------------------------------------------------*/
        .breadcrumbs {
            padding: 15px 0;
            background: rgba(var(--color-secondary-rgb), 0.05);
            min-height: 40px;
            margin-top: 76px;
        }

        .breadcrumbs h2 {
            font-size: 30px;
            font-weight: 300;
            margin: 0;
        }

        .breadcrumbs ol {
            display: flex;
            flex-wrap: wrap;
            list-style: none;
            padding: 0;
            margin: 0;
            font-size: 14px;
        }

        .breadcrumbs ol li + li {
            padding-left: 10px;
        }

        .breadcrumbs ol li + li::before {
            display: inline-block;
            padding-right: 10px;
            color: var(--color-secondary-light);
            content: "/";
        }

        @media (max-width: 992px) {
            .breadcrumbs .d-flex {
                display: block !important;
            }

            .breadcrumbs h2 {
                margin-bottom: 10px;
                font-size: 24px;
            }

            .breadcrumbs ol {
                display: block;
            }

            .breadcrumbs ol li {
                display: inline-block;
            }
        }

        /*--------------------------------------------------------------
        # Scroll top button
        --------------------------------------------------------------*/
        .scroll-top {
            position: fixed;
            visibility: hidden;
            opacity: 0;
            right: 15px;
            bottom: 15px;
            z-index: 995;
            background: var(--color-primary);
            width: 40px;
            height: 40px;
            border-radius: 4px;
            transition: all 0.4s;
        }

        .scroll-top i {
            font-size: 24px;
            color: var(--color-white);
            line-height: 0;
        }

        .scroll-top:hover {
            background: rgba(var(--color-primary-rgb), 0.85);
            color: var(--color-white);
        }

        .scroll-top.active {
            visibility: visible;
            opacity: 1;
        }

        /*--------------------------------------------------------------
        # Disable aos animation delay on mobile devices
        --------------------------------------------------------------*/
        @media screen and (max-width: 768px) {
            [data-aos-delay] {
                transition-delay: 0 !important;
            }
        }

        /*--------------------------------------------------------------
        # Header
        --------------------------------------------------------------*/
        .header {
            padding: 15px 0;
            transition: all 0.5s;
            z-index: 997;
        }

        .header.sticked {
            background: var(--color-white);
            box-shadow: 0px 2px 20px rgba(var(--color-secondary-rgb), 0.1);
        }

        .header .logo img {
            max-height: 40px;
            margin-right: 6px;
        }

        .header .logo h1 {
            font-size: 32px;
            font-weight: 300;
            color: var(--color-secondary);
            font-family: var(--font-secondary);
        }

        .header .logo h1 span {
            color: var(--color-primary);
            font-weight: 500;
        }

        .header .btn-getstarted,
        .header .btn-getstarted:focus {
            font-size: 16px;
            color: var(--color-white);
            background: var(--color-primary);
            padding: 8px 23px;
            border-radius: 4px;
            transition: 0.3s;
            font-family: var(--font-secondary);
        }

        .header .btn-getstarted:hover,
        .header .btn-getstarted:focus:hover {
            color: var(--color-white);
            background: rgba(var(--color-primary-rgb), 0.85);
        }

        @media (max-width: 1279px) {

            .header .btn-getstarted,
            .header .btn-getstarted:focus {
                margin-right: 50px;
            }
        }

        /*--------------------------------------------------------------
        # Desktop Navigation
        --------------------------------------------------------------*/
        @media (min-width: 1280px) {
            .navbar {
                padding: 0;
                position: relative;
            }

            .navbar ul {
                margin: 0;
                padding: 0;
                display: flex;
                list-style: none;
                align-items: center;
            }

            .navbar li {
                position: relative;
            }

            .navbar > ul > li {
                white-space: nowrap;
            }

            .navbar a,
            .navbar a:focus {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 14px 20px;
                font-family: var(--font-secondary);
                font-size: 16px;
                font-weight: 400;
                color: rgba(var(--color-secondary-dark-rgb), 0.7);
                white-space: nowrap;
                transition: 0.3s;
                position: relative;
            }

            .navbar a i,
            .navbar a:focus i {
                font-size: 12px;
                line-height: 0;
                margin-left: 5px;
            }

            .navbar > ul > li > a:before {
                content: "";
                position: absolute;
                width: 100%;
                height: 2px;
                bottom: 0;
                left: 0;
                background-color: var(--color-primary);
                visibility: hidden;
                transition: all 0.3s ease-in-out 0s;
                transform: scaleX(0);
                transition: all 0.3s ease-in-out 0s;
            }

            .navbar a:hover:before,
            .navbar li:hover > a:before,
            .navbar .active:before {
                visibility: visible;
                transform: scaleX(0.7);
            }

            .navbar a:hover,
            .navbar .active,
            .navbar .active:focus,
            .navbar li:hover > a {
                color: var(--color-primary);
            }

            .navbar .dropdown a:hover:before,
            .navbar .dropdown:hover > a:before,
            .navbar .dropdown .active:before {
                visibility: hidden;
            }

            .navbar .dropdown a:hover,
            .navbar .dropdown .active,
            .navbar .dropdown .active:focus,
            .navbar .dropdown:hover > a {
                color: var(--color-white);
                background: var(--color-secondary);
            }

            .navbar .dropdown ul {
                display: block;
                position: absolute;
                left: 0;
                top: 100%;
                margin: 0;
                padding: 0 0 10px 0;
                z-index: 99;
                opacity: 0;
                visibility: hidden;
                background: var(--color-secondary);
                transition: 0.3s;
            }

            .navbar .dropdown ul li {
                min-width: 200px;
            }

            .navbar .dropdown ul a {
                padding: 10px 20px;
                font-size: 15px;
                text-transform: none;
                font-weight: 400;
                color: rgba(var(--color-white-rgb), 0.5);
            }

            .navbar .dropdown ul a i {
                font-size: 12px;
            }

            .navbar .dropdown ul a:hover,
            .navbar .dropdown ul .active,
            .navbar .dropdown ul .active:hover,
            .navbar .dropdown ul li:hover > a {
                color: var(--color-white);
                background: var(--color-primary);
            }

            .navbar .dropdown:hover > ul {
                opacity: 1;
                visibility: visible;
            }

            .navbar .megamenu {
                position: static;
            }

            .navbar .megamenu ul {
                right: 0;
                padding: 10px;
                display: flex;
            }

            .navbar .megamenu ul li {
                flex: 1;
            }

            .navbar .megamenu ul li a,
            .navbar .megamenu ul li:hover > a {
                color: rgba(var(--color-white-rgb), 0.5);
                background: none;
            }

            .navbar .megamenu ul li a:hover,
            .navbar .megamenu ul li .active,
            .navbar .megamenu ul li .active:hover {
                color: var(--color-white);
                background: var(--color-primary);
            }

            .navbar .dropdown .dropdown ul {
                top: 0;
                left: calc(100% - 30px);
                visibility: hidden;
            }

            .navbar .dropdown .dropdown:hover > ul {
                opacity: 1;
                top: 0;
                left: 100%;
                visibility: visible;
            }
        }

        @media (min-width: 1280px) and (max-width: 1366px) {
            .navbar .dropdown .dropdown ul {
                left: -90%;
            }

            .navbar .dropdown .dropdown:hover > ul {
                left: -100%;
            }
        }

        /*--------------------------------------------------------------
        # Mobile Navigation
        --------------------------------------------------------------*/
        @media (max-width: 1279px) {
            .navbar {
                position: fixed;
                top: 0;
                left: -100%;
                width: calc(100% - 70px);
                bottom: 0;
                transition: 0.3s;
                z-index: 9997;
            }

            .navbar ul {
                position: absolute;
                inset: 0;
                padding: 10px 0;
                margin: 0;
                background: rgba(var(--color-secondary-rgb), 0.9);
                overflow-y: auto;
                transition: 0.3s;
                z-index: 9998;
            }

            .navbar a,
            .navbar a:focus {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 12px 20px;
                font-size: 16px;
                font-weight: 500;
                color: rgba(var(--color-white-rgb), 0.7);
                white-space: nowrap;
                transition: 0.3s;
            }

            .navbar a i,
            .navbar a:focus i {
                font-size: 12px;
                line-height: 0;
                margin-left: 5px;
            }

            .navbar a:hover,
            .navbar .active,
            .navbar .active:focus,
            .navbar li:hover > a {
                color: var(--color-white);
            }

            .navbar .dropdown ul,
            .navbar .dropdown .dropdown ul {
                position: static;
                display: none;
                padding: 10px 0;
                margin: 10px 20px;
                transition: all 0.5s ease-in-out;
                border: 1px solid rgba(var(--color-secondary-light-rgb), 0.3);
            }

            .navbar .dropdown > .dropdown-active,
            .navbar .dropdown .dropdown > .dropdown-active {
                display: block;
            }

            .mobile-nav-toggle {
                display: block !important;
                color: var(--color-secondary);
                font-size: 28px;
                cursor: pointer;
                line-height: 0;
                transition: 0.5s;
                position: fixed;
                top: 20px;
                z-index: 9999;
                right: 20px;
            }

            .mobile-nav-toggle.bi-x {
                color: var(--color-white);
            }

            .mobile-nav-active {
                overflow: hidden;
                z-index: 9995;
                position: relative;
            }

            .mobile-nav-active .navbar {
                left: 0;
            }

            .mobile-nav-active .navbar:before {
                content: "";
                position: fixed;
                inset: 0;
                background: rgba(var(--color-secondary-rgb), 0.8);
                z-index: 9996;
            }
        }

        /*--------------------------------------------------------------
        # Index Page
        --------------------------------------------------------------*/
        /*--------------------------------------------------------------
        # Animated Hero Section
        --------------------------------------------------------------*/
        .hero-animated {
            width: 100%;
            min-height: 50vh;
            background: url("../img/hero-bg.png") center center;
            background-size: cover;
            position: relative;
            padding: 120px 0 60px;
        }

        .hero-animated h2 {
            margin: 0 0 10px 0;
            font-size: 48px;
            font-weight: 300;
            color: var(--color-secondary);
            font-family: var(--font-secondary);
        }

        .hero-animated h2 span {
            color: var(--color-primary);
        }

        .hero-animated p {
            color: rgba(var(--color-secondary-rgb), 0.8);
            margin: 0 0 30px 0;
            font-size: 20px;
            font-weight: 400;
        }

        .hero-animated .animated {
            margin-bottom: 60px;
            animation: up-down 2s ease-in-out infinite alternate-reverse both;
        }

        @media (min-width: 992px) {
            .hero-animated .animated {
                max-width: 45%;
            }
        }

        @media (max-width: 991px) {
            .hero-animated .animated {
                max-width: 60%;
            }
        }

        @media (max-width: 575px) {
            .hero-animated .animated {
                max-width: 80%;
            }
        }

        .hero-animated .btn-get-started {
            font-size: 16px;
            font-weight: 400;
            display: inline-block;
            padding: 10px 28px;
            border-radius: 4px;
            transition: 0.5s;
            color: var(--color-white);
            background: var(--color-primary);
            font-family: var(--font-secondary);
        }

        .hero-animated .btn-get-started:hover {
            background: rgba(var(--color-primary-rgb), 0.8);
        }

        .hero-animated .btn-watch-video {
            font-size: 16px;
            transition: 0.5s;
            margin-left: 25px;
            font-family: var(--font-secondary);
            color: var(--color-secondary);
            font-weight: 600;
        }

        .hero-animated .btn-watch-video i {
            color: var(--color-primary);
            font-size: 32px;
            transition: 0.3s;
            line-height: 0;
            margin-right: 8px;
        }

        .hero-animated .btn-watch-video:hover {
            color: var(--color-primary);
        }

        .hero-animated .btn-watch-video:hover i {
            color: rgba(var(--color-primary-rgb), 0.8);
        }

        @media (max-width: 640px) {
            .hero-animated h2 {
                font-size: 32px;
            }

            .hero-animated p {
                font-size: 18px;
                margin-bottom: 30px;
            }

            .hero-animated .btn-get-started,
            .hero-animated .btn-watch-video {
                font-size: 14px;
            }
        }

        @-webkit-keyframes up-down {
            0% {
                transform: translateY(10px);
            }

            100% {
                transform: translateY(-10px);
            }
        }

        @keyframes up-down {
            0% {
                transform: translateY(10px);
            }

            100% {
                transform: translateY(-10px);
            }
        }

        /*--------------------------------------------------------------
        # Carousel Hero Section
        --------------------------------------------------------------*/
        .hero {
            width: 100%;
            padding: 0;
            background: var(--color-black);
            background: url("../img/hero-bg.png") center center;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 140px 0 60px 0;
        }

        .hero .carousel-item {
            overflow: hidden;
        }

        @media (max-width: 640px) {
            .hero .container {
                padding: 0 60px;
            }
        }

        .hero h2 {
            color: var(--color-secondary);
            margin-bottom: 25px;
            font-size: 48px;
            font-weight: 300;
            -webkit-animation: fadeInDown 1s both 0.2s;
            animation: fadeInDown 1s both 0.2s;
        }

        @media (max-width: 768px) {
            .hero h2 {
                font-size: 30px;
            }
        }

        .hero p {
            color: var(--color-secondary-light);
            -webkit-animation: fadeInDown 1s both 0.4s;
            animation: fadeInDown 1s both 0.4s;
            font-weight: 500;
            margin-bottom: 30px;
        }

        .hero .img {
            margin-bottom: 40px;
            -webkit-animation: fadeInDownLite 1s both;
            animation: fadeInDownLite 1s both;
        }

        .hero .btn-get-started {
            font-family: var(--font-secondary);
            font-weight: 400;
            font-size: 16px;
            letter-spacing: 1px;
            display: inline-block;
            padding: 8px 32px;
            border-radius: 5px;
            transition: 0.5s;
            -webkit-animation: fadeInUp 1s both 0.6s;
            animation: fadeInUp 1s both 0.6s;
            color: var(--color-primary);
            border: 2px solid var(--color-primary);
        }

        .hero .btn-get-started:hover {
            background: var(--color-primary);
            color: var(--color-white);
        }

        .hero .carousel-control-prev {
            justify-content: start;
        }

        @media (min-width: 640px) {
            .hero .carousel-control-prev {
                padding-left: 15px;
            }
        }

        .hero .carousel-control-next {
            justify-content: end;
        }


        @media (min-width: 640px) {
            .hero .carousel-control-next {
                padding-right: 15px;
            }
        }

        .hero .carousel-control-next-icon,
        .hero .carousel-control-prev-icon {
            background: none;
            font-size: 26px;
            line-height: 0;
            background: rgba(var(--color-secondary-rgb), 0.4);
            color: rgba(var(--color-white-rgb), 0.98);
            border-radius: 50px;
            width: 54px;
            height: 54px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero .carousel-control-next-icon {
            padding-left: 3px;
        }

        .hero .carousel-control-prev-icon {
            padding-right: 3px;
        }

        .hero .carousel-control-prev,
        .hero .carousel-control-next {
            transition: 0.3s;
        }

        .hero .carousel-control-prev:focus,
        .hero .carousel-control-next:focus {
            opacity: 0.5;
        }

        .hero .carousel-control-prev:hover,
        .hero .carousel-control-next:hover {
            opacity: 0.9;
        }

        .hero .carousel-indicators li {
            cursor: pointer;
            background: rgba(var(--color-secondary-rgb), 0.5);
            overflow: hidden;
            border: 0;
            width: 12px;
            height: 12px;
            border-radius: 50px;
            opacity: 0.6;
            transition: 0.3s;
        }

        .hero .carousel-indicators li.active {
            opacity: 1;
            background: var(--color-primary);
        }

        @-webkit-keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @-webkit-keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translate3d(0, 100%, 0);
            }

            to {
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translate3d(0, 100%, 0);
            }

            to {
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }
        }

        @-webkit-keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translate3d(0, -100%, 0);
            }

            to {
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translate3d(0, -100%, 0);
            }

            to {
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }
        }

        @-webkit-keyframes fadeInDownLite {
            from {
                opacity: 0;
                transform: translate3d(0, -10%, 0);
            }

            to {
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }
        }

        @keyframes fadeInDownLite {
            from {
                opacity: 0;
                transform: translate3d(0, -10%, 0);
            }

            to {
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }
        }

        /*--------------------------------------------------------------
        # Fullscreen Hero Section
        --------------------------------------------------------------*/
        .hero-fullscreen {
            width: 100%;
            min-height: 100vh;
            background: url("../img/hero-fullscreen-bg.jpg") center center;
            background-size: cover;
            position: relative;
            padding: 120px 0 60px;
        }

        .hero-fullscreen:before {
            content: "";
            background: rgba(var(--color-white-rgb), 0.85);
            position: absolute;
            inset: 0;
        }

        @media (min-width: 1365px) {
            .hero-fullscreen {
                background-attachment: fixed;
            }
        }

        .hero-fullscreen h2 {
            margin: 0 0 10px 0;
            font-size: 48px;
            font-weight: 300;
            color: var(--color-secondary);
            font-family: var(--font-secondary);
        }

        .hero-fullscreen h2 span {
            color: var(--color-primary);
        }

        .hero-fullscreen p {
            color: rgba(var(--color-secondary-rgb), 0.8);
            margin: 0 0 30px 0;
            font-size: 20px;
            font-weight: 400;
        }

        .hero-fullscreen .btn-get-started {
            font-size: 16px;
            font-weight: 400;
            display: inline-block;
            padding: 10px 28px;
            border-radius: 4px;
            transition: 0.5s;
            color: var(--color-white);
            background: var(--color-primary);
            font-family: var(--font-secondary);
        }

        .hero-fullscreen .btn-get-started:hover {
            background: rgba(var(--color-primary-rgb), 0.8);
        }

        .hero-fullscreen .btn-watch-video {
            font-size: 16px;
            transition: 0.5s;
            margin-left: 25px;
            font-family: var(--font-secondary);
            color: var(--color-secondary);
            font-weight: 600;
        }

        .hero-fullscreen .btn-watch-video i {
            color: var(--color-primary);
            font-size: 32px;
            transition: 0.3s;
            line-height: 0;
            margin-right: 8px;
        }

        .hero-fullscreen .btn-watch-video:hover {
            color: var(--color-primary);
        }

        .hero-fullscreen .btn-watch-video:hover i {
            color: rgba(var(--color-primary-rgb), 0.8);
        }

        @media (max-width: 640px) {
            .hero-fullscreen h2 {
                font-size: 32px;
            }

            .hero-fullscreen p {
                font-size: 18px;
                margin-bottom: 30px;
            }

            .hero-fullscreen .btn-get-started,
            .hero-fullscreen .btn-watch-video {
                font-size: 14px;
            }
        }

        /*--------------------------------------------------------------
        # Static Hero Section
        --------------------------------------------------------------*/
        .hero-static {
            width: 100%;
            min-height: 50vh;
            background: url("../img/hero-bg.png") center center;
            background-size: cover;
            position: relative;
            padding: 120px 0 60px;
        }

        .hero-static h2 {
            margin: 0 0 10px 0;
            font-size: 48px;
            font-weight: 300;
            color: var(--color-secondary);
            font-family: var(--font-secondary);
        }

        .hero-static h2 span {
            color: var(--color-primary);
        }

        .hero-static p {
            color: rgba(var(--color-secondary-rgb), 0.8);
            margin: 0 0 30px 0;
            font-size: 20px;
            font-weight: 400;
        }

        .hero-static .btn-get-started {
            font-size: 16px;
            font-weight: 400;
            display: inline-block;
            padding: 10px 28px;
            border-radius: 4px;
            transition: 0.5s;
            color: var(--color-white);
            background: var(--color-primary);
            font-family: var(--font-secondary);
        }

        .hero-static .btn-get-started:hover {
            background: rgba(var(--color-primary-rgb), 0.8);
        }

        .hero-static .btn-watch-video {
            font-size: 16px;
            transition: 0.5s;
            margin-left: 25px;
            font-family: var(--font-secondary);
            color: var(--color-secondary);
            font-weight: 600;
        }

        .hero-static .btn-watch-video i {
            color: var(--color-primary);
            font-size: 32px;
            transition: 0.3s;
            line-height: 0;
            margin-right: 8px;
        }

        .hero-static .btn-watch-video:hover {
            color: var(--color-primary);
        }

        .hero-static .btn-watch-video:hover i {
            color: rgba(var(--color-primary-rgb), 0.8);
        }

        @media (max-width: 640px) {
            .hero-static h2 {
                font-size: 32px;
            }

            .hero-static p {
                font-size: 18px;
                margin-bottom: 30px;
            }

            .hero-static .btn-get-started,
            .hero-static .btn-watch-video {
                font-size: 14px;
            }
        }

        /*--------------------------------------------------------------
        # Featured Services Section
        --------------------------------------------------------------*/
        .featured-services .service-item {
            padding: 30px;
            transition: all ease-in-out 0.4s;
            background: var(--color-white);
            height: 100%;
        }

        .featured-services .service-item .icon {
            margin-bottom: 10px;
        }

        .featured-services .service-item .icon i {
            color: var(--color-primary);
            font-size: 36px;
            transition: 0.3s;
        }

        .featured-services .service-item h4 {
            font-weight: 600;
            margin-bottom: 15px;
            font-size: 24px;
        }

        .featured-services .service-item h4 a {
            color: var(--color-secondary);
            transition: ease-in-out 0.3s;
        }

        .featured-services .service-item p {
            line-height: 24px;
            font-size: 14px;
            margin-bottom: 0;
        }

        .featured-services .service-item:hover {
            transform: translateY(-10px);
            box-shadow: 0px 0 60px 0 rgba(var(--color-secondary-rgb), 0.1);
        }

        .featured-services .service-item:hover h4 a {
            color: var(--color-primary);
        }

        /*--------------------------------------------------------------
        # About Section
        --------------------------------------------------------------*/
        .about .about-img {
            position: relative;
            margin: 60px 0 0 60px;
        }

        .about .about-img:before {
            position: absolute;
            inset: -60px 0 0 -60px;
            z-index: -1;
            content: "";
            background: url("../img/about-bg.png") top left;
            background-repeat: no-repeat;
        }

        @media (max-width: 575px) {
            .about .about-img {
                margin: 30px 0 0 30px;
            }

            .about .about-img:before {
                inset: -30px 0 0 -30px;
            }
        }

        .about h3 {
            color: var(--color-secondary);
            font-family: var(--font-secondary);
            font-weight: 300;
            font-size: 32px;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .about h3 {
                font-size: 28px;
            }
        }

        .about .nav-pills {
            border-bottom: 1px solid rgba(var(--color-secondary-rgb), 0.2);
        }

        .about .nav-pills li + li {
            margin-left: 40px;
        }

        .about .nav-link {
            background: none;
            font-size: 18px;
            font-weight: 400;
            color: var(--color-secondary);
            padding: 12px 0;
            margin-bottom: -2px;
            border-radius: 0;
            font-family: var(--font-secondary);
        }

        .about .nav-link.active {
            color: var(--color-primary);
            background: none;
            border-bottom: 3px solid var(--color-primary);
        }

        @media (max-width: 575px) {
            .about .nav-link {
                font-size: 16px;
            }
        }

        .about .tab-content h4 {
            font-size: 18px;
            margin: 0;
            font-weight: 700;
            color: var(--color-secondary);
        }

        .about .tab-content i {
            font-size: 22px;
            line-height: 0;
            margin-right: 8px;
            color: var(--color-primary);
        }

        /*--------------------------------------------------------------
        # Clients Section
        --------------------------------------------------------------*/
        .clients {
            padding: 0 0 60px 0;
        }

        .clients .swiper-slide img {
            opacity: 0.5;
            transition: 0.3s;
            filter: grayscale(100);
        }

        .clients .swiper-slide img:hover {
            filter: none;
            opacity: 1;
        }

        /*--------------------------------------------------------------
        # Call To Action Section
        --------------------------------------------------------------*/
        .cta {
            padding: 0;
            margin-bottom: 60px;
        }

        .cta .container {
            padding: 80px;
            background: rgba(var(--color-secondary-rgb), 0.1);
            border-radius: 15px;
        }

        @media (max-width: 992px) {
            .cta .container {
                padding: 60px;
            }
        }

        .cta .content h3 {
            color: var(--color-secondary);
            font-size: 48px;
            font-weight: 700;
        }

        .cta .content h3 em {
            font-style: normal;
            position: relative;
        }

        .cta .content h3 em:after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: 10px;
            height: 10px;
            background: rgba(var(--color-primary-rgb), 0.5);
            z-index: -1;
        }

        .cta .content p {
            color: var(--color-secondary);
            font-weight: 600;
            font-size: 18px;
        }

        .cta .content .cta-btn {
            color: var(--color-white);
            font-weight: 500;
            font-size: 16px;
            display: inline-block;
            padding: 12px 40px;
            border-radius: 5px;
            transition: 0.5s;
            margin-top: 10px;
            background: rgba(var(--color-primary-dark-rgb), 0.9);
        }

        .cta .content .cta-btn:hover {
            background: var(--color-primary);
        }

        .cta .img {
            position: relative;
        }

        .cta .img:before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(var(--color-white-rgb), 0.5);
            border-radius: 15px;
            transform: rotate(12deg);
        }

        .cta .img:after {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(var(--color-white-rgb), 0.9);
            border-radius: 15px;
            transform: rotate(6deg);
        }

        .cta .img img {
            position: relative;
            z-index: 3;
            border-radius: 15px;
        }

        /*--------------------------------------------------------------
        # On Focus Section
        --------------------------------------------------------------*/
        .onfocus {
            padding: 0;
        }

        .onfocus .video-play {
            min-height: 400px;
            background: linear-gradient(rgba(var(--color-black-rgb), 0.4), rgba(var(--color-black-rgb), 0.7)), url("../img/onfocus-video-bg.jpg") center center;
            background-size: cover;
        }

        .onfocus .content {
            background: linear-gradient(rgba(var(--color-secondary-rgb), 0.5), rgba(var(--color-secondary-rgb), 0.8)), url("../img/onfocus-content-bg.jpg") center center;
            background-size: cover;
            color: rgba(var(--color-white-rgb), 0.8);
            padding: 40px;
        }

        @media (min-width: 768px) {
            .onfocus .content {
                padding: 80px;
            }
        }

        .onfocus .content h3 {
            font-weight: 600;
            font-size: 32px;
            color: var(--color-white);
        }

        .onfocus .content ul {
            list-style: none;
            padding: 0;
        }

        .onfocus .content ul li {
            padding-bottom: 10px;
        }

        .onfocus .content ul i {
            font-size: 20px;
            padding-right: 4px;
            color: var(--color-primary);
        }

        .onfocus .content p:last-child {
            margin-bottom: 0;
        }

        .onfocus .content .read-more {
            font-family: var(--font-primary);
            font-weight: 500;
            font-size: 16px;
            letter-spacing: 1px;
            padding: 12px 24px;
            border-radius: 5px;
            transition: 0.3s;
            display: -nline-flex;
            align-items: center;
            justify-content: center;
            color: var(--color-white);
            background: var(--color-primary);
        }

        .onfocus .content .read-more i {
            font-size: 18px;
            margin-left: 5px;
            line-height: 0;
            transition: 0.3s;
        }

        .onfocus .content .read-more:hover {
            background: rgba(var(--color-primary-rgb), 0.9);
            padding-right: 19px;
        }

        .onfocus .content .read-more:hover i {
            margin-left: 10px;
        }

        .onfocus .play-btn {
            width: 94px;
            height: 94px;
            background: radial-gradient(var(--color-primary) 50%, rgba(var(--color-primary-rgb), 0.4) 52%);
            border-radius: 50%;
            display: block;
            position: absolute;
            left: calc(50% - 47px);
            top: calc(50% - 47px);
            overflow: hidden;
        }

        .onfocus .play-btn:before {
            content: "";
            position: absolute;
            width: 120px;
            height: 120px;
            -webkit-animation-delay: 0s;
            animation-delay: 0s;
            -webkit-animation: pulsate-btn 2s;
            animation: pulsate-btn 2s;
            -webkit-animation-direction: forwards;
            animation-direction: forwards;
            -webkit-animation-iteration-count: infinite;
            animation-iteration-count: infinite;
            -webkit-animation-timing-function: steps;
            animation-timing-function: steps;
            opacity: 1;
            border-radius: 50%;
            border: 5px solid rgba(var(--color-primary-rgb), 0.7);
            top: -15%;
            left: -15%;
            background: rgba(198, 16, 0, 0);
        }

        .onfocus .play-btn:after {
            content: "";
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translateX(-40%) translateY(-50%);
            width: 0;
            height: 0;
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
            border-left: 15px solid var(--color-white);
            z-index: 100;
            transition: all 400ms cubic-bezier(0.55, 0.055, 0.675, 0.19);
        }

        .onfocus .play-btn:hover:before {
            content: "";
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translateX(-40%) translateY(-50%);
            width: 0;
            height: 0;
            border: none;
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
            border-left: 15px solid var(--color-white);
            z-index: 200;
            -webkit-animation: none;
            animation: none;
            border-radius: 0;
        }

        .onfocus .play-btn:hover:after {
            border-left: 15px solid var(--color-primary);
            transform: scale(20);
        }

        @-webkit-keyframes pulsate-btn {
            0% {
                transform: scale(0.6, 0.6);
                opacity: 1;
            }

            100% {
                transform: scale(1, 1);
                opacity: 0;
            }
        }

        @keyframes pulsate-btn {
            0% {
                transform: scale(0.6, 0.6);
                opacity: 1;
            }

            100% {
                transform: scale(1, 1);
                opacity: 0;
            }
        }

        /*--------------------------------------------------------------
        # Features Section
        --------------------------------------------------------------*/
        .features .nav-tabs {
            border: 0;
        }

        .features .nav-link {
            border: 0;
            padding: 25px 20px;
            color: var(--color-secondary);
            box-shadow: 5px 5px 25px rgba(var(--color-secondary-rgb), 0.15);
            border-radius: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            transition: 0s;
            cursor: pointer;
            height: 100%;
        }

        .features .nav-link i {
            font-size: 32px;
            line-height: 0;
        }

        .features .nav-link h4 {
            font-size: 20px;
            font-weight: 600;
            margin: 10px 0 0 0;
            color: var(--color-secondary);
        }

        .features .nav-link:hover {
            color: var(--color-primary);
        }

        .features .nav-link.active {
            transition: 0.3s;
            background: var(--color-secondary) linear-gradient(rgba(var(--color-primary-rgb), 0.95), rgba(var(--color-primary-rgb), 0.6));
            border-color: var(--color-primary);
        }

        .features .nav-link.active h4 {
            color: var(--color-white);
        }

        .features .nav-link.active i {
            color: var(--color-white) !important;
        }

        .features .tab-content {
            margin-top: 30px;
        }

        .features .tab-pane.active {
            -webkit-animation: fadeIn 0.5s ease-out;
            animation: fadeIn 0.5s ease-out;
        }

        .features .tab-pane h3 {
            font-weight: 600;
            font-size: 36px;
            color: var(--color-secondary);
        }

        .features .tab-pane ul {
            list-style: none;
            padding: 0;
        }

        .features .tab-pane ul li {
            padding-bottom: 10px;
        }

        .features .tab-pane ul i {
            font-size: 24px;
            margin-right: 4px;
            color: var(--color-primary);
        }

        .features .tab-pane p:last-child {
            margin-bottom: 0;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        /*--------------------------------------------------------------
        # Services Section
        --------------------------------------------------------------*/
        .services .img {
            border-radius: 8px;
            overflow: hidden;
        }

        .services .img img {
            transition: 0.6s;
        }

        .services .details {
            padding: 50px 30px;
            margin: -100px 30px 0 30px;
            transition: all ease-in-out 0.3s;
            background: var(--color-white);
            position: relative;
            background: rgba(var(--color-white-rgb), 0.9);
            text-align: center;
            border-radius: 8px;
            box-shadow: 0px 0 25px rgba(var(--color-black-rgb), 0.1);
        }

        .services .details .icon {
            margin: 0;
            width: 72px;
            height: 72px;
            background: var(--color-primary);
            border-radius: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            color: var(--color-white);
            font-size: 28px;
            transition: ease-in-out 0.3s;
            position: absolute;
            top: -36px;
            left: calc(50% - 36px);
            border: 6px solid var(--color-white);
        }

        .services .details h3 {
            color: var(--color-default);
            font-weight: 700;
            margin: 10px 0 15px 0;
            font-size: 22px;
            transition: ease-in-out 0.3s;
        }

        .services .details p {
            line-height: 24px;
            font-size: 14px;
            margin-bottom: 0;
        }

        .services .service-item:hover .details h3 {
            color: var(--color-primary);
        }

        .services .service-item:hover .details .icon {
            background: var(--color-white);
            border: 2px solid var(--color-primary);
        }

        .services .service-item:hover .details .icon i {
            color: var(--color-primary);
        }

        .services .service-item:hover .img img {
            transform: scale(1.2);
        }

        /*--------------------------------------------------------------
        # Testimonials Section
        --------------------------------------------------------------*/
        .testimonials {
            padding: 80px 0;
            background: url("../img/testimonials-bg.jpg") no-repeat;
            background-position: center center;
            background-size: cover;
            position: relative;
        }

        .testimonials::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(var(--color-secondary-dark-rgb), 0.8);
        }

        .testimonials .section-header {
            margin-bottom: 40px;
        }

        .testimonials .testimonials-carousel,
        .testimonials .testimonials-slider {
            overflow: hidden;
        }

        .testimonials .testimonial-item {
            text-align: center;
            color: var(--color-white);
        }

        .testimonials .testimonial-item .testimonial-img {
            width: 100px;
            border-radius: 50%;
            border: 6px solid rgba(var(--color-white-rgb), 0.15);
            margin: 0 auto;
        }

        .testimonials .testimonial-item h3 {
            font-size: 20px;
            font-weight: bold;
            margin: 10px 0 5px 0;
            color: var(--color-white);
        }

        .testimonials .testimonial-item h4 {
            font-size: 14px;
            color: rgba(var(--color-white-rgb), 0.6);
            margin: 0 0 15px 0;
        }

        .testimonials .testimonial-item .stars {
            margin-bottom: 15px;
        }

        .testimonials .testimonial-item .stars i {
            color: var(--color-yellow);
            margin: 0 1px;
        }

        .testimonials .testimonial-item .quote-icon-left,
        .testimonials .testimonial-item .quote-icon-right {
            color: rgba(var(--color-white-rgb), 0.6);
            font-size: 26px;
            line-height: 0;
        }

        .testimonials .testimonial-item .quote-icon-left {
            display: inline-block;
            left: -5px;
            position: relative;
        }

        .testimonials .testimonial-item .quote-icon-right {
            display: inline-block;
            right: -5px;
            position: relative;
            top: 10px;
            transform: scale(-1, -1);
        }

        .testimonials .testimonial-item p {
            font-style: italic;
            margin: 0 auto 15px auto;
        }

        .testimonials .swiper-pagination {
            margin-top: 20px;
            position: relative;
        }

        .testimonials .swiper-pagination .swiper-pagination-bullet {
            width: 12px;
            height: 12px;
            background-color: rgba(var(--color-white-rgb), 0.4);
            opacity: 0.5;
        }

        .testimonials .swiper-pagination .swiper-pagination-bullet-active {
            background-color: var(--color-white);
            opacity: 1;
        }

        @media (min-width: 992px) {
            .testimonials .testimonial-item p {
                width: 80%;
            }
        }

        /*--------------------------------------------------------------
        # Pricing Section
        --------------------------------------------------------------*/
        .pricing {
            background: rgba(var(--color-secondary-rgb), 0.04);
        }

        .pricing .pricing-item {
            padding: 60px 40px;
            box-shadow: 0 3px 20px -2px rgba(var(--color-gray-rgb), 0.15);
            background: var(--color-white);
            height: 100%;
            display: flex;
            flex-direction: column;
            border: 4px solid var(--color-white);
            border-radius: 10px;
            overflow: hidden;
        }

        .pricing .pricing-header {
            background: linear-gradient(rgba(var(--color-secondary-rgb), 0.9), rgba(var(--color-secondary-rgb), 0.9)), url("../img/pricing-bg.jpg") center center;
            background-size: cover;
            text-align: center;
            padding: 40px;
            margin: -60px -40px 0;
        }

        .pricing h3 {
            font-weight: 600;
            margin-bottom: 5px;
            font-size: 36px;
            color: var(--color-white);
        }

        .pricing h4 {
            font-size: 48px;
            color: var(--color-white);
            font-weight: 400;
            font-family: var(--font-primary);
            margin-bottom: 0;
        }

        .pricing h4 sup {
            font-size: 28px;
        }

        .pricing h4 span {
            color: rgba(var(--color-white-rgb), 0.6);
            font-size: 24px;
        }

        .pricing ul {
            padding: 30px 0;
            list-style: none;
            color: var(--color-gray);
            text-align: left;
            line-height: 20px;
        }

        .pricing ul li {
            padding: 10px 0;
            display: flex;
            align-items: center;
        }

        .pricing ul i {
            color: var(--color-primary);
            font-size: 36px;
            padding-right: 3px;
            line-height: 0;
        }

        .pricing ul .na {
            color: rgba(var(--color-gray-rgb), 0.5);
        }

        .pricing ul .na i {
            color: rgba(var(--color-gray-rgb), 0.5);
            font-size: 24px;
            padding-left: 4px;
        }

        .pricing ul .na span {
            text-decoration: line-through;
        }

        .pricing .buy-btn {
            display: inline-block;
            padding: 12px 40px;
            border-radius: 6px;
            color: var(--color-primary);
            transition: none;
            font-size: 16px;
            font-weight: 700;
            transition: 0.3s;
            border: 1px solid var(--color-primary);
        }

        .pricing .buy-btn:hover {
            background: var(--color-primary);
            color: var(--color-white);
        }

        .pricing .featured {
            border-color: var(--color-primary);
        }

        .pricing .featured .pricing-header {
            background: linear-gradient(rgba(var(--color-primary-rgb), 0.9), rgba(var(--color-primary-rgb), 0.9)), url("../img/pricing-bg.jpg") center center;
        }

        .pricing .featured .buy-btn {
            background: var(--color-primary);
            color: var(--color-white);
        }

        /*--------------------------------------------------------------
        # F.A.Q Section
        --------------------------------------------------------------*/
        @media (max-width: 991px) {
            .faq {
                padding: 0;
            }
        }

        .faq .content h3 {
            font-weight: 400;
            font-size: 34px;
            color: var(--color-secondary);
        }

        .faq .content h4 {
            font-size: 20px;
            font-weight: 700;
            margin-top: 5px;
        }

        .faq .content p {
            font-size: 15px;
            color: var(--color-gray);
        }

        .faq .img {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            min-height: 400px;
        }

        .faq .accordion-item {
            border: 0;
            margin-top: 15px;
            box-shadow: 0px 5px 25px 0px rgba(var(--color-black-rgb), 0.06);
        }

        .faq .accordion-collapse {
            border: 0;
        }

        .faq .accordion-button {
            padding: 15px 40px 20px 60px;
            font-weight: 600;
            border: 0;
            font-size: 18px;
            color: var(--color-default);
            text-align: left;
            background: var(--color-white);
            box-shadow: none;
            border-radius: 5px;
        }

        .faq .accordion-button:not(.collapsed) {
            color: var(--color-primary);
            border-bottom: 0;
            box-shadow: none;
        }

        .faq .question-icon {
            position: absolute;
            top: 14px;
            left: 25px;
            font-size: 20px;
            color: var(--color-primary);
        }

        .faq .accordion-button:after {
            position: absolute;
            right: 15px;
            top: 15px;
            color: var(--color-primary);
        }

        .faq .accordion-body {
            padding: 0 30px 25px 60px;
            border: 0;
            border-radius: 5px;
            background: var(--color-white);
            box-shadow: none;
        }

        /*--------------------------------------------------------------
        # Portfolio Section
        --------------------------------------------------------------*/
        .portfolio .portfolio-flters {
            padding: 0;
            margin: 0 auto 30px auto;
            list-style: none;
            text-align: center;
        }

        .portfolio .portfolio-flters li {
            cursor: pointer;
            display: inline-block;
            padding: 0;
            font-size: 18px;
            font-weight: 300;
            margin: 0 10px;
            line-height: 1;
            margin-bottom: 5px;
            transition: all 0.3s ease-in-out;
        }

        .portfolio .portfolio-flters li:hover,
        .portfolio .portfolio-flters li.filter-active {
            color: var(--color-primary);
        }

        .portfolio .portfolio-flters li:first-child {
            margin-left: 0;
        }

        .portfolio .portfolio-flters li:last-child {
            margin-right: 0;
        }

        @media (max-width: 575px) {
            .portfolio .portfolio-flters li {
                font-size: 14px;
                margin: 0 5px;
            }
        }

        .portfolio .portfolio-item {
            position: relative;
            border: 1px solid var(--color-white);
            overflow: hidden;
            z-index: 1;
        }

        .portfolio .portfolio-item img {
            transition: all 0.3s;
        }

        .portfolio .portfolio-item:before {
            content: "";
            inset: 0;
            position: absolute;
            background: rgba(var(--color-secondary-rgb), 0.8);
            z-index: 2;
            transition: 0.5s;
            visibility: hidden;
            opacity: 0;
        }

        .portfolio .portfolio-item .portfolio-info {
            opacity: 0;
            position: absolute;
            inset: auto 40px 40px 40px;
            z-index: 3;
            transition: all ease-in-out 0.3s;
            padding: 20px;
        }

        .portfolio .portfolio-item .portfolio-info h4 {
            font-size: 18px;
            font-weight: 600;
            color: var(--color-white);
            padding-right: 50px;
        }

        .portfolio .portfolio-item .portfolio-info .preview-link,
        .portfolio .portfolio-item .portfolio-info .details-link {
            position: absolute;
            right: 50px;
            font-size: 24px;
            top: calc(50% - 14px);
            color: rgba(var(--color-white-rgb), 0.7);
            transition: 0.3s;
            line-height: 0;
        }

        .portfolio .portfolio-item .portfolio-info .preview-link:hover,
        .portfolio .portfolio-item .portfolio-info .details-link:hover {
            color: var(--color-white);
        }

        .portfolio .portfolio-item .portfolio-info .details-link {
            right: 14px;
            font-size: 28px;
        }

        .portfolio .portfolio-item:hover:before {
            visibility: visible;
            opacity: 1;
        }

        .portfolio .portfolio-item:hover img {
            transform: scale(1.2);
        }

        .portfolio .portfolio-item:hover .portfolio-info {
            opacity: 1;
            inset: auto 10px 0 10px;
        }

        /*--------------------------------------------------------------
        # Team Section
        --------------------------------------------------------------*/
        .team .team-member .member-img {
            border-radius: 8px;
            overflow: hidden;
        }

        .team .team-member .social {
            position: absolute;
            left: 0;
            top: -18px;
            right: 0;
            opacity: 0;
            transition: ease-in-out 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .team .team-member .social a {
            transition: color 0.3s;
            color: var(--color-white);
            background: var(--color-primary);
            margin: 0 5px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            transition: 0.3s;
        }

        .team .team-member .social a i {
            line-height: 0;
            font-size: 16px;
        }

        .team .team-member .social a:hover {
            background: var(--color-primary-light);
        }

        .team .team-member .social i {
            font-size: 18px;
            margin: 0 2px;
        }

        .team .team-member .member-info {
            padding: 30px 15px;
            text-align: center;
            box-shadow: 0px 2px 15px rgba(var(--color-black-rgb), 0.1);
            background: var(--color-white);
            margin: -50px 20px 0 20px;
            position: relative;
            border-radius: 8px;
        }

        .team .team-member .member-info h4 {
            font-weight: 400;
            margin-bottom: 5px;
            font-size: 24px;
            color: var(--color-secondary);
        }

        .team .team-member .member-info span {
            display: block;
            font-size: 16px;
            font-weight: 400;
            color: var(--color-gray);
        }

        .team .team-member .member-info p {
            font-style: italic;
            font-size: 14px;
            line-height: 26px;
            color: var(--color-gray);
        }

        .team .team-member:hover .social {
            opacity: 1;
        }

        /*--------------------------------------------------------------
        # Recent Blog Posts
        --------------------------------------------------------------*/
        .recent-blog-posts .post-box {
            transition: 0.3s;
            height: 100%;
            overflow: hidden;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .recent-blog-posts .post-box .post-img {
            overflow: hidden;
            position: relative;
            border-radius: 10px;
        }

        .recent-blog-posts .post-box .post-img img {
            transition: 0.5s;
        }

        .recent-blog-posts .post-box .meta {
            margin-top: 15px;
        }

        .recent-blog-posts .post-box .meta .post-date {
            font-size: 15px;
            font-weight: 400;
            color: var(--color-primary);
        }

        .recent-blog-posts .post-box .meta .post-author {
            font-size: 15px;
            font-weight: 400;
            color: var(--color-secondary);
        }

        .recent-blog-posts .post-box .post-title {
            font-size: 24px;
            color: var(--color-secondary);
            font-weight: 700;
            margin: 15px 0 0 0;
            position: relative;
            transition: 0.3s;
        }

        .recent-blog-posts .post-box p {
            margin: 15px 0 0 0;
            color: rgba(var(--color-secondary-dark-rgb), 0.7);
        }

        .recent-blog-posts .post-box .readmore {
            display: flex;
            align-items: center;
            font-weight: 600;
            line-height: 1;
            transition: 0.3s;
            margin-top: 15px;
        }

        .recent-blog-posts .post-box .readmore i {
            line-height: 0;
            margin-left: 4px;
            font-size: 18px;
        }

        .recent-blog-posts .post-box:hover .post-title {
            color: var(--color-primary);
        }

        .recent-blog-posts .post-box:hover .post-img img {
            transform: scale(1.1);
        }

        /*--------------------------------------------------------------
        # Contact Section
        --------------------------------------------------------------*/
        .contact .map {
            margin-bottom: 40px;
        }

        .contact .map iframe {
            border: 0;
            width: 100%;
            height: 400px;
        }

        .contact .info {
            padding: 40px;
            box-shadow: 0px 2px 15px rgba(var(--color-black-rgb), 0.1);
            overflow: hidden;
        }

        .contact .info h3 {
            font-weight: 600;
            font-size: 24px;
        }

        .contact .info p {
            color: var(--color-secondary-light);
            margin-bottom: 30px;
            font-size: 15px;
        }

        .contact .info-item + .info-item {
            padding-top: 20px;
            margin-top: 20px;
            border-top: 1px solid rgba(var(--color-secondary-rgb), 0.15);
        }

        .contact .info-item i {
            font-size: 24px;
            color: var(--color-primary);
            transition: all 0.3s ease-in-out;
            margin-right: 20px;
        }

        .contact .info-item h4 {
            padding: 0;
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--color-secondary);
        }

        .contact .info-item p {
            padding: 0;
            margin-bottom: 0;
            font-size: 14px;
            color: var(--color-secondary-light);
        }

        .contact .php-email-form {
            width: 100%;
            background: var(--color-white);
        }

        .contact .php-email-form .form-group {
            padding-bottom: 8px;
        }

        .contact .php-email-form .error-message {
            display: none;
            color: var(--color-white);
            background: var(--color-red);
            text-align: left;
            padding: 15px;
            font-weight: 600;
        }

        .contact .php-email-form .error-message br + br {
            margin-top: 25px;
        }

        .contact .php-email-form .sent-message {
            display: none;
            color: var(--color-white);
            background: var(--color-green);
            text-align: center;
            padding: 15px;
            font-weight: 600;
        }

        .contact .php-email-form .loading {
            display: none;
            background: var(--color-white);
            text-align: center;
            padding: 15px;
        }

        .contact .php-email-form .loading:before {
            content: "";
            display: inline-block;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            margin: 0 10px -6px 0;
            border: 3px solid var(--color-green);
            border-top-color: var(--color-white);
            -webkit-animation: animate-loading 1s linear infinite;
            animation: animate-loading 1s linear infinite;
        }

        .contact .php-email-form input[type=text],
        .contact .php-email-form input[type=email],
        .contact .php-email-form textarea {
            border-radius: 0px;
            box-shadow: none;
            font-size: 14px;
        }

        .contact .php-email-form input[type=text]:focus,
        .contact .php-email-form input[type=email]:focus,
        .contact .php-email-form textarea:focus {
            border-color: var(--color-secondary-light);
        }

        .contact .php-email-form input[type=text],
        .contact .php-email-form input[type=email] {
            height: 48px;
            padding: 10px 15px;
        }

        .contact .php-email-form textarea {
            padding: 10px 12px;
            height: 290px;
        }

        .contact .php-email-form button[type=submit] {
            background: var(--color-primary);
            border: 0;
            padding: 13px 50px;
            color: var(--color-white);
            transition: 0.4s;
            border-radius: 0;
        }

        .contact .php-email-form button[type=submit]:hover {
            background: rgba(var(--color-primary-rgb), 0.85);
        }

        @-webkit-keyframes animate-loading {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes animate-loading {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /*--------------------------------------------------------------
        # Portfolio Details
        --------------------------------------------------------------*/
        .portfolio-details {
            padding-top: 40px;
        }

        .portfolio-details .portfolio-details-slider img {
            width: 100%;
        }

        .portfolio-details .portfolio-details-slider .swiper-pagination {
            margin-top: 20px;
            position: relative;
        }

        .portfolio-details .portfolio-details-slider .swiper-pagination .swiper-pagination-bullet {
            width: 12px;
            height: 12px;
            background-color: var(--color-white);
            opacity: 1;
            border: 1px solid var(--color-primary);
        }

        .portfolio-details .portfolio-details-slider .swiper-pagination .swiper-pagination-bullet-active {
            background-color: var(--color-primary);
        }

        .portfolio-details .portfolio-info {
            padding: 30px;
            box-shadow: 0px 0 30px rgba(var(--color-secondary-rgb), 0.15);
        }

        .portfolio-details .portfolio-info h3 {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--color-secondary-light);
        }

        .portfolio-details .portfolio-info ul {
            list-style: none;
            padding: 0;
            font-size: 15px;
        }

        .portfolio-details .portfolio-info ul li + li {
            margin-top: 10px;
        }

        .portfolio-details .portfolio-description {
            padding-top: 30px;
        }

        .portfolio-details .portfolio-description h2 {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .portfolio-details .portfolio-description p {
            padding: 0;
        }

        /*--------------------------------------------------------------
        # Blog Stylings
        --------------------------------------------------------------*/
        /*--------------------------------------------------------------
        # Blog Home Posts List
        --------------------------------------------------------------*/
        .blog .posts-list article {
            box-shadow: 0 4px 16px rgba(var(--color-black-rgb), 0.1);
            padding: 30px;
            height: 100%;
        }

        .blog .posts-list article + article {
            margin-top: 60px;
        }

        .blog .posts-list .post-img {
            max-height: 240px;
            margin: -30px -30px 0 -30px;
            overflow: hidden;
        }

        .blog .posts-list .title {
            font-size: 24px;
            font-weight: 700;
            padding: 0;
            margin: 20px 0 0 0;
        }

        .blog .posts-list .title a {
            color: var(--color-secondary);
            transition: 0.3s;
        }

        .blog .posts-list .title a:hover {
            color: var(--color-primary);
        }

        .blog .posts-list .meta-top {
            margin-top: 20px;
            color: var(--color-gray);
        }

        .blog .posts-list .meta-top ul {
            display: flex;
            flex-wrap: wrap;
            list-style: none;
            align-items: center;
            padding: 0;
            margin: 0;
        }

        .blog .posts-list .meta-top ul li + li {
            padding-left: 20px;
        }

        .blog .posts-list .meta-top i {
            font-size: 16px;
            margin-right: 8px;
            line-height: 0;
            color: rgba(var(--color-primary-rgb), 0.8);
        }

        .blog .posts-list .meta-top a {
            color: var(--color-gray);
            font-size: 14px;
            display: inline-block;
            line-height: 1;
        }

        .blog .posts-list .content {
            margin-top: 20px;
        }

        .blog .posts-list .read-more a {
            display: inline-block;
            background: var(--color-primary);
            color: var(--color-white);
            padding: 8px 30px;
            transition: 0.3s;
            font-size: 14px;
            border-radius: 4px;
        }

        .blog .posts-list .read-more a:hover {
            background: rgba(var(--color-primary-rgb), 0.8);
        }

        /*--------------------------------------------------------------
        # Blog Details Page
        --------------------------------------------------------------*/
        .blog .blog-details {
            box-shadow: 0 4px 16px rgba(var(--color-black-rgb), 0.1);
            padding: 30px;
        }

        .blog .blog-details .post-img {
            margin: -30px -30px 20px -30px;
            overflow: hidden;
        }

        .blog .blog-details .title {
            font-size: 28px;
            font-weight: 700;
            padding: 0;
            margin: 20px 0 0 0;
            color: var(--color-secondary);
        }

        .blog .blog-details .content {
            margin-top: 20px;
        }

        .blog .blog-details .content h3 {
            font-size: 22px;
            margin-top: 30px;
            font-weight: bold;
        }

        .blog .blog-details .content blockquote {
            overflow: hidden;
            background-color: rgba(var(--color-secondary-rgb), 0.06);
            padding: 60px;
            position: relative;
            text-align: center;
            margin: 20px 0;
        }

        .blog .blog-details .content blockquote p {
            color: var(--color-default);
            line-height: 1.6;
            margin-bottom: 0;
            font-style: italic;
            font-weight: 500;
            font-size: 22px;
        }

        .blog .blog-details .content blockquote:after {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background-color: var(--color-secondary);
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .blog .blog-details .meta-top {
            margin-top: 20px;
            color: var(--color-gray);
        }

        .blog .blog-details .meta-top ul {
            display: flex;
            flex-wrap: wrap;
            list-style: none;
            align-items: center;
            padding: 0;
            margin: 0;
        }

        .blog .blog-details .meta-top ul li + li {
            padding-left: 20px;
        }

        .blog .blog-details .meta-top i {
            font-size: 16px;
            margin-right: 8px;
            line-height: 0;
            color: rgba(var(--color-primary-rgb), 0.8);
        }

        .blog .blog-details .meta-top a {
            color: var(--color-gray);
            font-size: 14px;
            display: inline-block;
            line-height: 1;
        }

        .blog .blog-details .meta-bottom {
            padding-top: 10px;
            border-top: 1px solid rgba(var(--color-secondary-rgb), 0.15);
        }

        .blog .blog-details .meta-bottom i {
            color: var(--color-secondary-light);
            display: inline;
        }

        .blog .blog-details .meta-bottom a {
            color: rgba(var(--color-secondary-rgb), 0.8);
            transition: 0.3s;
        }

        .blog .blog-details .meta-bottom a:hover {
            color: var(--color-primary);
        }

        .blog .blog-details .meta-bottom .cats {
            list-style: none;
            display: inline;
            padding: 0 20px 0 0;
            font-size: 14px;
        }

        .blog .blog-details .meta-bottom .cats li {
            display: inline-block;
        }

        .blog .blog-details .meta-bottom .tags {
            list-style: none;
            display: inline;
            padding: 0;
            font-size: 14px;
        }

        .blog .blog-details .meta-bottom .tags li {
            display: inline-block;
        }

        .blog .blog-details .meta-bottom .tags li + li::before {
            padding-right: 6px;
            color: var(--color-default);
            content: ",";
        }

        .blog .blog-details .meta-bottom .share {
            font-size: 16px;
        }

        .blog .blog-details .meta-bottom .share i {
            padding-left: 5px;
        }

        .blog .post-author {
            padding: 20px;
            margin-top: 30px;
            box-shadow: 0 4px 16px rgba(var(--color-black-rgb), 0.1);
        }

        .blog .post-author img {
            max-width: 120px;
            margin-right: 20px;
        }

        .blog .post-author h4 {
            font-weight: 600;
            font-size: 22px;
            margin-bottom: 0px;
            padding: 0;
            color: var(--color-secondary);
        }

        .blog .post-author .social-links {
            margin: 0 10px 10px 0;
        }

        .blog .post-author .social-links a {
            color: rgba(var(--color-secondary-rgb), 0.5);
            margin-right: 5px;
        }

        .blog .post-author p {
            font-style: italic;
            color: rgba(var(--color-gray-rgb), 0.8);
            margin-bottom: 0;
        }

        /*--------------------------------------------------------------
        # Blog Sidebar
        --------------------------------------------------------------*/
        .blog .sidebar {
            padding: 30px;
            box-shadow: 0 4px 16px rgba(var(--color-black-rgb), 0.1);
        }

        .blog .sidebar .sidebar-title {
            font-size: 20px;
            font-weight: 700;
            padding: 0;
            margin: 0;
            color: var(--color-secondary);
        }

        .blog .sidebar .sidebar-item + .sidebar-item {
            margin-top: 40px;
        }

        .blog .sidebar .search-form form {
            background: var(--color-white);
            border: 1px solid rgba(var(--color-secondary-rgb), 0.3);
            padding: 3px 10px;
            position: relative;
        }

        .blog .sidebar .search-form form input[type=text] {
            border: 0;
            padding: 4px;
            border-radius: 4px;
            width: calc(100% - 40px);
        }

        .blog .sidebar .search-form form input[type=text]:focus {
            outline: none;
        }

        .blog .sidebar .search-form form button {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            border: 0;
            background: none;
            font-size: 16px;
            padding: 0 15px;
            margin: -1px;
            background: var(--color-primary);
            color: var(--color-white);
            transition: 0.3s;
            border-radius: 0 4px 4px 0;
            line-height: 0;
        }

        .blog .sidebar .search-form form button i {
            line-height: 0;
        }

        .blog .sidebar .search-form form button:hover {
            background: rgba(var(--color-primary-rgb), 0.8);
        }

        .blog .sidebar .categories ul {
            list-style: none;
            padding: 0;
        }

        .blog .sidebar .categories ul li + li {
            padding-top: 10px;
        }

        .blog .sidebar .categories ul a {
            color: var(--color-secondary);
            transition: 0.3s;
        }

        .blog .sidebar .categories ul a:hover {
            color: var(--color-default);
        }

        .blog .sidebar .categories ul a span {
            padding-left: 5px;
            color: rgba(var(--color-default-rgb), 0.4);
            font-size: 14px;
        }

        .blog .sidebar .recent-posts .post-item {
            display: flex;
        }

        .blog .sidebar .recent-posts .post-item + .post-item {
            margin-top: 15px;
        }

        .blog .sidebar .recent-posts img {
            width: 80px;
            margin-right: 15px;
        }

        .blog .sidebar .recent-posts h4 {
            font-size: 18px;
            font-weight: 400;
        }

        .blog .sidebar .recent-posts h4 a {
            color: var(--color-secondary);
            transition: 0.3s;
        }

        .blog .sidebar .recent-posts h4 a:hover {
            color: var(--color-primary);
        }

        .blog .sidebar .recent-posts time {
            display: block;
            font-style: italic;
            font-size: 14px;
            color: rgba(var(--color-default-rgb), 0.4);
        }

        .blog .sidebar .tags {
            margin-bottom: -10px;
        }

        .blog .sidebar .tags ul {
            list-style: none;
            padding: 0;
        }

        .blog .sidebar .tags ul li {
            display: inline-block;
        }

        .blog .sidebar .tags ul a {
            color: var(--color-secondary-light);
            font-size: 14px;
            padding: 6px 14px;
            margin: 0 6px 8px 0;
            border: 1px solid rgba(var(--color-secondary-light-rgb), 0.8);
            display: inline-block;
            transition: 0.3s;
        }

        .blog .sidebar .tags ul a:hover {
            color: var(--color-white);
            border: 1px solid var(--color-primary);
            background: var(--color-primary);
        }

        .blog .sidebar .tags ul a span {
            padding-left: 5px;
            color: rgba(var(--color-secondary-light-rgb), 0.8);
            font-size: 14px;
        }

        /*--------------------------------------------------------------
        # Blog Comments
        --------------------------------------------------------------*/
        .blog .comments {
            margin-top: 30px;
        }

        .blog .comments .comments-count {
            font-weight: bold;
        }

        .blog .comments .comment {
            margin-top: 30px;
            position: relative;
        }

        .blog .comments .comment .comment-img {
            margin-right: 14px;
        }

        .blog .comments .comment .comment-img img {
            width: 60px;
        }

        .blog .comments .comment h5 {
            font-size: 16px;
            margin-bottom: 2px;
        }

        .blog .comments .comment h5 a {
            font-weight: bold;
            color: var(--color-default);
            transition: 0.3s;
        }

        .blog .comments .comment h5 a:hover {
            color: var(--color-primary);
        }

        .blog .comments .comment h5 .reply {
            padding-left: 10px;
            color: var(--color-secondary);
        }

        .blog .comments .comment h5 .reply i {
            font-size: 20px;
        }

        .blog .comments .comment time {
            display: block;
            font-size: 14px;
            color: rgba(var(--color-secondary-rgb), 0.8);
            margin-bottom: 5px;
        }

        .blog .comments .comment.comment-reply {
            padding-left: 40px;
        }

        .blog .comments .reply-form {
            margin-top: 30px;
            padding: 30px;
            box-shadow: 0 4px 16px rgba(var(--color-black-rgb), 0.1);
        }

        .blog .comments .reply-form h4 {
            font-weight: bold;
            font-size: 22px;
        }

        .blog .comments .reply-form p {
            font-size: 14px;
        }

        .blog .comments .reply-form input {
            border-radius: 4px;
            padding: 10px 10px;
            font-size: 14px;
        }

        .blog .comments .reply-form input:focus {
            box-shadow: none;
            border-color: rgba(var(--color-primary-rgb), 0.8);
        }

        .blog .comments .reply-form textarea {
            border-radius: 4px;
            padding: 10px 10px;
            font-size: 14px;
        }

        .blog .comments .reply-form textarea:focus {
            box-shadow: none;
            border-color: rgba(var(--color-primary-rgb), 0.8);
        }

        .blog .comments .reply-form .form-group {
            margin-bottom: 25px;
        }

        .blog .comments .reply-form .btn-primary {
            border-radius: 4px;
            padding: 10px 20px;
            border: 0;
            background-color: var(--color-secondary);
        }

        .blog .comments .reply-form .btn-primary:hover {
            background-color: rgba(var(--color-secondary-rgb), 0.8);
        }

        /*--------------------------------------------------------------
        # Blog Home Pagination
        --------------------------------------------------------------*/
        .blog .blog-pagination {
            margin-top: 30px;
            color: var(--color-secondary-light);
        }

        .blog .blog-pagination ul {
            display: flex;
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .blog .blog-pagination li {
            margin: 0 5px;
            transition: 0.3s;
        }

        .blog .blog-pagination li a {
            color: var(--color-secondary);
            padding: 7px 16px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .blog .blog-pagination li.active,
        .blog .blog-pagination li:hover {
            background: var(--color-primary);
        }

        .blog .blog-pagination li.active a,
        .blog .blog-pagination li:hover a {
            color: var(--color-white);
        }

        /*--------------------------------------------------------------
        # Footer
        --------------------------------------------------------------*/
        .footer {
            color: var(--color-white);
            font-size: 14px;
        }

        .footer .footer-content {
            background: var(--color-secondary);
            padding: 60px 0 30px 0;
        }

        .footer .footer-content .footer-info {
            margin-bottom: 30px;
        }

        .footer .footer-content .footer-info h3 {
            font-size: 28px;
            margin: 0 0 20px 0;
            padding: 2px 0 2px 0;
            line-height: 1;
            font-weight: 700;
            text-transform: uppercase;
        }

        .footer .footer-content .footer-info h3 span {
            color: var(--color-primary);
        }

        .footer .footer-content .footer-info p {
            font-size: 14px;
            line-height: 24px;
            margin-bottom: 0;
            font-family: var(--font-primary);
            color: var(--color-white);
        }

        .footer .footer-content h4 {
            font-size: 16px;
            font-weight: 600;
            color: var(--color-white);
            position: relative;
            padding-bottom: 12px;
            margin-bottom: 15px;
        }

        .footer .footer-content h4::after {
            content: "";
            position: absolute;
            display: block;
            width: 20px;
            height: 2px;
            background: var(--color-primary);
            bottom: 0;
            left: 0;
        }

        .footer .footer-content .footer-links {
            margin-bottom: 30px;
        }

        .footer .footer-content .footer-links ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer .footer-content .footer-links ul i {
            padding-right: 2px;
            color: var(--color-white);
            font-size: 12px;
            line-height: 1;
        }

        .footer .footer-content .footer-links ul li {
            padding: 10px 0;
            display: flex;
            align-items: center;
        }

        .footer .footer-content .footer-links ul li:first-child {
            padding-top: 0;
        }

        .footer .footer-content .footer-links ul a {
            color: rgba(var(--color-white-rgb), 0.7);
            transition: 0.3s;
            display: inline-block;
            line-height: 1;
        }

        .footer .footer-content .footer-links ul a:hover {
            color: var(--color-white);
        }

        .footer .footer-content .footer-newsletter form {
            margin-top: 30px;
            background: var(--color-white);
            padding: 6px 10px;
            position: relative;
            border-radius: 4px;
        }

        .footer .footer-content .footer-newsletter form input[type=email] {
            border: 0;
            padding: 4px;
            width: calc(100% - 110px);
        }

        .footer .footer-content .footer-newsletter form input[type=email]:focus-visible {
            outline: none;
        }

        .footer .footer-content .footer-newsletter form input[type=submit] {
            position: absolute;
            top: 0;
            right: -2px;
            bottom: 0;
            border: 0;
            background: none;
            font-size: 16px;
            padding: 0 20px;
            background: var(--color-primary);
            color: var(--color-white);
            transition: 0.3s;
            border-radius: 0 4px 4px 0;
        }

        .footer .footer-content .footer-newsletter form input[type=submit]:hover {
            background: rgba(var(--color-primary-rgb), 0.85);
        }

        .footer .footer-legal {
            padding: 30px 0;
            background: var(--color-secondary-dark);
        }

        .footer .footer-legal .credits {
            padding-top: 4px;
            font-size: 13px;
            color: var(--color-white);
        }

        .footer .footer-legal .credits a {
            color: var(--color-primary-light);
        }

        .footer .footer-legal .social-links a {
            font-size: 18px;
            display: inline-block;
            background: rgba(var(--color-white-rgb), 0.1);
            color: var(--color-white);
            line-height: 1;
            padding: 8px 0;
            margin-right: 4px;
            border-radius: 4px;
            text-align: center;
            width: 36px;
            height: 36px;
            transition: 0.3s;
        }

        .footer .footer-legal .social-links a:hover {
            background: var(--color-primary);
            text-decoration: none;
        }
    </style>

</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">

        <a href="index.php" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
            <h1>Pembayaran SPP</h1>
        </a>

        <!--        <nav id="navbar" class="navbar">-->
        <!--            <ul>-->
        <!---->
        <!--                <li class="dropdown"><a href="#"><span>Home</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>-->
        <!--                    <ul>-->
        <!--                        <li><a href="index.html" class="active">Home 1 - index.html</a></li>-->
        <!--                        <li><a href="index-2.html">Home 2 - index-2.html</a></li>-->
        <!--                        <li><a href="index-3.html">Home 3 - index-3.html</a></li>-->
        <!--                        <li><a href="index-4.html">Home 4 - index-4.html</a></li>-->
        <!--                    </ul>-->
        <!--                </li>-->
        <!---->
        <!--                <li><a class="nav-link scrollto" href="index.html#about">About</a></li>-->
        <!--                <li><a class="nav-link scrollto" href="index.html#services">Services</a></li>-->
        <!--                <li><a class="nav-link scrollto" href="index.html#portfolio">Portfolio</a></li>-->
        <!--                <li><a class="nav-link scrollto" href="index.html#team">Team</a></li>-->
        <!--                <li><a href="blog.html">Blog</a></li>-->
        <!--                <li class="dropdown megamenu"><a href="#"><span>Mega Menu</span> <i-->
        <!--                                class="bi bi-chevron-down dropdown-indicator"></i></a>-->
        <!--                    <ul>-->
        <!--                        <li>-->
        <!--                            <a href="#">Column 1 link 1</a>-->
        <!--                            <a href="#">Column 1 link 2</a>-->
        <!--                            <a href="#">Column 1 link 3</a>-->
        <!--                        </li>-->
        <!--                        <li>-->
        <!--                            <a href="#">Column 2 link 1</a>-->
        <!--                            <a href="#">Column 2 link 2</a>-->
        <!--                            <a href="#">Column 3 link 3</a>-->
        <!--                        </li>-->
        <!--                        <li>-->
        <!--                            <a href="#">Column 3 link 1</a>-->
        <!--                            <a href="#">Column 3 link 2</a>-->
        <!--                            <a href="#">Column 3 link 3</a>-->
        <!--                        </li>-->
        <!--                        <li>-->
        <!--                            <a href="#">Column 4 link 1</a>-->
        <!--                            <a href="#">Column 4 link 2</a>-->
        <!--                            <a href="#">Column 4 link 3</a>-->
        <!--                        </li>-->
        <!--                    </ul>-->
        <!--                </li>-->
        <!--                <li class="dropdown"><a href="#"><span>Drop Down</span> <i-->
        <!--                                class="bi bi-chevron-down dropdown-indicator"></i></a>-->
        <!--                    <ul>-->
        <!--                        <li><a href="#">Drop Down 1</a></li>-->
        <!--                        <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i-->
        <!--                                        class="bi bi-chevron-down dropdown-indicator"></i></a>-->
        <!--                            <ul>-->
        <!--                                <li><a href="#">Deep Drop Down 1</a></li>-->
        <!--                                <li><a href="#">Deep Drop Down 2</a></li>-->
        <!--                                <li><a href="#">Deep Drop Down 3</a></li>-->
        <!--                                <li><a href="#">Deep Drop Down 4</a></li>-->
        <!--                                <li><a href="#">Deep Drop Down 5</a></li>-->
        <!--                            </ul>-->
        <!--                        </li>-->
        <!--                        <li><a href="#">Drop Down 2</a></li>-->
        <!--                        <li><a href="#">Drop Down 3</a></li>-->
        <!--                        <li><a href="#">Drop Down 4</a></li>-->
        <!--                    </ul>-->
        <!--                </li>-->
        <!--                <li><a class="nav-link scrollto" href="index.html#contact">Contact</a></li>-->
        <!--            </ul>-->
        <!--            <i class="bi bi-list mobile-nav-toggle d-none"></i>-->
        <!--        </nav>-->

        <a class="btn-getstarted scrollto" href="src/models/auth/index.php">Pusat Login dan Register</a>

    </div>
</header>

<section id="hero-animated" class="hero-animated d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative"
         data-aos="zoom-out">
        <img src="src/images/undraw_Mobile_payments_re_7udl.png" width="200px" height="200px"
             class="img-fluid animated">
        <h2 style="font-size: 34px;">
            Konfirmasi Pembayaran SPP Secara Online
        </h2>
        <p style="font-size: 18px;">
            Dengan layanan pembayaran SPP online, siswa dapat dengan mudah melakukan konfirmasi pembayaran dan melihat
            riwayat pembayaran mereka secara online.
        </p>
        <div class="d-flex">
            <a href="src/models/auth/login_siswa.php" class="btn-get-started scrollto">Login
                sebagai Siswa</a>
            <a href="src/models/auth/login_petugas.php"
               class="btn-watch-video d-flex align-items-center"><span>Login sebagai Petugas</span></a>
        </div>
    </div>
</section>

<main id="main">


    <hr>
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>About Us</h2>
                <p>
                    Dengan layanan pembayaran SPP online, siswa dapat dengan mudah melakukan konfirmasi pembayaran dan
                    melihat riwayat pembayaran mereka secara online. Sistem ini memungkinkan siswa untuk menghindari
                    antrean panjang di kantor keuangan sekolah dan membayar SPP dengan mudah melalui internet. Selain
                    itu, fitur riwayat pembayaran memungkinkan siswa untuk melacak status pembayaran mereka dan
                    memastikan bahwa pembayaran mereka telah diterima oleh pihak sekolah. Dengan layanan pembayaran SPP
                    online, siswa dapat menghemat waktu dan tenaga, sehingga dapat lebih fokus pada kegiatan
                    belajar-mengajar.

                </p>
            </div>

            <!--            <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">-->
            <!---->
            <!--                <div class="col-lg-5">-->
            <!--                    <div class="about-img">-->
            <!--                        <img src="src/images/undraw_Mobile_payments_re_7udl.png" class="img-fluid" alt="">-->
            <!--                    </div>-->
            <!--                </div>-->
            <!---->
            <!--                <div class="col-lg-7">-->
            <!--                    <h3 class="pt-0 pt-lg-5">Neque officiis dolore maiores et exercitationem quae est seda lidera pat-->
            <!--                        claero</h3>-->
            <!---->
            <!--                    <ul class="nav nav-pills mb-3">-->
            <!--                        <li><a class="nav-link active" data-bs-toggle="pill" href="#tab1">Saepe fuga</a></li>-->
            <!--                        <li><a class="nav-link" data-bs-toggle="pill" href="#tab2">Voluptates</a></li>-->
            <!--                        <li><a class="nav-link" data-bs-toggle="pill" href="#tab3">Corrupti</a></li>-->
            <!--                    </ul>-->
            <!---->
            <!--                    <div class="tab-content">-->
            <!---->
            <!--                        <div class="tab-pane fade show active" id="tab1">-->
            <!---->
            <!--                            <p class="fst-italic">Consequuntur inventore voluptates consequatur aut vel et. Eos-->
            <!--                                doloribus expedita. Sapiente atque consequatur minima nihil quae aspernatur quo suscipit-->
            <!--                                voluptatem.</p>-->
            <!---->
            <!--                            <div class="d-flex align-items-center mt-4">-->
            <!--                                <i class="bi bi-check2"></i>-->
            <!--                                <h4>Repudiandae rerum velit modi et officia quasi facilis</h4>-->
            <!--                            </div>-->
            <!--                            <p>Laborum omnis voluptates voluptas qui sit aliquam blanditiis. Sapiente minima commodi-->
            <!--                                dolorum non eveniet magni quaerat nemo et.</p>-->
            <!---->
            <!--                            <div class="d-flex align-items-center mt-4">-->
            <!--                                <i class="bi bi-check2"></i>-->
            <!--                                <h4>Incidunt non veritatis illum ea ut nisi</h4>-->
            <!--                            </div>-->
            <!--                            <p>Non quod totam minus repellendus autem sint velit. Rerum debitis facere soluta tenetur.-->
            <!--                                Iure molestiae assumenda sunt qui inventore eligendi voluptates nisi at. Dolorem quo-->
            <!--                                tempora. Quia et perferendis.</p>-->
            <!---->
            <!--                            <div class="d-flex align-items-center mt-4">-->
            <!--                                <i class="bi bi-check2"></i>-->
            <!--                                <h4>Omnis ab quia nemo dignissimos rem eum quos..</h4>-->
            <!--                            </div>-->
            <!--                            <p>Eius alias aut cupiditate. Dolor voluptates animi ut blanditiis quos nam. Magnam officia-->
            <!--                                aut ut alias quo explicabo ullam esse. Sunt magnam et dolorem eaque magnam odit enim-->
            <!--                                quaerat. Vero error error voluptatem eum.</p>-->
            <!---->
            <!--                        </div>-->
            <!---->
            <!--                        <div class="tab-pane fade show" id="tab2">-->
            <!---->
            <!--                            <p class="fst-italic">Consequuntur inventore voluptates consequatur aut vel et. Eos-->
            <!--                                doloribus expedita. Sapiente atque consequatur minima nihil quae aspernatur quo suscipit-->
            <!--                                voluptatem.</p>-->
            <!---->
            <!--                            <div class="d-flex align-items-center mt-4">-->
            <!--                                <i class="bi bi-check2"></i>-->
            <!--                                <h4>Repudiandae rerum velit modi et officia quasi facilis</h4>-->
            <!--                            </div>-->
            <!--                            <p>Laborum omnis voluptates voluptas qui sit aliquam blanditiis. Sapiente minima commodi-->
            <!--                                dolorum non eveniet magni quaerat nemo et.</p>-->
            <!---->
            <!--                            <div class="d-flex align-items-center mt-4">-->
            <!--                                <i class="bi bi-check2"></i>-->
            <!--                                <h4>Incidunt non veritatis illum ea ut nisi</h4>-->
            <!--                            </div>-->
            <!--                            <p>Non quod totam minus repellendus autem sint velit. Rerum debitis facere soluta tenetur.-->
            <!--                                Iure molestiae assumenda sunt qui inventore eligendi voluptates nisi at. Dolorem quo-->
            <!--                                tempora. Quia et perferendis.</p>-->
            <!---->
            <!--                            <div class="d-flex align-items-center mt-4">-->
            <!--                                <i class="bi bi-check2"></i>-->
            <!--                                <h4>Omnis ab quia nemo dignissimos rem eum quos..</h4>-->
            <!--                            </div>-->
            <!--                            <p>Eius alias aut cupiditate. Dolor voluptates animi ut blanditiis quos nam. Magnam officia-->
            <!--                                aut ut alias quo explicabo ullam esse. Sunt magnam et dolorem eaque magnam odit enim-->
            <!--                                quaerat. Vero error error voluptatem eum.</p>-->
            <!---->
            <!--                        </div>-->
            <!---->
            <!--                        <div class="tab-pane fade show" id="tab3">-->
            <!---->
            <!--                            <p class="fst-italic">Consequuntur inventore voluptates consequatur aut vel et. Eos-->
            <!--                                doloribus expedita. Sapiente atque consequatur minima nihil quae aspernatur quo suscipit-->
            <!--                                voluptatem.</p>-->
            <!---->
            <!--                            <div class="d-flex align-items-center mt-4">-->
            <!--                                <i class="bi bi-check2"></i>-->
            <!--                                <h4>Repudiandae rerum velit modi et officia quasi facilis</h4>-->
            <!--                            </div>-->
            <!--                            <p>Laborum omnis voluptates voluptas qui sit aliquam blanditiis. Sapiente minima commodi-->
            <!--                                dolorum non eveniet magni quaerat nemo et.</p>-->
            <!---->
            <!--                            <div class="d-flex align-items-center mt-4">-->
            <!--                                <i class="bi bi-check2"></i>-->
            <!--                                <h4>Incidunt non veritatis illum ea ut nisi</h4>-->
            <!--                            </div>-->
            <!--                            <p>Non quod totam minus repellendus autem sint velit. Rerum debitis facere soluta tenetur.-->
            <!--                                Iure molestiae assumenda sunt qui inventore eligendi voluptates nisi at. Dolorem quo-->
            <!--                                tempora. Quia et perferendis.</p>-->
            <!---->
            <!--                            <div class="d-flex align-items-center mt-4">-->
            <!--                                <i class="bi bi-check2"></i>-->
            <!--                                <h4>Omnis ab quia nemo dignissimos rem eum quos..</h4>-->
            <!--                            </div>-->
            <!--                            <p>Eius alias aut cupiditate. Dolor voluptates animi ut blanditiis quos nam. Magnam officia-->
            <!--                                aut ut alias quo explicabo ullam esse. Sunt magnam et dolorem eaque magnam odit enim-->
            <!--                                quaerat. Vero error error voluptatem eum.</p>-->
            <!---->
            <!--                        </div>-->
            <!---->
            <!--                    </div>-->
            <!---->
            <!--                </div>-->
            <!---->
            <!--            </div>-->

        </div>
    </section>


    <!--    <section id="cta" class="cta">-->
    <!--        <div class="container" data-aos="zoom-out">-->
    <!---->
    <!--            <div class="row g-5">-->
    <!---->
    <!--                <div class="col-lg-8 col-md-6 content d-flex flex-column justify-content-center order-last order-md-first">-->
    <!--                    <h3>Alias sunt quas <em>Cupiditate</em> oluptas hic minima</h3>-->
    <!--                    <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla-->
    <!--                        pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt-->
    <!--                        mollit anim id est laborum.</p>-->
    <!--                    <a class="cta-btn align-self-start" href="#">Call To Action</a>-->
    <!--                </div>-->
    <!---->
    <!--                <div class="col-lg-4 col-md-6 order-first order-md-last d-flex align-items-center">-->
    <!--                    <div class="img">-->
    <!--                        <img src="assets/img/cta.jpg" alt="" class="img-fluid">-->
    <!--                    </div>-->
    <!--                </div>-->
    <!---->
    <!--            </div>-->
    <!---->
    <!--        </div>-->
    <!--    </section>-->

    <hr>


    <section id="team" class="team">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Team Kami</h2>
                <p>
                    Setiap anggota tim kami memiliki keahlian khusus dalam beberapa area yang berbeda, seperti
                    pengembangan front-end, back-end, basis data, desain, dan manajemen proyek. Dengan bergabungnya
                    keahlian-keahlian ini, kami dapat memberikan layanan lengkap dan menyeluruh dalam pengembangan web,
                    mulai dari desain hingga peluncuran.
                </p>
            </div>

            <div class="row gy-5" style="display: flex;
    justify-content: center;">
                <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="200">
                    <div class="team-member">
                        <div class="member-img">
                            <img src="https://avatars.githubusercontent.com/u/47420407?v=4" class="img-fluid" alt="">
                        </div>
                        <div class="member-info">
                            <div class="social">
                                <a href="https://github.com/aeviterna"><i class="bi bi-github"></i></a>
                                <a href="https://www.instagram.com/yhezkiel.dio/"><i class="bi bi-instagram"></i></a>
                            </div>
                            <h4>Yehezkiel Dio Sinolungan</h4>
                            <span>Lead Developer & System Administrator</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


</main>


<footer id="footer" class="footer">

    <div class="footer-legal text-center">
        <div class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

            <div class="d-flex flex-column align-items-center align-items-lg-start">
                <div class="copyright">
                    &copy; Copyright <strong><span>Yehezkiel Dio</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </div>

        </div>
    </div>

</footer>

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"
        integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"
        integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.2.0/js/glightbox.min.js"
        integrity="sha512-S/H9RQ6govCzeA7F9D0m8NGfsGf0/HjJEiLEfWGaMCjFzavo+DkRbYtZLSO+X6cZsIKQ6JvV/7Y9YMaYnSGnAA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/9.0.5/swiper-bundle.min.js"
        integrity="sha512-cEcJcdNCHLm3YSMAwsI/NeHFqfgNQvO0C27zkPuYZbYjhKlS9+kqO5hZ9YltQ4GaTDpePDQ2SrEk8gHUVaqxig=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Template Main JS File -->
<script>
    /**
     * Template Name: HeroBiz - v2.4.0
     * Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/
     * Author: BootstrapMade.com
     * License: https://bootstrapmade.com/license/
     */
    document.addEventListener('DOMContentLoaded', () => {
        "use strict";

        /**
         * Preloader
         */
        const preloader = document.querySelector('#preloader');
        if (preloader) {
            window.addEventListener('load', () => {
                preloader.remove();
            });
        }

        /**
         * Sticky header on scroll
         */
        const selectHeader = document.querySelector('#header');
        if (selectHeader) {
            document.addEventListener('scroll', () => {
                window.scrollY > 100 ? selectHeader.classList.add('sticked') : selectHeader.classList.remove('sticked');
            });
        }

        /**
         * Navbar links active state on scroll
         */
        let navbarlinks = document.querySelectorAll('#navbar .scrollto');

        function navbarlinksActive() {
            navbarlinks.forEach(navbarlink => {

                if (!navbarlink.hash) return;

                let section = document.querySelector(navbarlink.hash);
                if (!section) return;

                let position = window.scrollY;
                if (navbarlink.hash != '#header') position += 200;

                if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
                    navbarlink.classList.add('active');
                } else {
                    navbarlink.classList.remove('active');
                }
            })
        }

        window.addEventListener('load', navbarlinksActive);
        document.addEventListener('scroll', navbarlinksActive);

        /**
         * Function to scroll to an element with top ofset
         */
        function scrollto(el) {
            const selectHeader = document.querySelector('#header');
            let offset = 0;

            if (selectHeader.classList.contains('sticked')) {
                offset = document.querySelector('#header.sticked').offsetHeight;
            } else if (selectHeader.hasAttribute('data-scrollto-offset')) {
                offset = selectHeader.offsetHeight - parseInt(selectHeader.getAttribute('data-scrollto-offset'));
            }
            window.scrollTo({
                top: document.querySelector(el).offsetTop - offset,
                behavior: 'smooth'
            });
        }

        /**
         * Fires the scrollto function on click to links .scrollto
         */
        let selectScrollto = document.querySelectorAll('.scrollto');
        selectScrollto.forEach(el => el.addEventListener('click', function (event) {
            if (document.querySelector(this.hash)) {
                event.preventDefault();

                let mobileNavActive = document.querySelector('.mobile-nav-active');
                if (mobileNavActive) {
                    mobileNavActive.classList.remove('mobile-nav-active');

                    let navbarToggle = document.querySelector('.mobile-nav-toggle');
                    navbarToggle.classList.toggle('bi-list');
                    navbarToggle.classList.toggle('bi-x');
                }
                scrollto(this.hash);
            }
        }));

        /**
         * Scroll with ofset on page load with hash links in the url
         */
        window.addEventListener('load', () => {
            if (window.location.hash) {
                if (document.querySelector(window.location.hash)) {
                    scrollto(window.location.hash);
                }
            }
        });

        /**
         * Mobile nav toggle
         */
        const mobileNavToogle = document.querySelector('.mobile-nav-toggle');
        if (mobileNavToogle) {
            mobileNavToogle.addEventListener('click', function (event) {
                event.preventDefault();

                document.querySelector('body').classList.toggle('mobile-nav-active');

                this.classList.toggle('bi-list');
                this.classList.toggle('bi-x');
            });
        }

        /**
         * Toggle mobile nav dropdowns
         */
        const navDropdowns = document.querySelectorAll('.navbar .dropdown > a');

        navDropdowns.forEach(el => {
            el.addEventListener('click', function (event) {
                if (document.querySelector('.mobile-nav-active')) {
                    event.preventDefault();
                    this.classList.toggle('active');
                    this.nextElementSibling.classList.toggle('dropdown-active');

                    let dropDownIndicator = this.querySelector('.dropdown-indicator');
                    dropDownIndicator.classList.toggle('bi-chevron-up');
                    dropDownIndicator.classList.toggle('bi-chevron-down');
                }
            })
        });

        /**
         * Auto generate the hero carousel indicators
         */
        let heroCarouselIndicators = document.querySelector('#hero .carousel-indicators');
        if (heroCarouselIndicators) {
            let heroCarouselItems = document.querySelectorAll('#hero .carousel-item')

            heroCarouselItems.forEach((item, index) => {
                if (index === 0) {
                    heroCarouselIndicators.innerHTML += `<li data-bs-target="#hero" data-bs-slide-to="${index}" class="active"></li>`;
                } else {
                    heroCarouselIndicators.innerHTML += `<li data-bs-target="#hero" data-bs-slide-to="${index}"></li>`;
                }
            });
        }

        /**
         * Scroll top button
         */
        const scrollTop = document.querySelector('.scroll-top');
        if (scrollTop) {
            const togglescrollTop = function () {
                window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
            }
            window.addEventListener('load', togglescrollTop);
            document.addEventListener('scroll', togglescrollTop);
            scrollTop.addEventListener('click', window.scrollTo({
                top: 0,
                behavior: 'smooth'
            }));
        }

        /**
         * Initiate glightbox
         */
        const glightbox = GLightbox({
            selector: '.glightbox'
        });

        /**
         * Porfolio isotope and filter
         */


        /**
         * Clients Slider
         */
        new Swiper('.clients-slider', {
            speed: 400,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false
            },
            slidesPerView: 'auto',
            breakpoints: {
                320: {
                    slidesPerView: 2,
                    spaceBetween: 40
                },
                480: {
                    slidesPerView: 3,
                    spaceBetween: 60
                },
                640: {
                    slidesPerView: 4,
                    spaceBetween: 80
                },
                992: {
                    slidesPerView: 6,
                    spaceBetween: 120
                }
            }
        });

        /**
         * Testimonials Slider
         */
        new Swiper('.testimonials-slider', {
            speed: 600,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false
            },
            slidesPerView: 'auto',
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
                clickable: true
            }
        });

        /**
         * Testimonials Slider
         */
        new Swiper('.portfolio-details-slider', {
            speed: 600,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false
            },
            slidesPerView: 'auto',
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
                clickable: true
            }
        });

        /**
         * Animation on scroll function and init
         */
        function aos_init() {
            AOS.init({
                duration: 1000,
                easing: 'ease-in-out',
                once: true,
                mirror: false
            });
        }

        window.addEventListener('load', () => {
            aos_init();
        });

    });
</script>

</body>

</html>
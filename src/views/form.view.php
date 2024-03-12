<?php

use Gabela\Core\Session;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use GeoNames\Client as GeoNamesClient;

$logger = new Logger('Geo-location');
// Now add some handlers
$logger->pushHandler(new StreamHandler('var/System.log', Logger::DEBUG));

$geo = new GeoNamesClient('maneza');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>payfast</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive Minimal Bootstrap Theme">
    <meta name="keywords" content="responsive,minimal,bootstrap,theme">
    <meta name="author" content="">

    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <link rel="stylesheet" href="css/ie.css" type="text/css">
    <![endif]-->

    <!-- CSS Files
    ================================================== -->
    <link rel="stylesheet" href="assets/css/main.css" type="text/css" id="main-css">
    <link rel="stylesheet" href="assets/includes/styles.css" type="text/css">

    <!-- Include SweetAlert2 CSS and JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script async src="https://content.payfast.io/widgets/moretyme/widget.min.js?amount={product_price}" type="text/javascript"></script>

    <!-- Javascript Files
    ================================================== -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.isotope.min.js"></script>
    <script src="assets/js/jquery.prettyPhoto.js"></script>
    <script src="assets/js/easing.js"></script>
    <script src="assets/js/jquery.ui.totop.js"></script>
    <script src="assets/js/selectnav.js"></script>
    <script src="assets/js/ender.js"></script>
    <script src="assets/js/jquery.lazyload.js"></script>
    <script src="assets/js/jquery.flexslider-min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/contact.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
    <div id="wrapper">

        <!-- header begin -->
        <header>
            <div class="info">
                <div class="container">
                    <div class="row">
                        <div class="span6 info-text">
                            <strong>Phone:</strong> (111) 333 7777 <span
                                class="separator"></span><strong>Email:</strong> <a
                                href="#"><?php printValue(Session::getCurrentUserEmail()) ?></a>
                        </div>
                        <div class="span6 text-right">
                            <div class="social-icons">
                                <a class="social-icon sb-icon-facebook" href="#"></a>
                                <a class="social-icon sb-icon-twitter" href="#"></a>
                                <a class="social-icon sb-icon-rss" href="#"></a>
                                <a class="social-icon sb-icon-dribbble" href="#"></a>
                                <a class="social-icon sb-icon-linkedin" href="#"></a>
                                <a class="social-icon sb-icon-flickr" href="#"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- added a partial and the code can be reusable -->
            <?php getIncluded(NAVBAR_PARTIAL) ?>

            <div id="subheader">
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            <h1>Welcome To The Gabela Framework</h1>
                            <ul class="crumb">
                                <?php if (isset($_SESSION['user_id'])): ?>
                                    <li><a href="<?= BASE_URL . 'tasks' ?>">Home</a>
                                    </li>
                                <?php elseif (!isset($_SESSION['user_id'])): ?>
                                    <li><a href="<?= BASE_URL . '' ?>">Home</a>
                                    </li>
                                <?php endif; ?>
                                <li class="sep">/</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- subheader close -->

            <div style="padding: 10em 10em; text-align: center;">
                <h2>Pay using payfast</h2>
                <h4>Use the official Gabela Framework github for documentation <a target="_blank"
                        href="https://github.com/gabela-framework/gabela">Here...</a></h4>
                <br />
                <br />
                <form action=" https://sandbox.payfast.co.za​/eng/process" method="post">
                    <input type="hidden" name="merchant_id" value="10000100">
                    <input type="hidden" name="merchant_key" value="46f0cd694581a">
                    <input type="hidden" name="return_url" value="<?= BASE_URL ?>payfast-success">
                    <input type="hidden" name="cancel_url" value="<?= BASE_URL ?>payfast-cancel">
                    <input type="hidden" name="notify_url" value="<?= BASE_URL ?>payfast-notify">

                    <input type="hidden" name="amount" value="100.00">
                    <input type="hidden" name="item_name" value="Test Product">
                    <input class="btn btn-primary" type="submit" value="Pay Now">
                </form>
            </div>

            <!-- content begin -->

    </div>
    </div>

    <!-- Latest compiled and minified JavaScript -->
    <script src="assets/includes/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- content close -->

    <?php getIncluded(FOOTER_PARTIAL); ?>
<?php require_once 'ti.php' ?>
<?php require_once realpath(__DIR__ . '/../global_config.php'); ?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Prioritask</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="site.webmanifest">
        <link rel="apple-touch-icon" href="icon.png">
        <!-- Place favicon.ico in the root directory -->

        <!-- Font Awesome specifically needs to be near the trop -->
        <script src="https://use.fontawesome.com/1670b49324.js"></script>

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        
        <link href="css/main.css" rel="stylesheet">
        <link href="css/dashboard.css" rel="stylesheet">
        <link href="css/card.css" rel="stylesheet">
        <link href="css/edit_task.css" rel="stylesheet">
    </head>
    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <div class="container">
            <div class="row">
                <?php startblock('navigation') ?>
                    <!-- this can be overriden on child pages should we want to omit the navigation -->
                    <?php include 'templates/navigation.php'; ?>
                <?php endblock() ?>
                <main class="col pt-3">
                    <?php startblock('content') ?>
                    <?php endblock() ?>
                </main>
            </div>
        </div>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.js" crossorigin="anonymous"></script>

        <script src="js/vendor/modernizr-3.5.0.min.js"></script>
        <script src="js/vendor/moment.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        
        <!-- Our Custom JS -->
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <?php startblock('footer_js') ?>
        <?php endblock() ?>

        <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
        <script>
            window.ga = function () {
                ga.q.push(arguments)
            };
            ga.q = [];
            ga.l = +new Date;
            ga('create', 'UA-XXXXX-Y', 'auto');
            ga('send', 'pageview')
        </script>
        <script src="https://www.google-analytics.com/analytics.js" async defer></script>
    </body>
</html>

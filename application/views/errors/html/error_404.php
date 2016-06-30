<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>404 Error | BMS+</title>

    <link href="http://localhost/insights/bms/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost/insights/bms/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="http://localhost/insights/bms/assets/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">


    <div class="middle-box text-center animated fadeInDown">
        <h1>404</h1>
        <h3 class="font-bold">Page Not Found</h3>

        <div class="error-desc">
            Sorry, but the page you are looking for has note been found. Try checking the URL for error, then hit the refresh button on your browser or try found something else in our app.
            <form class="form-inline m-t" role="form" >
                <!-- <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search for page">
                </div> -->
                <a href="javascript:void(0);" type="submit" onclick="history.back();" class="btn btn-primary">BACK TO WORK</a>
            </form>
        </div>
    </div>

</body>

</html>

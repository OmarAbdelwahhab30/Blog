<?php
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta htttp-equiv="Cache-control" content="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>
    <link rel="icon" href="<?=URLROOT?>/img/blogger.png"> 
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
        html, body {
            height: 100%;
            width: 100%;
            padding: 0;
            margin: 0;
            top: 0;
            bottom: 0;
            font-family: 'Lato', sans-serif;
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
        }

        h2 {
            font-size: 50px;
            margin: 0;
        }

        h3 {
            font-size: 14px;
            color: #696969;
            font-weight: 100;
            font-style: italic;
        }

        p {
            font-size: 18px;
            color: #666;
        }

        .top-nav {
            display: block;
        }

        .top-nav ul {
            margin: 0;
            padding: 0;
            position: absolute;
            right: 6%;
            top: 2%;
        }

        .top-nav ul li {
            display: inline-block;
            margin-left: 28px;
        }

        .top-nav ul li a {
            color: #ffffff;
            text-decoration: none;
            font-size: 18px;
        }

        .top-nav ul li a:hover {
            color: #afafaf;
            transition: 0.15s ease-in;
        }

        #section-landing {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100%;
            width: 100%;
        }

        .wrapper-landing {
            position: relative;
            text-align: center;
            margin: 0 auto;
            width: 100%;
            top: 40%;
        }

        .wrapper-landing h1 {
            font-size: 48px;
            color: #ffffff;
            margin: 0;
            font-weight: 100;
        }

        .wrapper-landing h2 {
            font-size: 42px;
            color: #f2f2f2;
            opacity: 0.6;
            margin: 0;
            font-weight: 100;
        }

        .btn-login {
            border: 1px solid #ffffff;
            padding: 6px 24px;
        }

        .navbar {
            width: 100%;
            height: 70px;
            background-color: #1a1a1a;
            box-shadow: 0px 0px 10px #1a1a1a;
        }

        .container-login {
            width: 100%;
            margin: 0 auto;
            position: relative;
            top: 20%;
        }

        .wrapper-login {
            width: 80%;
            margin: 0 auto;
            text-align: center;
        }

        .wrapper-login input {
            width: 200px;
            height: 26px;
            border: 1px solid #cccccc;
            background-color: #f5f5f5;
            font-size: 18px;
            display: block;
            position: relative;
            margin: 20px auto;
        }

        input::placeholder {
            color: #a1a1a1;
            font-size: 14px;
        }

        .wrapper-login h2 {
            font-size: 40px;
            text-transform: uppercase;
        }

        #submit {
            width: 200px;
            height: 42px;
            border: 1px solid #000000;
            background-color: #000000;
            color: #ffffff;
            font-size: 20px;
            margin: 20px 0px 0px 0px;
        }

        #submit:hover {
            border: 1px solid #a1a1a1;
            background-color: #a1a1a1;
            transition: 0.15s ease-in;
        }

        .options a {
            color: #006400;
        }

        .options a:hover {
            color: #000000;
            transition: 0.20s ease-in;
            text-decoration: none;
        }

        .invalidFeedback {
            color: #ff0000;
            display: block;
        }

        /* BLOG */
        .dark {
            background-color: #000000;
            box-shadow: 0px 0px 10px #000000;
        }

        .container {
            margin: 0 auto;
            width: 80%;
            padding: 100px 0px;
        }

        .container-item {
            border-bottom: 1px solid #dcdcdc;
            padding: 40px 0px;
        }

        .btn {
            padding: 8px 18px;
            font-size: 20px;
            text-transform: uppercase;
            color: #ffffff;
        }

        .btn:hover {
            color: #ffffff;
        }

        .green {
            background-color: #4CAF50;
        }

        .green:hover {
            background-color: #64A764;
            transition: 0.20s ease-in-out;
        }

        /* Create Post */
        .center {
            text-align: center;
        }

        input, textarea {
            width: 400px;
            margin: 20px 0px;
            border: 1px solid #cbcbcb;
            border-radius: 4px;
            background-color: #f5f5f5;
            padding: 8px;
            font-size: 18px;
            color: #666;
        }

        input {
            height: 35px;
        }

        textarea {
            height: 200px;
        }

        ::placeholder {
            font-size: 14px;
            font-weight: 100;
            font-style: italic;
        }

        .orange {
            background-color: orange;
            color: #000000;
            float: right;
        }

        .red {
            background-color: #ff0000;
            float: right;
            width: 120px;
            margin: 0px 20px;
            height: 40px;
        }
    </style>
</head>
<body>

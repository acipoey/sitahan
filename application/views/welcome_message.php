<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <title>Sistem Informasi Surat Penahanan (SITAHAN)</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Latest Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Meta tag Keywords -->

    <!-- css files -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/login/css/style.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <link href="<?= base_url() ?>assets/login/css/font-awesome.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?= base_url() ?>assets/login/images/logo.png">
    <!-- Font-Awesome-Icons-CSS -->
    <!-- //css files -->

    <!-- web-fonts -->
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
     rel="stylesheet">
    <!-- //web-fonts -->

</head>

<body>
    <div class="main-bg">
        <!-- title -->
        <h1>Sistem Informasi Surat Penahanan <br> (SITAHAN)</b></h1>
        <!-- //title -->
        <!-- content -->
        <div class="sub-main-w3" style="margin-top: -20px;">
            <div class="bg-content-w3pvt">
                <div class="top-content-style">
                    <!-- <img src="<?= base_url() ?>assets/login/images/user.jpg" alt="" /> -->
                </div>
                <form action="" method="post">
                <?php echo $this->session->flashdata('msg') ?>
                    <p class="legend">Login Disini<span class="fa fa-hand-o-down"></span></p>
                    <div class="input">
                        <input type="text" placeholder="Userid" name="username" id="username" required />
                        <span class="fa fa-envelope"></span>
                    </div>
                    <div class="input">
                        <input type="password" placeholder="Password" name="password" id="password" required />
                        <span class="fa fa-unlock"></span>
                    </div>
                    <div class="input">
                        <center>
                        <div style="color:red;">
                        </div>
                        <?php echo $captcha['image']; ?>
                        <label class="input" for="name">
                            <input id="captcha" placeholder="enter captcha" class="form-control placeholder-no-fix" name="captcha" type="text" style="width:150px" />
                        </label>
                        <?php echo form_error('captcha'); ?>
                    </center>
                    </div>
                    <button type="submit" class="btn submit">
                        <span class="fa fa-sign-in"></span>
                    </button>
                </form>
                &nbsp;
            </div>
        </div>
        <!-- //content -->
        <!-- copyright -->
<!--         <div class="copyright">
            <h2>&copy; 2019 Latest Login Form. All rights reserved | Design by
                <a href="http://w3layouts.com" target="_blank">W3layouts</a>
            </h2>
        </div> -->
        <!-- //copyright -->
    </div>
</body>
</html>
<?php
/**
 * We've dropped slack for receiving contact messages for the website and we're only going to use it for company communications only.
 * This will now send an to email start-ticket@vulnltd.co.uk which will create a support ticket which links in with our support desk app.
 */
$sent_message = false;
$message_error = false;
if( isset($_POST["name"],$_POST["email"],$_POST["message"]) ){
    $sent_message = true;
    try{
        $message = \Model\Email::send('start-ticket@vulnltd.co.uk',$_POST["email"], 'Support Message', 'Name: '.$_POST["name"].' Message: '.$_POST["message"]  );
    }catch (Exception $e ){
        $message_error = 'Error sending Email';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VulnLtd - Contact</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<style>
    .navbar-default {
        background-color: #ffffff;
        background-image: none;
        background-repeat: no-repeat;
    }
    .navbar-nav {
        background-color: #ffffff;
    }
</style>
<div style="background-color: #ffffff">
    <nav class="navbar navbar-default navbar-fixed-top" style="height:80px;padding-top:15px">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">VulnLtd</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse pull-right">
                <ul class="nav navbar-nav">
                    <li><a href="/">Home</a></li>
                    <li class="active"><a href="/contact">Contact</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
</div>
<style>
    div.headerinto {
        background-image: url('/images/bg.png');
        background-size: cover;
        background-position: bottom;
        background-repeat: no-repeat;
    }

</style>
<div class="container-fluid headerinto">
    <div class="row">
        <div class="col-md-12" style="min-height:200px">
        </div>
    </div>
</div>
<div class="container" style="margin-top:20px;">    <h1 style="text-align: center">Get In Contact</h1>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <?php if( $sent_message ){ ?>
                <?php if( $message_error ){ ?>
                    <div class="alert alert-danger"><?php echo $message_error; ?></div>
                <?php }else{ ?>
                    <div class="alert alert-success">Message has been sent</div>
                <?php } ?>
            <?php } ?>
            <div class="panel panel-default">
                <div class="panel-heading">Contact Form</div>
                <div class="panel-body">
                    <form method="post" action="/contact">
                        <div><strong>Name</strong></div>
                        <div><input name="name" class="form-control"></div>
                        <div style="margin-top:7px"><strong>Email</strong></div>
                        <div><input name="email" class="form-control"></div>
                        <div style="margin-top:7px"><strong>Message</strong></div>
                        <div><textarea name="message" class="form-control"></textarea></div>
                        <div style="margin-top:15px"><input type="submit" class="btn btn-success pull-right" value="Send Message"></div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>


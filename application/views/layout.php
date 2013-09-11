<?php
//Generates a doctype(html) which indicates html5 which is required for Twitter Bootstrap
echo doctype('html5');
?>

<head>
    <title><?php echo $title ?></title>
    <!-- Required for Twitter Bootstrap -->
    <?php echo meta(array('name' => 'viewport', 'content' => 'no-width=device-width, initial-scale=1.0')); ?>

    <!-- Twitter Bootstrap -->
    <?php $bs_link = array('href' => 'css/bootstrap3.css', 'rel' => 'stylesheet', 'type' => 'text/css', 'media' => 'screen'); ?>
    <?php echo link_tag($bs_link); ?>

    <?php echo link_tag('css/base.css'); ?>
    <?php echo link_tag('css/main/main.css'); ?>

    <!-- Normally load js at bottom of body in case they are slow.  May need to put them here
            if calling before body is fully loaded or create min js and load here. -->
    <script src="<?php echo base_url(); ?>js/jquery-1.9.1.js"></script>
    <!--<script src="<?php //echo base_url();  ?>js/bootstrap3.js"></script>-->

</head>

<body>
    <div class="container"><header>
            <div class="row">
                <div class="media col-lg-8">
                    <a class="pull-left" href="/home">
                        <?php
                        $image_properties = array(
                            'src' => 'images/main/logo.png',
                            'alt' => 'Sportz Logo',
                            'class' => 'media-object',
                        );

                        echo img($image_properties);
                        ?>
                    </a>
                    <div class="media-body pull-left">
                        <h2>Feed Your Addiction</h2>
                    </div>
                </div>

                <?php
                //If user is logged in already, display the welcome username message in the header.
                if ($is_logged_in) {
                    $this->view->render_partial("main/templates/header_welcome.php");
                    //If user is not logged in and the current page isn't the login or signup page
                    //then display the login form in the header.
                } else { //if($this->router->method <> 'login') { // and $this->router->method <> 'signup') {
                    $this->view->render_partial("main/templates/header_login.php");
                }
                ?>
            </div>

            <div class="jumbotron">
                <h1>Large Banner Here</h1>
            </div>
        </header>
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/home">SPORTZ</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/home">Home</a></li>
                    <li><a href="basketball">Basketball</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Football<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/football/team">Team</a></li>
                            <li><a href="#">Player</a></li>
                        </ul>
                    </li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </div>
        </nav>
        <div>
            <?php echo $content; ?>
        </div>
        <footer>
            <strong>&copy; 2013 - Main Footer</strong>
        </footer></div> <!-- end div class=container -->

    <!-- Load javascript libraries at bottom of body in case they load slowly... but may need to
                    load at top if needed before body loads
    <!-- jQuery is required for Twitter Bootstrap -->
    <!-- <script src="http://code.jquery.com/jquery.js"></script> -->
    <!--<script src="<?php //echo base_url();  ?>js/jquery-1.9.1.js"></script> -->
    <!-- Twitter Bootstrap -->
    <script src="<?php echo base_url(); ?>js/bootstrap3.js"></script>

</body>
</html>
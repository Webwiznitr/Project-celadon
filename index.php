<?php
if (isset($_POST['firstname'])) {
    $font = realpath('Gabriola.ttf');
    $template = $_GET['ddData.value'];
    $image = imagecreatefromjpeg("images/template_1.jpg");
    $color = imagecolorallocate($image, 19, 21, 22);
    imagettftext($image, 50, 0, 800, 600, $color, $font, $_POST['firstname']);
    $file = $_POST['firstname'] . time();
    imagejpeg($image, "certificate/" . $file . ".jpg");
    imagedestroy($image);
    session_start();
    $_SESSION['certi'] = "certificate/" . $file . ".jpg";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>certificate generator</title>
    <link rel="stylesheet" media="all" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" media="all" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" />
    <link rel="stylesheet" media="all" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" />
    <link rel="stylesheet" href="css/main.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> 

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/prashantchaudhary/ddslick/master/jquery.ddslick.min.js" ></script>
        <script type="text/javascript">
        //Dropdown plugin data
        var ddData = [
            {
                text: "Template 1",
                value: "template_1.jpg",
                selected: true,
                description: "Template description",
                imageSrc: "template/template_1.jpg"
            },
            {
                text: "Template 2",
                value: "template_2.jpg",
                selected: false,
                description: "Template description",
                imageSrc: "template/template_2.jpg"
            },
            {
                text: "Template 3",
                value: "template_3.jpg",
                selected: false,
                description: "Description with LinkedIn",
                imageSrc: "template/template_3.jpg"
            },
            {
                text: "Template 3",
                value:"template_3.jpg",
                selected: false,
                description: "Description with Foursquare",
                imageSrc: "template/template_4.jpg"
            }
        ];
    </script>
</head>

<body>

    <div class="container main">
        <h3>Certificate generator</h3>
        <form method="post">
            <label for="fname">Enter Your Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Your name">
            <label>Select Template</label>
            <div id="myDropdown">
                
            </div>
            <br><br>
            <input type="submit" value="Generate Certificate "> 
            
            <br><br>
            <button><a href="">click here to view certificate</a></button>

        
        </form>
    </div>


    <footer class="new_footer_area bg_color">
        <div class="new_footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="f_widget company_widget wow fadeInLeft" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
                            <h3 class="f-title f_600 t_color f_size_18">Get in Touch</h3>
                            <p>Don’t miss any updates of our new templates and extensions.!</p>
                            <form action="#" class="f_subscribe_two mailchimp" method="post" novalidate="true" _lpchecked="1">
                                <input type="text" name="EMAIL" class="form-control memail" placeholder="Email">
                                <button class="btn btn_get btn_get_two" type="submit">Subscribe</button>
                                <p class="mchimp-errmessage" style="display: none;"></p>
                                <p class="mchimp-sucmessage" style="display: none;"></p>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
                            <h3 class="f-title f_600 t_color f_size_18">Download</h3>
                            <ul class="list-unstyled f_list">
                                <li><a href="#">Company</a></li>
                                <li><a href="#">Android App</a></li>
                                <li><a href="#">ios App</a></li>
                                <li><a href="#">Desktop</a></li>
                                <li><a href="#">Projects</a></li>
                                <li><a href="#">My tasks</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInLeft;">
                            <h3 class="f-title f_600 t_color f_size_18">Help</h3>
                            <ul class="list-unstyled f_list">
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Term &amp; conditions</a></li>
                                <li><a href="#">Reporting</a></li>
                                <li><a href="#">Documentation</a></li>
                                <li><a href="#">Support Policy</a></li>
                                <li><a href="#">Privacy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="f_widget social-widget pl_70 wow fadeInLeft" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInLeft;">
                            <h3 class="f-title f_600 t_color f_size_18">Team Solutions</h3>
                            <div class="f_social_icon">
                                <a href="#" class="fab fa-facebook"></a>
                                <a href="#" class="fab fa-twitter"></a>
                                <a href="#" class="fab fa-linkedin"></a>
                                <a href="#" class="fab fa-pinterest"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bg">
                <div class="footer_bg_one"></div>
                <div class="footer_bg_two"></div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-7">
                        <p class="mb-0 f_400"><a class="fa fa-copyright"></a> Project-celadon. 2020 All rights reserved.</p>
                    </div>
                    <div class="col-lg-6 col-sm-5 text-right">
                        <div>Made with <a class="fa fa-heart" style="color:#e60606"></a> in <strong>India</strong></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
<script type="text/javascript">
    $('#myDropdown').ddslick({
    data:ddData,
    width:300,
    selectText: "Select your template",
    imagePosition:"right",
    onSelected: function(selectedData){
        //callback function: do something with selectedData;

    }   
});
</script>
</html>
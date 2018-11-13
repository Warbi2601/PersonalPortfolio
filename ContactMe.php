<?php
session_start();
?>

<!doctype html>
<html>

<head>
<!-- START OF Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-128932581-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-128932581-1');
</script>
<!-- END OF Global site tag (gtag.js) - Google Analytics -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" media="only screen and (min-width : 600px)" href="css/Desktop.css">
    <title>Josh Warburton</title>
</head>

<body>

    <header>
        <div class="container">

            <div class="headBar">
                <div class="flexItem2">
                    <h1 class="title">Josh Warburton</h1>
                    <p class="subtitle">Software Developer</p>
                </div>

                <div class="flexItem3">
                    <span class="burgerMenu" onclick="openNav()">&#9776;</span>
                    <div id="mySidenav" class="sidenav">
                        <nav>
                            <ul>
                                <li><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></li>
                                <li><a href="index.html" class="slideHover">About Me</a></li>
                                <li><a href="Qualifications.html" class="slideHover">Qualifications</a></li>
                                <li><a href="WorkExperience.html" class="slideHover">Work Experience</a></li>
                                <li><a href="Recommendations.html" class="slideHover">Recommendations</a></li>
                                <li><a href="PreviousProjects.html" class="slideHover">Previous Projects</a></li>
                                <li><a href="CV.html" class="slideHover">CV</a></li>
                                <li><a href="ContactMe.php" class="pageCheck">Contact Me</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>

            <div class="banner">
                <div class="circle">
                    <img src="Images/Logo2018.png">
                </div>
            </div>

        </div>
    </header>


    <div class="container">
        <div class="whiteBackground">
            <h1 class="pageTitle">Contact Me</h1>
            <div class="text">

            <p>
                Thank you for visiting my website. You can email me on <strong>contact@joshwarburton.co.uk</strong> or alternatively,
                you can fill out the form below and I will endeavour to get back to you within 48 hours.<br/><br/>
                Thanks, Josh
            </p>
                <?php
                
                if(isset($_SESSION["ContactForm"]))
                {
                
                    switch($_SESSION["ContactForm"])
                
                    {
               
                        case 0:
                            echo '
                            <div class="alert alert-success">
                                <strong>Success!</strong> Details successfully sent</a>
                            </div>';
                            break;

                        case 1:
                            echo '
                            <div class="alert alert-danger">
                                <strong>Error!</strong> You need to fill in all fields in order to send your details</a>
                            </div>';
                            break;

                        case 2:
                            echo '
                            <div class="alert alert-danger">
                                <strong>Error!</strong> The Email Address you entered does not appear to be valid</a>
                            </div>';
                            break;
                    }
                }

                ?>

                <div class="contactName">
                    <form action="SendMail.php" method="POST">
    
                        <div class="inputBox">
                        <!-- <label for="name"><span class="requiredField">*</span>Name:</label> -->
                        <span class="requiredField">*</span>
                        <input type="text" name="name" id="name" placeholder="Name">
                        <br/>
                        </div>

    
                        <div class="inputBox">
                        <!-- <label for="email"><span class="requiredField">*</span>Email: </label> -->
                        <span class="requiredField">*</span>
                        <input type="email" name="email" id="email" placeholder="Email">
                        <br/>
                        </div>


    
                        <div class="inputBox">
                        <!-- <label for="phoneNumber"><span class="requiredField">*</span>Phone Number: </label> -->
                        <span class="requiredField">*</span>
                        <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Phone Number">
                        <br/>
                        </div>


                        <div class="inputBox">
                        <!-- <label for="message"><span class="requiredField">*</span>Message: </label> -->
                        <span class="requiredField">*</span>
                        <textarea name="message" id="message" placeholder="Type your message here..." ></textarea>

                        <!-- <input type="text" name="message" id="message" placeholder="Type your message here..."> -->
                        <br/>
                        </div>

                        <div class="inputBox">
                        <!-- <label for="message"><span class="requiredField">*</span>Message: </label> -->
                        <span class="requiredFieldBtn">*</span>
                        <input type="submit" value="Send Details" class="btnStandard">
                        <br/>
                        </div>

    
                    </form>
                </div>
            </div>
        </div>
    </div>


    <footer>
        <p class="lastUpdated">Last Updated: </p>
        <p>Copyright &copy; Josh Warburton 2018</p>
        <div class="footerlogo">
            <a href="https://www.linkedin.com/in/joshwarburton/"><img src="Images/LinkedIn.png" alt="" width="40"
                    height="40">
                <a href="https://github.com/Warbi2601"><img src="Images/GitHub.png" alt="" width="40" height="40"></a>
        </div>
    </footer>

    <script src="JS/jquery-3.2.1.min.js"></script>
    <script src="JS/JavaScript.js"></script>
</body>

</html>
<?php
include("db.php");

// Start session
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> QUIZ</title>
        <!-- =====CSS===== -->
        <link rel="stylesheet" href="home.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    </head>
    <style>
        .img-fluid {
            max-width: 57%;
    height: 100%;
        }
    </style>
    <body>
        <!--navbar-->
        
        <nav class="navbar">
            <h1 class="logo"> QUIZ</h1>
            <ul class="nav-links">
            
                <li class="active"><a href="#"></a>Home</li>
                <li class="ctn"><a  href="register.php" name="quiz" >Quiz</a></li>
                <li class="ctn"><a  href="news.php" name="what's new" >General knowledge</a></li>
                   
                   <li class="ctn"><a  href="aboutus.html" name="aboutus" >Aboutus</a></li>
                   <li class="ctn"><a  href="logout.html"name="logout" >Logout</a></li>
                

            </ul>
            <img src="menu-btn.png" alt="" class="menu-btn"></img.src>
        </nav>
    
        <header>
            <div class="header-content">
                <h2>EXPLORE MORE</h2>
                <div class="line"></div>
                <h1>UPGRADE YOURSELF</h1>
                <a href="https://www.98thpercentile.com/blog/the-importance-of-quiz-competition-for-students/" class ="ctn" target="_blank" > learn more</a>
            </div>
        </header>
        

        <!-- == events ==-->
        <section class="events">
            <div class="title">
                <h1>Learn more about  Programming Languages</h1>
                <div class="link"></div>
            </div>
            <div class="row">
                <div class="col">
                    <img src="img\c.JPG" alt="">
                    <h4> C Programming</h4>
                    <p>C is a procedural language that provides no support for objects and classes. It is a compiled language.</p>                  
                    <a href="https://www.w3schools.com/c/" target="_blank" class="ctn">learn more</a>
                </div>
                <div class="col">
                    <img src="img\java.JPG" alt="">
                    <h4>Programming through Java</h4>
                    <p>Java is a multi-platform, object-oriented, and network-centric language that can be used as a platform in itself. It is a fast, secure, reliable programming ...
                    </p>                  
                    <a href="https://www.w3schools.com/java/" target="_blank"  class="ctn">learn more</a>
                </div>

            </div>
            <div class="row">
                <div class="col">
                    <img src="img\python1.JPG " alt="">
                    <h4>Python Programming</h4>
                    <p>Python is commonly used for developing websites and software, task automation, data analysis, and data visualisation</p>                  
                    <a href="https://www.w3schools.com/python/" target="_blank"  class="ctn">learn more</a>
                </div>
                <div class="col">
                    <img src="img\php.JPG" alt="">
                    <h4>PHP Language</h4>
                    <p> PHP is an open-source, server-side programming language that can be used to create websites, applications, customer relationship management systems and more.</p>                  
                    <a href="https://www.w3schools.com/php/" target="_blank"  class="ctn">learn more</a>
                </div>

            </div>
            
        </section>

        <section class="explore">
            <div class="explore-content">
                <!--<h1>explore</h1>
                <p>SQL</p>
                <div class="line"></div>   -->
                <a href="https://www.javatpoint.com/sql-tutorial" target="_blank" class="ctn sql">learn more</a>
            </div>
        </section>

        </section class="tours">
            <div class="row">
                <div class="col content-col">
                    <h2 class="m-5"> WELCOME TO SCRIPTING LANGUAGE</h2>
                    <!-- <p>HTML</p>
                    <p>CSS</p>
                    <p>javascript</p>
                    <p>Node.js</p> -->
                </div>
                <!-- <div class="col image-col">
                    <div class="image-gallery">
                        <img src="img\css.JPG" alt="">
                        <img src="img\html1.JPG" alt="">
                        <img src="img\javascript1.JPG" alt="">
                        <img src="img\nodejs.jpg" alt="">
                    </div>
                    
                </div> -->
                <div class="row">
            <div class="col-6">
                <img src="img/css.JPG" class="img-fluid" alt="CSS Image">
                <h2 class="m-5">CSS</h2>
            </div>
            <div class="col-6">
                <img src="img/html1.JPG" class="img-fluid" alt="HTML Image">
                <h2 class="m-5">HTML</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <img src="img/javascript1.JPG" class="img-fluid" alt="JavaScript Image">
                <h2 class="m-5">javascript</h2>
            </div>
            <div class="col-6">
                <img src="img/nodejs.jpg" class="img-fluid" alt="Node.js Image">
                <h2 class="m-5">Node.js</h2>
            </div>
        </div>
    </div>       
    <a href="https://www.engati.com/glossary/scripting-language#:~:text=JavaScript%2C%20Python%2C%20and%20Ruby%20are,without%20the%20need%20for%20compiling." target="_blank" class="ctn scr">learn more</a>
        <section>
              <section class="footer">
                <p>welcome to quiz</p>
                <p> The Quiz is open to people the Participants anywhere in the world    </p>
              </section>
        </section>
        <script>
            const menuBtn= document.querySelector('.menu-btn')
            const navlinks= document.querySelector('.nav-links')

            menuBtn.addEventListener('click',()=>{
                navlinks.classList.toggle('mobile-menu')
            })
        </script>
        
    </body>
</html>



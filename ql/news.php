<!--<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>QUIZ</title>
        
        <link rel="stylesheet" href="home.css">
    </head>
    <body>
        <header>
            <div class="header-content">
                <div class="quiz-info">
                    <p>Quizzes are a great way to test your knowledge and improve your memory. By doing a quiz daily, you can enhance your learning and stay sharp. Make it a habit to challenge yourself with new quizzes regularly!</p>
                </div>
                <a href="https://www.nine.com.au/quizzical" class="ctn">Today's news</a>
            </div>
        </header>
    </body>
</html>-->



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
        <title>Newspaper</title>
        <!-- =====CSS===== -->
        <link rel="stylesheet" href="news.css">
    </head>
    <body>
        <!--navbar-->
        <nav class="navbar">
            <h1 class="logo"> QUIZ</h1>
            <ul class="nav-links">
            
                <li class="active"><a href="#"></a>Home</li>
                <li class="ctn"><a  href="quiz.php" name="quiz" >Quiz</a></li>
                <li class="ctn"><a  href="news.php" name="General knowledge" >General knowledge</a></li>
                   <li class="ctn"><a  href="register.php" name="register" >register</a></li>
                   <li class="ctn"><a  href="aboutus.html" name="aboutus" >Aboutus</a></li>
                   <li class="ctn"><a  href="logout.html"name="logout" >Logout</a></li>
                

            </ul>
            <img src="menu-btn.png" alt="" class="menu-btn"></img.src>
</nav>
        <header>
            <div class="header-content">
                <h1>Learn something new</h1>
                <div class="line"></div>
                <h1>UPGRADE YOURSELF</h1>
                 </div>
        </header>
    
        

        <!-- == events ==-->
        <section class="events">
            <div class="title">
                <h1></h1>
                <div class="link"></div>
            </div>
            <div class="row">
                <div class="col">
                    <img src="img\new3.JPG" alt="">
                    <h4>The Times of India</h4>
                    <p>The Times of India has an employee rating of 3.9 out of 5 stars, based on 701 company reviews on Glassdoor which indicates that most employees have a good working experience there. The The Times of India employee rating is in line with the average (within 1 standard deviation) for employers within the Media and communication industry (3.6 stars).</p>
                    <a href="https://timesofindia.indiatimes.com/" target="_blank" class="ctn">what's Today</a>
                </div>
                <div class="col">
                    <img src="img\news7.JPG" alt="">
                    <h4>Deccan Chronicle</h4>
                       <P>Deccan Chronicle has an employee rating of 2.8 out of 5 stars, based on 57 company reviews on Glassdoor which indicates that most employees have an average working experience there. The Deccan Chronicle employee rating is 23% below average for employers within the Media and communication industry (3.6 stars)</P>              
                    <a href="https://www.deccanchronicle.com/" target="_blank"  class="ctn">what's Today</a>
                </div>

            </div>
            <div class="row">
                <div class="col">
                    <img src="img\news9.JPG" alt="">
                    <h4> Swatantra Vaartha</h4>
                       <P>Swatantra Vaarttha has achieved a rating of 3.8 by offering quality service to newspaper companies. Swatantra Vaarttha in Lower Tank Bund, Hyderabad.</P>              
                    <a href="https://epaper.vaartha.com/Login/LandingPage?aspxerrorpath=/Home/FullPage" target="_blank" class="ctn">what's Today</a>
                </div>
                <div class="col">
                    <img src="img\shakshi.jpg" alt="">
                    <h4>Shakshi</h4>
                        <P>With the belief that customer satisfaction is the most important factor in every business, Sakshi Newspaper has acquired a rating of 4.1, for its tailor-made advertising solutions and client satisfaction.</P>
                    <a href="https://epaper.sakshi.com/" target="_blank"  class="ctn">what's Today</a>
                </div>

            </div>
            <div class="row">
                <div class="col">
                    <img src="img\news5.JPG " alt="">
                    <h4>The Economic Times</h4>
                    <P>The Economic Times has an employee rating of 3.4 out of 5 stars, based on 65 company reviews on Glassdoor which indicates that most employees have a good working experience there. The The Economic Times employee rating is in line with the average (within 1 standard deviation) for employers within the Media and communication industry (3.6 stars).</P>
                       <a href="https://economictimes.indiatimes.com/" target="_blank"  class="ctn">what's Today</a>
                </div>
                <div class="col">
                    <img src="img\news4.JPG" alt="">
                    <h4>The Hindu</h4>
                    <p>The Hindu has an employee rating of 4.4 out of 5 stars, based on 122 company reviews on Glassdoor which indicates that most employees have an excellent working.Established in the year 1878, The Hindu in Infantry Road,Bangalore listed under Newspaper Publishers in Bangalore. Rated 4.0 based on 1714 Customer Reviews ..s </p>
                    <a href="https://www.thehindu.com/" target="_blank"  class="ctn">what's Today</a>
                </div>

            </div>
            
        </section>

       
                
        <section>
              <section class="footer">
                <p>welcome to General knowledge section </p>
                <p> They keep us updated about various happenings around the world and thus improve our general knowledge. Many newspapers also help in awakening health and environmental awareness among the people.   </p>
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



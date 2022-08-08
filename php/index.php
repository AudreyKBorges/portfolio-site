<?php
/**
 * PHP version 7.3
 * 
 * @category None
 * @package  None
 * @author   "Audrey Borges <audrey@audreyborges.com>
 * @license  https://www.audreyborges.com/ GNU General Public License
 * @link     https://www.audreyborges.com/
 */

$nameErr = $emailErr = "";
$name = $email = $comment = "";

function test_input($data) 
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "* Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ] *$/", $name)) {
            $nameErr = "* Only letters and white space allowed";
        }
    }
    
    if (empty($_POST["email"])) {
        $emailErr = "* Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "* Invalid email format";
        }
    }

    if (empty($_POST["comment"])) {
        $comment = "";
    } else {
        $comment = test_input($_POST["comment"]);
    }

    if (empty($nameErr && $emailErr)) {
        $toEmail = 'audreyborges7@gmail.com';
        $emailSubject = 'New email from your contact form';
        $headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=iso-8859-1'];

        $bodyParagraphs = ["Name: {$name}", "Email: {$email}", "Message:", $message];
        $body = join(PHP_EOL, $bodyParagraphs);

        if (mail($toEmail, $emailSubject, $body, $headers)) {
            header('Location: thank-you.php');
        } else {
            $errorMessage = 'Oops, something went wrong. Please try again later';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audrey Borges Web Developer</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>
    <div class="grid-container">
        <header class="grid-banner">
            <img id="home" class="banner" src="../images/Linkedin-banner-2021.png" alt="Audrey Borges, Web Developer">
        <div id="mySidebar" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="../html/resume.html" target="_blank">Résumé</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        <nav class="main-nav" id="main-nav">
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="../html/resume.html" target="_blank">Résumé</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>
    <div id="content">
        <button class="openbtn" onclick="openNav()">☰</button>
        <div id="site-content">
        <section class="grid-about">
            <div id="about"></div>
            <h1 class="animate__bounceInDown">Hello, I'm Audrey!</h1>
            <div data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="200" data-aos-easing="ease-in-quad">
            <img class="audrey" src="../images/Audrey.JPG" alt="Headshot of Audrey">
            </div>
            <div data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="200" data-aos-easing="ease-in-quad">
                <h2 class="about-me">About Me</h2>
            </div>
            <div data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="200" data-aos-easing="ease-in-quad">
            <p class="home-paragraph">I'm a recent Summa Cum Laude graduate of the Bachelor of Science program in Web Design and Development at Champlain College
                in Burlington, Vermont, and I am familiar with front-end and back-end web technologies. My current stack is pure
                HTML/CSS, JavaScript, and PHP. I have also worked with WordPress, Figma, Python, MySQL, sass/scss, Bootstrap and had exposure to Invision,
                SQL, and the PHP framework, Symfony.</p>
            </div>
            <div data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="200" data-aos-easing="ease-in-quad">
            <p class="home-paragraph">Web development became my passion because I am fascinated by technology and I enjoy creative and analytical work.
                The first content management system I ever worked on was Joomla, which was used to manage my former company's website.
            I edited content, managed the blog, and wrote content for the blog as well. My natural curiosity drove me to learn how websites
        are built, so I started learning HTML and CSS then Python and my programming journey took off. I learn more every day, and I love it!</p>
            </div>
            <div data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="200" data-aos-easing="ease-in-quad">
        <div id="portfolio"></div>
        <p class="home-paragraph">Houston, Texas is currently my home base, and the weather is hot but so is the art
                scene. When I'm not building an awesome new web project or working at theCoderSchool teaching kids to code, 
            I go to art museums and art shows, I enjoy coffee--love my cold brew with oat milk, and I get my nature fix at
        one of Houston's many beautiful parks.</p>
    </div>
        </section>
        <section class="grid-projects">
        <div data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="200" data-aos-easing="ease-in-quad">
            <h2>Portfolio</h2>
        </div>
        <div data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="200" data-aos-easing="ease-in-quad">
            <div class="project">
            <a href="https://audreyslist.org/" target="_blank"><h3>Audrey's List</h3></a>
            <div class="align-cards">
            <div class="flip-card one">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                    <img class="AL-screenshot" src="../images/ALscreenshot.png" alt="Audrey's List homepage">
                    </div>
                    <div class="flip-card-back">
                    <p class="paragraph">Audrey's List is a site designed for those who care for individuals with autism. Families looking for therapy,
                playgroups, activities, and parent support groups will find these resources on my site. New resources are being added for the Houston area, however
                I plan to include other cities around the United States. It was a hard-coded site before I converted it to WordPress. My goal is to make it
                manage and able to handle many posts as resources are added. Future plans include creating a CRUD application in PHP to allow 
                users to create accounts then add and update resources.</p>
            </div>
            </div>
</div>
</div><br>
            <a href="http://www.higherlower.xyz/" target="_blank"><h3>Higher - Lower Game</h3></a>
            <div class="align-cards">
            <div class="flip-card two">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                    <img class="AL-screenshot" src="../images/higherlower.png" alt="Higher - Lower Game">
                    </div>
                    <div class="flip-card-back">
                    <p class="paragraph">Higher - Lower is a number guessing game that I developed using HTML/CSS, Bootstrap, and JavaScript.
                    The application prompts the user for a maximum number, validates the user input and does not allow invalid entries (negative numbers, 0, or non-numbers), 
                    re-prompting the user if an invalid entry is provided, and rounds decimal numbers if the user enters one. It allows for unlimited user guesses and also 
                    tracks valid guesses, guesses which are in range, are numbers, and are not duplicate guesses, to use in a victory message. 
                    </p>
                </div>
            </div>
        </div>
        </div>
            </div>
        </section>
        <div id="contact">
        <div data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="200" data-aos-easing="ease-in-quad">
        <section class="grid-contact">
            <form id="form" method="post" name="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <h2 class="contact-me">Contact Me</h2>
                <p class="contact-para">Let's work together. Let me know what kind of site I can build for you.</p><br>
                  <label for="name" value="<?php echo $name;?>">Name  *</label><br>
                  <span class="error"><?php echo $nameErr;?></span><br>
                  <input type="text" id="name" name="name" placeholder="Enter your name here."><br>
                  <label for="email" value="<?php echo $email;?>">Email  *</label><br>
                  <span class="error"><?php echo $emailErr;?></span><br>
                  <input type="email" id="email" name="email" placeholder="Enter your email here."><br>
                  <label for="message">Details</label><br><br>
                  <textarea id="message" name="message" placeholder="Enter your comments here." rows="4" cols="35"><?php echo $comment;?></textarea><br><br>
                  <input id="submit" type="submit" value="Send Message">
                </form>
            <h3 class="social-h3">Follow Me on Social</h3> 
            <div class="social">
                <a target="_blank" href="https://www.linkedin.com/in/audreyborges/"><img class="icon" src="../images/linkedin.png" alt="LinkedIn logo"></a>
                <a target="_blank" href="https://twitter.com/audreykborges"><img class="icon" src="../images/twitter.png" alt="Twitter logo"></a> 
                <a target="_blank" href="https://github.com/AudreyKBorges"><img class="icon" src="../images/github.png" alt="GitHub logo"></a>
                <a target="_blank" href="https://codepen.io/audrey-borges"><img class="icon" src="../images/codepen.png" alt="CodePen logo"></a>
            </div>
            </div>
</div>
</div>
        </section>
        <footer class="main-footer">Audrey Borges Web Development copyright &copy; <script>document.write(new Date().getFullYear())</script></footer>
        </div>
    </div>
    </div>
    <script src="../js/script.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>
</html>
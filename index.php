<?php
/**
 * PHP version 8.08
 * 
 * @category None
 * @package  None
 * @author   "Audrey Borges <audrey.borges@audreyborges.com>
 * @license  https://www.audreyborges.com/ GNU Public License
 * @link     https://www.audreyborges.com/
 */
/**
 * Define data parameter
 * 
 * @param string $data test input data
 * 
 * @return string 
 */
function Test_input($data) 
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$nameErr = $emailErr = "";
$name = $email = $message = "";


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

    if (empty($_POST["message"])) {
        $message = "";
    } else {
        $message = test_input($_POST["message"]);
    }

    if (empty($nameErr && $emailErr)) {
        $toEmail = 'audrey.borges@audreyborges.com';
        $emailSubject = 'New email from your contact form';
        $headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=iso-8859-1'];

        $bodyParagraphs = ["Name: {$name}\r\n", "Email: {$email}\r\n", "Message:", $message];
        $body = join(PHP_EOL, $bodyParagraphs);

        if (mail($toEmail, $emailSubject, $body, $headers)) {
            header('Location: ./html/thank-you.html');
        } else {
            $errorMessage = 'Oops, something went wrong. Please try again later';
        }
    }
}

// db connection
$host_name = "db5010818542.hosting-data.io";
$username = "dbu3360126";
$password = "5eK6WHwqT9j@46q";
$dbname = "dbs9152401";

// Create connection
$conn = new mysqli($host_name, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `CONTACTS`(`name`, `email`, `message`) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === false) {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audrey Borges Web Developer</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/normalize.css">
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
                <img id="home" class="banner" src="./images/Linkedin-banner-2021.png" alt="Audrey Borges, Web Developer">
                <div id="mySidebar" class="sidebar">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#portfolio">Portfolio</a></li>
                        <li><a href="./html/resume.html" target="_blank">Résumé</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                    <nav class="main-nav" id="main-nav">
                        <ul>
                            <li><a href="#home">Home</a></li>
                            <li><a href="#about">About</a></li>
                            <li><a href="#portfolio">Portfolio</a></li>
                            <li><a href="./html/resume.html" target="_blank">Résumé</a></li>
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
                            <img class="audrey" src="./images/audrey.jpg" alt="Headshot of Audrey">
                        </div>
                        <div data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="200" data-aos-easing="ease-in-quad">
                            <h2 class="about-me">About Me</h2>
                        </div>
                        <div data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="200" data-aos-easing="ease-in-quad">
                            <p class="home-paragraph">I'm a recent Summa Cum Laude graduate of the Bachelor of Science program in Web Design and Development at Champlain College
                                in Burlington, Vermont, and I am familiar with front-end and back-end web technologies. I earned a full-stack Java certificate through Genesis10's intensive
                                training program called <a href="https://www.dev-10.com/">Dev10</a>, and it was challenging but fun. The stack used for this site as well as a couple of other past projects is pure HTML/CSS, JavaScript, and PHP. I have also worked with WordPress, 
                                Figma, Python, MySQL, Sass/Scss, Bootstrap and had exposure to Invision and the PHP framework, Symfony.</p>
                        </div>
                        <div data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="200" data-aos-easing="ease-in-quad">
                            <p class="home-paragraph">Web development became my passion because I am fascinated by technology and I enjoy creative and analytical work.
                                The first content management system I ever worked on was Joomla, which was used to manage my former company's website.
                                I edited content, managed the blog, and wrote content for the blog as well. My natural curiosity drove me to learn how websites
                                are built, so I started learning HTML and CSS then Python and my programming journey took off. I learn more every day, and I love it!</p>
                        </div>
                        <div data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="200" data-aos-easing="ease-in-quad">
                            <p class="home-paragraph">Austin, Texas is currently my home base, and it's a fun, friendly and laid back city with fantastic
                                hiking, several lakes, a great art scene, and the best live music. When I'm not building an awesome new web project, I can 
                                be found hiking, meandering through a museum or getting my coffee fix at Medici because I need my cold brew with oat milk.</p>
                        </div>
                        <div>
                        <div data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="200" data-aos-easing="ease-in-quad">
                            <h3 id="education-h3">Education & Certificates</h3>
                            </div>
                            <div data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="200" data-aos-easing="ease-in-quad">
                                <div>
                                    <a id="dev10" href="https://www.credly.com/badges/8bcec0f7-3b0c-4273-977a-fddf432d18dd/public_url" target="_blank"><img id="dev10-img" src="./images/dev10-full-stack-java-developer.png" alt="dev10 full stack java developer"></a>
                                </div>
                            </div>
                            <div data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="200" data-aos-easing="ease-in-quad">
                                <div>
                                    <a id="champlain" href="https://www.parchment.com/u/award/880f29871f13e880a9c9705a7181d8e8" target="_blank"><img id="dev10-img" src="./images/diploma.png" alt="Champlain College BS Web Design and Development"></a>
                                </div>
                            </div>
                            <div data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="200" data-aos-easing="ease-in-quad">
                                <div>
                                    <a id="champlain" href="https://www.parchment.com/u/award/7bfcb78a9d51e7992f1c7d764107130f" target="_blank"><img id="dev10-img" src="./images/certificate.png" alt="Champlain College Certificate of Concentrated Studies in Web Programming"></a>
                                </div>
                            </div>
                            <div id="portfolio"></div>
                        </div>
                    </section>
                    <section class="grid-projects">
                    <div data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="200" data-aos-easing="ease-in-quad">
                        <h2>Portfolio</h2>
                    </div>
                    <div data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="200" data-aos-easing="ease-in-quad">
                        <div class="project">
                        <a href="https://audreyslist.org/" target="_blank"><h3>Audrey's List</a><a href="https://github.com/AudreyKBorges/audreys-list" target="_blank"> | GitHub Project Link</h3></a>
                            <div class="align-cards">
                                <div class="flip-card one">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <img class="AL-screenshot" src="./images/ALscreenshot.png" alt="Audrey's List homepage">
                                        </div>
                                        <div class="flip-card-back">
                                            <p class="paragraph">Audrey's List is a site designed for those who care for individuals with autism. Families looking for therapy,
                                                playgroups, activities, and parent support groups will find these resources on my site. New resources are being added for Houston and Austin, however
                                                I plan to include other cities around the United States. It was a hard-coded site before I converted it to WordPress. My goal is to make it
                                                manage and able to handle many posts as resources are added. Future plans include creating a CRUD application in PHP to allow 
                                                users to create accounts then add and update resources.</p>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                            <a href="http://www.higherlower.xyz/" target="_blank"><h3>Higher - Lower Game</a><a href="https://github.com/AudreyKBorges/enhanced-higher-lower" target="_blank"> | GitHub Project Link</h3></a>
                            <div class="align-cards">
                                <div class="flip-card two">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                        <img class="AL-screenshot" src="./images/higherlower.png" alt="Higher - Lower Game">
                                        </div>
                                        <div class="flip-card-back">
                                            <p class="paragraph">Higher - Lower is a number guessing game that I developed using HTML/CSS, Bootstrap, and JavaScript.
                                                The application prompts the user for a maximum number, validates the user input and does not allow invalid entries (negative numbers, 0, or non-numbers), 
                                                re-prompting the user if an invalid entry is provided, and rounds decimal numbers if the user enters one. It allows for unlimited user guesses and also 
                                                tracks valid guesses, guesses which are in range, are numbers, and are not duplicate guesses, to use in a victory message.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3>Travel Genie</a><a href="https://github.com/AudreyKBorges/travel-genie" target="_blank"> | GitHub Project Link</h3></a>
                            <video controls width="250">
                                <source src="./media/travel-genie.mp4" type="video/mp4">
                            </video>
                            <p class="paragraph2">Travel Genie is my capstone project developed at the end of my Gensis10 Software Developer apprenticeship program.
                                I worked in a team with two other people, and we planned a project timeline, a wireframe, and a database schema. This project was 
                                built using the following technologies: Java, Java Spring Framework, Java Security, JUnit, MySQL, Docker, React, HTML, CSS, SCSS, 
                                Git, and GitHub.
                            </p>
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
                                    <textarea id="message" name="message" placeholder="Enter your message here." rows="4" cols="35"><?php echo $message;?></textarea><br><br>
                                    <input id="submit" type="submit" value="Send Message">
                            </form>
                            <h3 class="social-h3">Follow Me on Social</h3> 
                            <div class="social">
                                <a target="_blank" href="https://www.linkedin.com/in/audreyborges/"><img class="icon" src="./images/linkedin.png" alt="LinkedIn logo"></a>
                                <a target="_blank" href="https://twitter.com/audreykborges"><img class="icon" src="./images/twitter.png" alt="Twitter logo"></a> 
                                <a target="_blank" href="https://github.com/AudreyKBorges"><img class="icon" src="./images/github.png" alt="GitHub logo"></a>
                                <a target="_blank" href="https://codepen.io/audrey-borges"><img class="icon" src="./images/codepen.png" alt="CodePen logo"></a>
                            </div>
                        </div>
                    </div>
                </div>
                        </section>
                        <footer class="main-footer">Audrey Borges Web Development copyright &copy; <script>document.write(new Date().getFullYear())</script></footer>
                    </div>
                </div>
            </div>
            <script src="./js/script.js"></script>
            <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
            <script>
                AOS.init();
            </script>
    </body>
</html>
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
include 'includes/header.php';
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
$host_name = "******";
$username = "******";
$password = "******";
$dbname = "******";

// Create connection
// $conn = new mysqli($host_name, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// $sql = "INSERT INTO `contacts`(`name`, `email`, `message`) VALUES ('$name', '$email', '$message')";

// if ($conn->query($sql) === false) {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }
?>
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
                            <p class="home-paragraph">I'm a recent <i>summa cum laude</i> graduate of the Bachelor of Science program in Web Design and Development at <a href="https://www.champlain.edu/">Champlain College</a>
                                in Burlington, Vermont, and I am familiar with front-end and back-end web technologies. I earned a full-stack Java certificate through Genesis10's intensive
                                training program called <a href="https://www.dev-10.com/">Dev10</a>, and it was challenging but fun. The stack used for this site as well as a couple of other past projects is pure HTML/CSS, JavaScript, and PHP. I have also worked with WordPress, 
                                Figma, Python, MySQL, Sass/SCSS, Bootstrap and had exposure to Invision and the PHP framework, Symfony.</p>
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
                                    <a id="dev10" href="https://www.credly.com/badges/8bcec0f7-3b0c-4273-977a-fddf432d18dd/public_url" target="_blank"><img class="dev10-image" src="./images/dev10-full-stack-java-developer.png" alt="dev10 full stack java developer"></a>
                                </div>
                            </div>
                            <div data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="200" data-aos-easing="ease-in-quad">
                                <div>
                                    <a id="champlain" href="https://www.parchment.com/u/award/880f29871f13e880a9c9705a7181d8e8" target="_blank"><img class="image" src="./images/diploma.png" alt="Champlain College BS Web Design and Development"></a>
                                </div>
                            </div>
                            <div data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="200" data-aos-easing="ease-in-quad">
                                <div>
                                    <a id="champlain2" href="https://www.parchment.com/u/award/7bfcb78a9d51e7992f1c7d764107130f" target="_blank"><img class="image" src="./images/certificate.png" alt="Champlain College Certificate of Concentrated Studies in Web Programming"></a>
                                </div>
                            </div>
                            <div data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="200" data-aos-easing="ease-in-quad">
                                <div>
                                    <img id="honor-society" class="image" src="./images/honor-society.png" alt="Alpha Sigma Lambda Honor Society">
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
                            <h3>PHP & WordPress</h3>
                            <a href="https://www.audreyborges.com/" target="_blank" id="portfolio-link"><h4>Portfolio Site</a> | <a href="https://github.com/AudreyKBorges/portfolio-site" target="_blank" id="portfolio-link">GitHub Project Link</h4></a>
                            <div class="align-cards">
                                <div class="flip-card one">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <img class="AL-screenshot" src="./images/portfolio.png" alt="audreyborges.com header">
                                        </div>
                                        <div class="flip-card-back">
                                            <p class="paragraph">This site, audreyborges.com, was designed using HTML, CSS including grid, flexbox, and media queries, and JavaScript on the front end. JavaScript was used to change the color
                                            of the nav bar on scroll and implement pop-out functionality for the hamburger menu that displays on smaller screens such as those on mobile devices. Audreyborges.com is a fully responsive site designed 
                                            from a mobile-first perspective and can be viewed in both portrait and landscape modes on tablets and mobile devices.<br></br>The back end of audreyborges.com was built using PHP, PHPmyAdmin, and MySQL 
                                            for the database and database management. Header and footer components were built in PHP, and the fully functioning contact form is in index.php. It sends the responses via email and saves them in a MySQL database.</p>
                                        </div>
                                    </div>
                                </div>
                                </div><br>
                                <div id="audreys-list"></div>
                        <a href="https://audreyslist.org/" target="_blank" id="portfolio-link"><h4>Audrey's List</a> | <a href="https://github.com/AudreyKBorges/audreys-list" target="_blank" id="portfolio-link">GitHub Project Link</h4></a>
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
                                                manage and able to handle many posts as resources are added. I recently configured user accounts to allow users to create an account so that they can 
                                                create and update their own resource listings. My next steps are to add additional content and add a sort function on the resource page.</p>
                                        </div>
                                    </div>
                                </div>
                                </div><br>
                            <h3>JavaScript</h3>
                            <a href="http://www.higherlower.xyz/" target="_blank" id="portfolio-link"><h4>Higher - Lower Game</a> | <a href="https://github.com/AudreyKBorges/enhanced-higher-lower" target="_blank" id="portfolio-link">GitHub Project Link</h4></a>
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
                            <a href="https://codepen.io/audrey-borges/full/KKmPpyx" target="_blank" id="portfolio-link"><h4>Log In & Sign Up Form</a> | <a href="https://codepen.io/audrey-borges/pen/KKmPpyx" target="_blank" id="portfolio-link">CodePen Project Link</h4></a>
                            <div class="align-cards">
                                <div class="flip-card two">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                        <img class="AL-screenshot" src="./images/login.png" alt="JS Sign Up & Log In Form">
                                        </div>
                                        <div class="flip-card-back">
                                            <p class="paragraph">This is a Log In & Sign Up Form that is styled using HTML/CSS and the form switches from log in
                                                to sign up when the appropriate tabs are clicked. The document object model (DOM) is manipulated using querySelector
                                            and onclick events are used for the tabs.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="travel-genie"></div>
                            <h3>Java</h3>
                                <h4>Travel Genie | <a href="https://github.com/AudreyKBorges/travel-genie" target="_blank" id="portfolio-link">GitHub Project Link</a></h4>
                                    <video controls width="250">
                                        <source src="./media/travel-genie.mp4" type="video/mp4">
                                    </video>
                                    <p class="paragraph2">Travel Genie is my capstone project developed at the end of my Dev10 Software Developer apprenticeship program 
                                        completed through Genesis10. I worked on a team with two other people, and we planned a project timeline, a wireframe, and a database 
                                        schema. This project was built using the following technologies: Java, Java Spring Framework, Java Security, JUnit, MySQL, Docker, React, 
                                        HTML, CSS, SCSS, Git, and GitHub.
                                    </p>
                            <h3>Content Writing</h3>
                                <h4><a href="https://thatssola.weebly.com/" target="_blank" id="portfolio-link">A Working Girl's Guide to Los Angeles</a></h4>
                                <div class="align-cards">
                                    <div class="flip-card two">
                                        <div class="flip-card-inner">
                                            <div class="flip-card-front">
                                            <img class="AL-screenshot" src="./images/working-girl.png" alt="A Working Girl's Guide to Los Angeles">
                                            </div>
                                            <div class="flip-card-back">
                                                <p class="paragraph">I took the course Writing for the Web at Champlain College, and A Working Girl's Guide to Los Angeles
                                                    is my final project for that class, which showcases my knowledge of AP style and basic SEO. All of the images on the site
                                                    were taken by me, and I wrote about my own experiences. Now, I need to do a guide for my new city--ATX!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <h3>Wireframes & Prototypes</h3>
                                <h4>Mortar and Pestle Bakery Wireframe</h4>
                                <p class="paragraph2">This is a site mockup for a fictitous bakery. It was created using Balsamiq Wireframes.</p>
                                    <div>
                                        <img class="image" src="./images/wireframeOne.png" alt="Mortar and Pestle wireframe panels 1 & 2">
                                    </div>
                                    <div>
                                        <img class="image" src="./images/wireframeTwo.png" alt="Mortar and Pestle wireframe panels 3 & 4">
                                    </div>
                                    <div>
                                        <img class="image" src="./images/wireframeThree.png" alt="Mortar and Pestle wireframe panels 5 & 6">
                                    </div>
                                    <div>
                                        <img class="image" src="./images/wireframeFour.png" alt="Mortar and Pestle wireframe panel 7">
                                    </div>
                                <h4>Travel Genie Wireframe</h4>
                                    <p class="paragraph2">This is a site mockup for <a href="#travel-genie" class="travel-genie">Travel Genie</a>. It was created using Balsamiq Wireframes.</p>
                                        <div>
                                            <img class="image" src="./images/TravelGenieWireframe.png" alt="Travel Genie Wireframe">
                                        </div>
                                <h4>Audrey's List Prototype</h4>
                                <p class="paragraph2">This is a site mockup and prototype for <a href="#audreys-list" class="travel-genie">Audrey's List</a>. It was created using Figma.</p>
                                    <div>
                                        <img class="image" src="./images/ALPrototype.png" alt="Audrey's List prototype">
                                    </div>
                        </div>
                    </section>
                    <div id="contact">
                        <div data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="200" data-aos-easing="ease-in-quad">
                        <section class="grid-contact">
                        <form id="form" method="post" name="form" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validateCaptcha();">
                            <h2 class="contact-me">Contact Me</h2>
                                <p class="contact-para">Let's work together!</p> 
                                <p class="contact-para">Let me know what kind of site I can build for you.</p><br>
                                <div>
                                    <label for="name" value="<?php echo $name;?>">Name  * </label><br>
                                    <span class="error"><?php echo $nameErr;?></span>
                                    <input type="text" id="name" name="name" placeholder="Enter your name here.">
                                </div><br>
                                <div>
                                    <label for="email" value="<?php echo $email;?>">Email  * </label><br>
                                    <span class="error"><?php echo $emailErr;?></span>
                                    <input type="email" id="email" name="email" placeholder="Enter your email here."><br>
                                </div>
                                <div>
                                    <div><label for="message">Message</label></div>
                                    <textarea id="message" name="message" placeholder="Enter your message here." rows="5" cols="30"><?php echo $message;?></textarea>
                                </div><br>
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
                      <?php include 'includes/footer.php'; ?>

<?php
ob_start(); // Start output buffering
/**
 * PHP version 8.2
 * 
 * @category None
 * @package  None
 * @author   "Audrey Borges <audrey.borges@audreyborges.com>
 * @license  https://www.audreyborges.com/ GNU Public License
 * @link     https://www.audreyborges.com/
 */
require 'includes/header.php';
/**
 * Define data parameter
 * 
 * @param string $data test input data
 * 
 * @return string 
 */
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

if (headers_sent($file, $line)) {
    die("🚨 Headers already sent in $file on line $line");
}

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
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
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

        if ($_POST["email"] == 'jaded3speed@gmail.com') {
            echo "<script>window.location.href='https://audreyborges.com/html/forbidden.html';</script>";
            exit;
        }

        if (preg_match("/@audreyborges/", $email)) {
            echo "<script>window.location.href='https://audreyborges.com/html/forbidden.html';</script>";
            exit;
        }
    }

    if (empty($_POST["message"])) {
        $message = "";
    } else {
        $message = test_input($_POST["message"]);
    }

    if (empty($nameErr) && empty($emailErr)) {
        $toEmail = 'audrey.borges@audreyborges.com';
        $emailSubject = 'New email from your contact form';

        if (filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/[\r\n]/", $email)) {
            $fromEmail = "noreply@audreyborges.com";
            $headers = "From: $fromEmail\r\n";
            $headers .= "Reply-To: $email\r\n";
            $headers .= "Content-Type: text/html; charset=iso-8859-1\r\n";

            $bodyParagraphs = ["Name: {$name}", "Email: {$email}", "Message:", $message];
            $body = nl2br(join("\n", $bodyParagraphs));

            // db connection
            $host_name = "";
            $username = "";
            $password = "";
            $dbname = "";

            // Create connection
            $conn = new mysqli($host_name, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO `contacts`(`name`, `email`, `message`) VALUES ('$name', '$email', '$message')";

            if ($conn->query($sql) === false) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            if (mail($toEmail, $emailSubject, $body, $headers)) {
                // Redirect using PHP
                header("Location: https://audreyborges.com/html/thank-you.html");
                exit();

                // If header() fails, fallback to JavaScript redirect
                echo "<script>window.location.href='https://audreyborges.com/html/thank-you.html';</script>";
                exit();
            } else {
                error_log("Mail sending failed.");
                $errorMessage = 'Oops, something went wrong. Please try again later.';
            }
        } else {
            $errorMessage = 'Invalid email address.';
        }
    }
}

// Checking valid form is submitted or not
if (isset($_POST['submit_btn'])) {

    // Storing name in $name variable
    $name = $_POST['name'];

    // Storing google recaptcha response in $recaptcha variable
    $recaptcha = $_POST['g-recaptcha-response'];

    // Put secret key here
    $secret_key = '**************';

    // Hitting request to the URL, Google will respond with success or error
    $url = 'https://www.google.com/recaptcha/api/siteverify?secret='
        . $secret_key . '&response=' . $recaptcha;

    // Making request to verify captcha
    $response = file_get_contents($url);

    // Response return by google is in JSON format, so parse that json
    $response = json_decode($response);

    // Check if response is true or not
    if ($response->success == true) {
        echo '<script>alert("Google reCAPTACHA verified")</script>';
    } else {
        echo '<script>alert("Error in Google reCAPTACHA")</script>';
    }
}
ob_end_flush(); // End output buffering
?>

<button class="openbtn" onclick="openNav()">☰</button>
<section class="flex-about">
    <div id="about"></div>
    <h1>
        <span data-aos="fade-left" data-aos-duration="1000">Hello,</span>
        <span data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">I'm</span>
        <span data-aos="fade-left" data-aos-duration="1000" data-aos-delay="400">Audrey!</span>
    </h1>
    <div data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="200" data-aos-easing="ease-in-quad">
        <div class="audrey-container">
            <img class="audrey" src="./images/audrey.jpg" alt="Headshot of Audrey">
        </div>
    </div>
    <div data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="200" data-aos-easing="ease-in-quad">
        <h2 class="about-me">About Me</h2>
    </div>
    <div data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="200" data-aos-easing="ease-in-quad">
        <p class="home-paragraph">I am a graduate student pursuing my Master of Science in Computer Science degree with a specialization in interactive intelligence at <a href="https://www.gatech.edu/">Georgia Institute of Technology</a>
            in Atlanta, Georgia. I graduated <i>Summa Cum Laude</i> from the Bachelor of Science program in Web Design and Development at <a href="https://www.champlain.edu/">Champlain College</a> in Burlington, Vermont, and I also earned
            certificates in Web Programming and full-stack Java. The stack used for this site as well as a couple of other past projects is pure HTML/CSS, JavaScript, and PHP. I have also worked with WordPress, Figma, Python, MySQL,
            Sass/SCSS, Bootstrap and had exposure to Invision and the PHP framework, Symfony.</p>
    </div>
    <div data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="200" data-aos-easing="ease-in-quad">
        <p class="home-paragraph">I began my professional career as a Total Content Management System (TCMS) Developer for <a href="https://bloxdigital.com/">BLOX Digital</a>, a leading provider of local news and information.
            I am currently assisting with the development of an Adobe Photoshop UXP plugin that integrates with the BLOX Total CMS environment. During my first three months, I reenvisioned and improved the user
            interface by adjusting the spacing and layout using CSS flexbox, and also built a feature that allows elements to change color based on the user’s template preference.</p>
    </div>
    <div data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="200" data-aos-easing="ease-in-quad">
        <p class="home-paragraph">The software development team at BLOX
            develops PHP modules and applications for clients' BLOX CMS Software-as-a-Service solution that serves millions of pageviews daily nationwide. I work with a team of product managers, frontend developers, and other stakeholders
            to design and define new features for vertical applications connected to the CMS and build scalable solutions that handle sudden flash traffic to websites based on breaking news conditions around the Internet.</p>
    </div>
    <div data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="200" data-aos-easing="ease-in-quad">
        <p class="home-paragraph">Software development became my passion because I am fascinated by technology, and I enjoy creative and analytical work.
            The first content management system I ever worked on was Joomla, which was used to manage my former company's website.
            I edited content, managed the blog, and wrote content for the blog as well. My natural curiosity drove me to learn how websites
            are built, so I started learning HTML and CSS then Python and JavaScript and my programming journey took off. I learn more every day, and I love it!</p>
    </div>
    <div data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="200" data-aos-easing="ease-in-quad">
        <p class="home-paragraph">Austin, Texas is currently my home base, and it's a fun, friendly and laid back city with fantastic
            hiking, several lakes, a great art scene, and the best live music. When I'm not building an awesome new software project, I can
            be found having adventures with my husband that typically involve hiking, shopping for vintage clothing and sneakers, meandering
            through a museum or getting a cold brew coffee or latte from one of Austin's many great coffee houses.</p>
    </div>
    <div>
        <div data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="200" data-aos-easing="ease-in-quad">
            <h3 id="education-h3">Education & Certificates</h3>
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
<section class="flex-projects">
    <div data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="200" data-aos-easing="ease-in-quad">
        <h2>Portfolio</h2>
    </div>
    <div data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="200" data-aos-easing="ease-in-quad">
        <div class="project">
            <h3>BLOX Total CMS | UI Development | Adobe UXP</h3>
            <p class="paragraph2">
                Two years into my role as a BLOX Total CMS Developer at <a href="https://www.bloxdigital.com" target="_blank" id="blox-link">BLOX Digital</a>, I find myself more passionate about my career than ever before. Working alongside a talented and supportive team, I’ve had incredible opportunities to learn, grow, and contribute meaningfully. I’ve been at the forefront of developing the BLOX Total CMS Client for Adobe Photoshop and the BLOX Total CMS Plug-in for InDesign, taking a leading role in designing and implementing user interfaces and core functionalities. These projects have been instrumental in shaping both my technical expertise and collaborative skills.</p>
            <h4><a href="https://exchange.adobe.com/apps/cc/4b709293/blox-total-cms-client" target="_blank" id="photoshop-link">
                    BLOX Total CMS Client for Adobe Photoshop</a></h4>
            <div class="align-cards">
                <div class="flip-card one">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <img class="AL-screenshot" src="./images/Photoshop.png" alt="audreyborges.com header">
                        </div>
                        <div class="flip-card-back">
                            <p class="paragraph">The BLOX Total CMS client for Adobe Photoshop® allows BLOX Total CMS clients without appliances to create and edit image assets in any BLOX Total CMS domain. Images can be modified using any of Adobe Photoshop’s image editing options so long as the file formats can remain as a .jpg or .png file as BLOX Total CMS requires. Users can edit nearly any of the BLOX metadata including title, slug, workflow, priority, presentation mode, caption, credit, authors, sections, flags and keywords. In addition, assets can be budgeted to a BLOX Total CMS Edition, Section or Page. Finally, it is easy to add the assets as children to any article or collection. </p>
                        </div>
                    </div>
                </div>
            </div>
            <h4><a href="https://exchange.adobe.com/apps/cc/e6cf5311/blox-total-cms-plug-in-for-indesign" target="_blank" id="indesign-link">
                    BLOX Total CMS Plug-in for Adobe InDesign</a></h4>
            <div class="align-cards">
                <div class="flip-card one">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <img class="AL-screenshot" src="./images/InDesign.png" alt="audreyborges.com header">
                        </div>
                        <div class="flip-card-back">
                            <p class="paragraph">The BLOX Total CMS Plug-in for Adobe InDesign® allows BLOX Total CMS clients without appliances to create and edit snippets in any BLOX Total CMS domain. This Adobe InDesign plug-in allows a BLOX Total CMS user to create, place, and manage BLOX Total CMS snippets. </p>
                        </div>
                    </div>
                </div>
            </div>
            <h3>PHP & WordPress</h3>
            <h4><a href="#home" id="home-link">Portfolio Site
                </a> | <a href="https://github.com/AudreyKBorges/portfolio-site" target="_blank" id="portfolio-link">GitHub Project Link</h4></a>
            <div class="align-cards">
                <div class="flip-card one">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <img class="AL-screenshot" src="./images/portfolio.png" alt="audreyborges.com header">
                        </div>
                        <div class="flip-card-back">
                            <p class="paragraph">audreyborges.com, was constructed using HTML, CSS flexbox, media queries, and JavaScript on the front end. JavaScript was used to change the color
                                of the nav bar on scroll and implement pop-out functionality for the hamburger menu that displays on smaller screens including mobile devices.<br></br>The back end was built using PHP, PHPmyAdmin, and MySQL
                                for the database. Header and footer components and the contact form were built in PHP. The contact form sends the responses via email and saves them in the database.</p>
                        </div>
                    </div>
                </div>
            </div><br>
            <div id="audreys-list"></div>
            <a href="https://audreyslist.org/" target="_blank" id="portfolio-link">
                <h4>Audrey's List
            </a> | <a href="https://github.com/AudreyKBorges/audreys-list" target="_blank" id="portfolio-link">GitHub Project Link</h4></a>
            <div class="align-cards">
                <div class="flip-card one">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <img class="AL-screenshot" src="./images/ALscreenshot.png" alt="Audrey's List homepage">
                        </div>
                        <div class="flip-card-back">
                            <p class="paragraph">Audrey's List is a platform designed for those caring for individuals with autism. Families seeking therapy, playgroups, activities, or parent support groups can find valuable resources on the site.
                                Originally a hard-coded site, Audrey's List was recently converted to WordPress to better manage its growing number of resource listings. User accounts have also been configured, allowing users to create and update their own listings. Next steps include adding more content and implementing a sort function on the resource page for easier navigation.</p>
                        </div>
                    </div>
                </div>
            </div>
            <h3>JavaScript</h3>
            <a href="http://www.higherlower.xyz/" target="_blank" id="portfolio-link">
                <h4>Higher - Lower Game
            </a> | <a href="https://github.com/AudreyKBorges/enhanced-higher-lower" target="_blank" id="portfolio-link">GitHub Project Link</h4></a>
            <div class="align-cards">
                <div class="flip-card two">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <img class="AL-screenshot" src="./images/higherlower.png" alt="Higher - Lower Game">
                        </div>
                        <div class="flip-card-back">
                            <p class="paragraph">Higher - Lower is a number guessing game that I developed using HTML/CSS, Bootstrap, and JavaScript.
                                The application prompts the user for a maximum number, validates the user input and does not allow invalid entries (negative numbers, 0, or non-numbers),
                                re-prompting the user if an invalid entry is provided, and rounds decimal numbers if the user enters one. It allows for unlimited user guesses and
                                tracks valid guesses, guesses which are in range, are numbers, and are not duplicate guesses, to use in a victory message.</p>
                        </div>
                    </div>
                </div>
            </div>
            <a href="https://codepen.io/audrey-borges/full/KKmPpyx" target="_blank" id="portfolio-link">
                <h4>Log In & Sign Up Form
            </a> | <a href="https://codepen.io/audrey-borges/pen/KKmPpyx" target="_blank" id="portfolio-link">CodePen Project Link</h4></a>
            <div class="align-cards">
                <div class="flip-card two">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <img class="AL-screenshot" src="./images/login.png" alt="JS Sign Up & Log In Form">
                        </div>
                        <div class="flip-card-back">
                            <p class="paragraph">This is a Log In & Sign Up Form that is styled using HTML/CSS and the form switches from log in
                                to sign up when the appropriate tabs are clicked. The document object model (DOM) is manipulated using querySelector
                                and onclick events are used for the tabs. Onfocus and onblur events were used to add and remove focus to the fields as the
                                user interacts with them.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="travel-genie"></div>
            <h3>Java</h3>
            <h4>Travel Genie | <a href="https://github.com/AudreyKBorges/travel-genie" target="_blank" id="portfolio-link">GitHub Project Link</a></h4>
            <video controls="true" width="250" height="125" preload="auto" autoplay loop muted playsinline>
                <source src="./media/travel-genie.mp4" type="video/mp4">
            </video>
            <p class="paragraph2">Travel Genie is my capstone project developed at the end of my Dev10 Software Developer apprenticeship program
                completed through Genesis10. I worked on a team with two other people, and we planned a project timeline, a wireframe, and a database
                schema. This project was built using the following technologies: Java, Java Spring Framework, Java Security, JUnit, MySQL, Docker, React,
                HTML, CSS, SCSS, Git, and GitHub.<br></br>
                Travel Genie uses an model-view-controller (MVC) architecture that includes a data layer, domain layer, and a UI layer, where the controllers are.
                The data layer contains repository files that interact with the database by adding or retrieving data requested by the controllers. The domain
                layer contains the business logic. This code is intended to be reusable so it can be replicated in other projects. Unit testing was done with
                Spring Boot on the data and domain layers to ensure proper functionality. This project was intended to mimic an enterprise application.
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
                                were taken by me, and I wrote about my own experiences.</p>
                        </div>
                    </div>
                </div>
            </div>
            <h3>Wireframes & Prototypes</h3>
            <h4>JobCompare Android App Prototype</h4>
            <p class="paragraph2">This is a prototype for an Android app that I built as part of a group project for CS-6300 Software Development Process at Georgia Institute of Technology.<a href="#audreys-list" class="travel-genie">JobCompare App</a>. It was created using Figma.</p>
            <div>
                <img class="image" src="./images/JobCompare.png" alt="JobCompare prototype">
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
        </div>
</section>
<div id="contact">
    <div data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="200" data-aos-easing="ease-in-quad">
        <section class="flex-contact">
            <form id="form" method="post" name="form" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateCaptcha();">
                <h2 class="contact-me">Contact Me</h2>
                <p class="contact-para">If you have questions about my portfolio, please reach out.</p>
                <div>
                    <label for="name" value="<?php echo $name; ?>">Name * </label><br>
                    <span class="error"><?php echo $nameErr; ?></span>
                    <input type="text" id="name" name="name" placeholder="Enter your name here." required>
                </div><br>
                <div>
                    <label for="email" value="<?php echo $email; ?>">Email * </label><br>
                    <span class="error"><?php echo $emailErr; ?></span>
                    <input type="email" id="email" name="email" placeholder="Enter your email here." required><br>
                </div>
                <div>
                    <div><label for="message">Message</label></div>
                    <textarea id="message" name="message" placeholder="Enter your message here." rows="5" cols="30"><?php echo $message; ?></textarea>
                </div><br>
                <div id="recaptcha">
                    <div class="g-recaptcha" data-sitekey="6Le939wnAAAAAE-dc16QEgUuSPPUOUyjHPy5lwzV"></div>
                </div>
                <br />
                <input id="submit" type="submit" value="Send Message">
            </form>
            <h3 class="social-h3">Let's connect!</h3>
            <div class="social">
                <a target="_blank" href="https://www.linkedin.com/in/audreyborges/"><img class="icon" src="./images/linkedin.png" alt="LinkedIn logo"></a>
                <a target="_blank" href="https://github.com/AudreyKBorges"><img class="icon" src="./images/github.png" alt="GitHub logo"></a>
                <a target="_blank" href="https://codepen.io/audrey-borges"><img class="icon" src="./images/codepen.png" alt="CodePen logo"></a>
                <a target="_blank" href="https://instagram.com/audreykborges"><img class="icon" src="./images/instagram.png" alt="Instagram logo"></a>
            </div>
    </div>
</div>
</section>
<?php require 'includes/footer.php'; ?>
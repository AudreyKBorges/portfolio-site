<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audrey Borges Web Developer</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="../js/script.js"></script>
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
                <li><a href="#resume">Résumé</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        <nav class="main-nav" id="main-nav">
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#resume">Résumé</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>
    <div id="content">
        <button class="openbtn" onclick="openNav()">☰</button>
        <section class="grid-about">
            <div id="about"></div>
            <h1 class="animate__backInDown">Hello, I'm Audrey!</h1>
            <img class="audrey" src="../images/Audrey.JPG" alt="Headshot of Audrey">
            <h2>About Me</h2>
            <div class="home-paragraph">
            <p>I'm a recent Summa Cum Laude graduate of the Bachelor of Science program in Web Design and Development at Champlain College
                in Burlington, Vermont, and I am familiar with front-end and back-end web technologies. My current stack is pure
                HTML/CSS, JavaScript, and PHP. I have also worked with WordPress, Figma, Python, MySQL, sass/scss, Bootstrap and had exposure to Invision,
                SQL, and the PHP framework, Symfony.</p>
            <p>Web development became my passion because I am fascinated by technology and I enjoy creative and analytical work.
                The first content management system I ever worked on was Joomla, which was used to manage my former company's website.
            I edited content, managed the blog, and wrote content for the blog as well. My natural curiosity drove me to learn how websites
        are built, so I started learning HTML and CSS then Python and my programming journey took off. I learn more every day, and I love it!</p>
        <div id="portfolio"></div>
        <p>Houston, Texas is currently my home base, and the weather is hot but so is the art
                scene. When I'm not building an awesome new web project or working at theCoderSchool teaching kids to code, 
            I go to art museums and art shows, I enjoy coffee--love my cold brew with oat milk, and I get my nature fix at
        one of Houston's many beautiful parks.</p>
    </div>
        </section>
        <section class="grid-projects">
            <h2>Portfolio</h2>
            <div class="project1">
            <a href="https://audreyslist.org/" target="_blank"><h3>Audrey's List</h3></a>
            <a href="https://audreyslist.org/" target="_blank"><img class="ALscreenshot" src="../images/ALscreenshot.png" alt="Image of Audrey's List homepage"></a>
            <p class="AL-paragraph">Audrey's List is a site made with love for families who have loved ones of all ages who have autism. Families looking for therapy,
                playgroups, activities, and parent support groups will find these resources on my site. New resources are being added for the Houston area, however
                I do plan to expand to include other cities around the United States.</p>
            <p class="AL-paragraph2">Audrey's List started out as a hard-coded site, then it was converted to WordPress and a custom theme was designed. The goal is to 
                ensure that it is easy to manage and able to handle many posts as resources are added. The resource page is a post grid that starts as one column on mobile
                devices, then expands to two and three columns for tablet and desktop sites respectively. There is also a contact form on the contact page that goes to a
                custom email after it's submitted, and the information is stored in a MySQL database. My future plans include creating a CRUD application in PHP to allow 
                users to create accounts then add and update resources themselves.</p>    
            </div>
        </section>
        <div id="resume"></div>
        <section class="grid-resume">
            <h2>Résumé</h2>
            <img class="resume" src="../images/Audrey_Borges_Resume.jpg" alt="Audrey Borges's Resume">
        </section>
        <div id="contact">
        <section class="grid-contact">
            <form id="form" method="post">
                <h2 class="contact-me">Contact Me</h2>
                <p>Let's work together. Let me know what kind of site I can build for you.</p><br>
                  <label for="name">Name</label><br>
                  <input type="text" id="name" name="name" placeholder="Enter your name here."><br>
                  <label for="email">Email</label><br>
                  <input type="email" id="email" name="email" placeholder="Enter your email here." required><br>
                  <label for="phone">Phone number</label><br>
                  <input type="tel" id="phone" name="phone" placeholder="Enter your phone number here." required><br>
                  <label for="textarea">Details</label><br>
                  <textarea id="textarea" name="textarea" placeholder="Enter your comments here." rows="4" cols="50"></textarea>
                  <input id="submit" type="submit" value="Send Message">
                </form>
            <h3 class="social-h3">Follow Me on Social</h3> 
            <div class="social">
                <a target="_blank" href="https://www.linkedin.com/in/audreyborges/"><img class="icon" src="../images/linkedin.png" alt="LinkedIn logo"></a>
                <a target="_blank" href="https://twitter.com/audreykborges"><img class="icon" src="../images/twitter.png" alt="Twitter logo"></a> 
                <a target="_blank" href="https://github.com/AudreyKBorges"><img class="icon" src="../images/github.png" alt="GitHub logo"></a>
                <a target="_blank" href="https://codepen.io/audrey-borges"><img class="icon" src="../images/codepen.png" alt="CodePen logo"></a>
            </div>
        </section>
    </div>
        <footer class="main-footer">Audrey Borges Web Development copyright &copy; <script>document.write(new Date().getFullYear())</script></footer>
    </div>
    </div>
</body>
</html>	
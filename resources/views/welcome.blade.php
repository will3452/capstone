<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="fontawesome/fontawesome-free-5.15.2-web/css/all.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="main-container">
        <div class="navigator">
            <nav>
                <div class="title">
                    <h1>{{ nova_get_setting('system_name', config('app.name')) }}</h1>
                </div>
                <div class="loginandsignup">
                   <div><a href=""><h4>login </h4></a></div>
                   <div><h4 id="h4"> / </h4></div>
                   <div><a href=""><h4> Registration</h4></a></div>
                </div>
            </nav>
        </div>
        <div class="cont cont1">
            <div class="cont1-content">
                <h2>{{ nova_get_setting('system_name', config('app.name')) }}</h2>
                <button>APPOINT NOW</button>
            </div>
        </div>
        <div class="cont cont2">
            <div class="cont2-content">
                <h2>ABOUT US</h2>
                <div class="imageabout">
                    <img src="images/image-about.jpg" alt="" style="object-fit: cover">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis 
                        ullam suscipit consequuntur sapiente debitis hic dolorum maiores natus. Perfe
                        rendis voluptatibus aperiam corporis laborum nostrum deleniti, amet expedita? Dicta, sint eius.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus neque totam modi 
                    laudantium aut, temporibus voluptas obcaecati quas natus archite
                    cto nemo! Eum a tenetur ratione, harum soluta libero minima odio!m</p>
                </div>
            </div>
        </div>
        <div class="cont cont3">
            <div class="cont3-content">
                <h2>CONTACT US</h2>
                <div class="contact-content">
                    <ul>
                        <li>Email Here</li>
                        <li>Email Here</li>
                        <li>Email Here</li>
                        <li>Email Here</li>
                    </ul>
                </div>
            </div>
        </div>
        <footer>
            <div id="divpri">
                <p>PRIVACY AND POLICY</p>
                <p id="hidep">|</p>
                <P>TERMS AND CONDITION</P>
            </div>
            <div>
                <span>CREATED BY BSB</span>
            </div>

        </footer>
    </div>
</body>
</html>
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" type="text/css" href="style.css">
            <title>De Gokkers</title>
        </head>
        <body>
        <div id="banner">
        <img src="img/banner.png" alt="banner">
        </div>
            <div class="header">
                <h1>De Gokkers Groep 15</h1>
            </div>
        <div class="welcome">
            <h2>Welkom, <?php ?></h2>
        </div>
        <div id="info">
            <h3>Informatie</h3>
            <p>Deze website is bedoeld voor een project genaamd "De Gokkers". Deze applicatie simuleert een race</p>
            <p> tussen 5 hamsters. Er zijn 3 "Guys" : Sietse, Lidy en Fer. Zij kunnen ieder op 1 hamster wedden. </p>
            <p>De laatste hamster, die ook Sietse heet verdwijnt na de eerste race.</p>
            <p>Als de hamster waar een van de guys op heeft gewed, wordt zijn of haar inzet verdubbeld.</p>
            <p>Als je hamster niet wint, verlies je het geld wat je hebt ingezet.</p>
            <p>De race zelf is volledig random.</p>
            <p>Als u uw bank gegevens aan ons geeft kunt u het geld ECHT krijgen!!!</p>
            <div id="video">
                <video width="320" height="240" controls>
                    <source src="videos/DeGokkers.mp4" type="video/mp4">
                </video>
            </div>
        </div>

        <div class="login">
            <form action="" method="post">
                <div class="login">
                    <label for="email">email</label>
                    <input type="email" name = "email" id = "email">
                    <label for="password">wachtwoord</label>
                    <input type="password" name = "password" id = "password">
                </div>
                <input type="submit" value="Send">
            </form>
        </div>

        <div class="download">

            <a href="./program/deGokkers.exe"><img src="img/Download_Button.png" alt=""></a>
        </div>
        </body>
        </html>

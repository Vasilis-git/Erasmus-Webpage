<!DOCTYPE html>
<?php 
    session_start();
?>
<html style="background-color: rgb(173, 173, 173);">
    <head>
        <meta charset="UTF-8">
         <link rel="stylesheet" href="styles/stylefile.css"/>
        <title> Erasmus UoP</title>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
    </head>
    <style>
        p{
            background-color: rgb(196, 196, 196);
            border-radius: 1vw;
            grid-area: p;
            font-size: large;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }
        @media screen and (min-width: 760px) {/*for desktop*/
                .container{
                        display: grid;
                        grid-template-columns: repeat(8, 1fr);
                        grid-auto-rows: minmax(1vw, auto);
                        
                        grid-template-areas: 
                        "h  h  h  h  h  h  h  hi"
                        "ht ht ht ht ht ht ht hi"
                        "m  m  m  m  m  m  m  m"
                        ".  .  f  f  f  f  .  ."
                        "fi fi fi fi fi fi fi fi"
                        ;
                }
            }
            @media screen and (max-width: 759px) {/*for phones and tablets*/
                .container{
                    display: grid;
                    grid-template-columns: repeat(1, 1fr);
                    margin: 0 auto;
                    grid-template-areas: 
                                    "h"
                                    "ht"
                                    "m"
                                    "f"
                                    "f"
                                    "f";
                }
                .heading{
                    border-top-right-radius: 1vw;
                }
                .heading-title{
                    border-bottom-right-radius: 1vw;
                }
                .footer-image{
                    display: none;
                }
                .heading-image{
                    display: none;
                }
                .menu{
                    margin-bottom: 2vw;
                }
                form{
                    margin:auto;
                }
            } 
    </style>
    <body> 
        <div class="container">
            <div class="heading">
                <h1>Πρόγραμμα Erasmus Πανεπιστήμιο Πελλοπονήσου</h1>
            </div>       
            <div class="heading-image">
                <img src="media/images/uoplogo.png" alt="University of the Pelloponese Logo">
            </div>   
            <div class="heading-title">
                <h1>Προφίλ Χρήστη</h1>
            </div>

            <div class="menu">
                <a href="index.php">Αρχική</a>
                <a href="more.html">Περισόττερα</a>
                <a href="reqs.php">Ελάχιστες απαιτήσεις</a>
                <a href="app.php">Αίτηση</a>
            </div>

           
                <br>
                <form>
                    <div class="form-credentials">
                        <p>Username: <?php echo $_SESSION['username']; ?></p><br>
                        <p>Όνομα: </p>
                        <input type="text" name="fname" value="<?php echo $_SESSION['fname']; ?>"> <br>
                        <p>Επίθετο: </p>
                        <input type="text" name="lname" value="<?php echo $_SESSION['lname']; ?>"> <br>
                        <p>ΑΜ: </p>
                        <input type="number" name="AM"  value="<?php echo $_SESSION['a_m']; ?>"> <br>
                    </div>
                <form>
                <form action="scripts/sign_out.php" method="POST">
                    <div class="form-buttons" style="text-align: center;">
                        <input type="submit" name="sign-out" value="Αποσύνδεση">
                    <div>
                </form>   
                </div>
            
        </div>
    </body>
    <script>
    </script>
</html>
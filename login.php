<!DOCTYPE html>

<html style="background-color: rgb(173, 173, 173);">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="styles/stylefile.css"/>
        <title> Erasmus UoP</title>
        <style>
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
    </head>
    <body>
        <div class="container">
            
                <div class="heading">
                    <h1>Πρόγραμμα Erasmus Πανεπιστήμιο Πελλοπονήσου</h1>       
                </div>
                <div class="heading-image">
                    <img src="media/images/uoplogo.png" alt="University of the Pelloponese Logo">
                </div>   
                <div class="heading-title">
                    <h1>Σύνδεση χρήστη</h1>
                </div>

                <div class="menu">
                    <a href="index.php">Αρχική</a>
                    <a href="more.html">Περισόττερα</a>
                    <a href="reqs.php">Ελάχιστες απαιτήσεις</a>
                    <a href="application.php">Αίτηση</a>
                </div>
 
 
                <form>
                    <br>
                    <div class="form-credentials">
                        <input type="text" name ="l-username" maxlength="10" placeholder="Όνομα χρήστη"><br>
                        <input type="password" name ="l-password" maxlength="15" placeholder="Κωδικός πρόσβασης"><br>
                    </div>
                    <div class="form-buttons" style="text-align: center;">
                        <input type="button" name="l-submit" value="Υποβολή">
                        <input type="button" name="clear-form" value="Καθαρισμός φόρμας">
                        <a href="sign-up.php" style="text-decoration: none;font-size: small;">Νέος χρήστης;</a>
                    </div>
                </form>

            
            <div class="footer-image">
                <img src="media/images/erasmus.png" alt="Erasmus picture" width="186" height="57">
            </div>
        </div>
    </body>
</html>
<!DOCTYPE html>

<?php 
    session_start();
?>

<html style="background-color: rgb(173, 173, 173);">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="styles/stylefile.css"/>
        <title> Erasmus UoP</title>
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
                        ".  .  p  p  p  p  .  ."
                        "fi fi fi fi fi fi fi fi"
                        ;
                }
            }
            @media screen and (max-width: 759px) {/*for tablets and phones*/
                .container{
                        display: grid;
                        grid-template-columns: repeat(1, 1fr);
                        grid-auto-rows: minmax(1vw, auto);
                        
                        grid-template-areas: 
                        "h"
                        "ht"
                        "m"
                        "p"
                        ;
                }
                .heading{
                    border-top-right-radius: 1vw;
                }
                .heading-title{
                    border-bottom-right-radius: 1vw;
                }
                .footer-image{
                    display:none;
                }
                .heading-image{
                    display:none;
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
                <h1>Αίτηση</h1>
            </div>

            <div class="menu">
                <a href="index.php">Αρχική</a>
                <?php
                    if(!isset($_SESSION['username'])){
                        echo "<a href=\"login.php\">Σύνδεση χρήστη</a>";
                    }
                ?>
                <a href="more.html">Περισόττερα</a>
                <a href="reqs.php">Ελάχιστες απαιτήσεις</a>
            </div>

            <?php
                if(isset($_SESSION['username']) && $_SESSION['user-type'] == 'registered'){
                    header("location: usr_application.php");
                }
                elseif(isset($_SESSION['username']) && $_SESSION['user-type'] == 'admin'){
                    header("location: admin_applications.php");
                }
            ?>
            <p>Πρέπει να εγγραφείς για να έχεις πρόσβαση σε αυτό το περιεχόμενο.</p>
       </div>
    </body>
</html>
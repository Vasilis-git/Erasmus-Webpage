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
        <style>
            @media screen and (min-width: 760px) {/*for desktop*/
                .container{
                        display: grid;
                        grid-template-columns: repeat(8, 1fr);
                        grid-auto-rows: minmax(1vw, auto);
                        margin: 0 auto;
                        grid-template-areas: 
                                            "h  h  h  h  h  h  h  hi"
                                            "ht ht ht ht ht ht ht hi"
                                            "m  m  m  m  m  m  m  m"
                                            "c  c  c  c  c  c  c  c"
                                            "c  c  c  c  c  c  c  c"
                                            "c  c  c  c  c  c  c  c"
                                            "fi fi fi fi fi fi fi fi";
                }
            }
            @media screen and (max-width: 600px) {/*for phones*/
                .container{
                    display: grid;
                    grid-template-columns: repeat(1, 1fr);
                    margin: 0 auto;
                    grid-template-areas: 
                                    "h "
                                    "ht"
                                    "m"
                                    "c"
                                    "c"
                                    "c ";
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
            }  
            @media screen and (min-width: 601px) and (max-width: 759px){
                .container{/*for tablets*/
                    display: grid;
                    grid-template-columns: repeat(7, 1fr);
                    grid-auto-rows: minmax(1vw, auto);
                    margin: 0 auto;
                    grid-template-areas: 
                                        "h  h  h  h  h  h  h"
                                        "ht ht ht ht ht ht ht"
                                        "m  m  m  m  m  m  m"
                                        "c  c  c  c  c  c  c"
                                        "c  c  c  c  c  c  c"
                                        "c  c  c  c  c  c  c"
                                        "fi fi fi fi fi fi fi";
                }
                .heading{
                    border-top-right-radius: 1vw;
                }
                .heading-title{
                    border-bottom-right-radius: 1vw;
                }
                .heading-image{
                    display: none;
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
                    <h1>Αρχική</h1>
                </div>

            <div class="menu">
                <?php
                    if(!isset($_SESSION['username'])){
                        echo "<a href=\"login.php\">Σύνδεση χρήστη</a>";
                    }
                ?>
                <a href="more.php">Περισόττερα</a>
                <a href="reqs.php">Ελάχιστες απαιτήσεις</a>
                <?php
                    if(isset($_SESSION['username']) && $_SESSION['user_type'] == 'admin'){
                        echo "<a href=\"admin_settings.php\">Ρυθμίσεις Διαχειριστή</a>";
                    } else{
                        echo "<a href=\"app.php\">Αίτηση</a>";
                    }
                ?>
                
                <?php
                    if(isset($_SESSION['username'])){
                        echo "<a href=\"usr_prof.php\">Προφίλ χρήστη</a>";
                    }
                ?>
            </div>
            <div class="content">
                <p> 
                    Καλωσήρθατε στην ιστοσελίδα του Πανεπιστημίου Πελλοπονήσου που αφορά το πρόγραμμα Erasmus.<br>
                    Το Erasmus+ είναι το πρόγραμμα της ΕΕ για τη στήριξη της εκπαίδευσης, της κατάρτισης, της νεολαίας και του αθλητισμού στην Ευρώπη.
                    Ο προϋπολογισμός του εκτιμάται σε 26,2 δισ. ευρώ. Το ποσό αυτό είναι σχεδόν διπλάσιο της χρηματοδότησης που χορηγήθηκε στο προηγούμενο πρόγραμμα (2014-2020).
                    Το πρόγραμμα 2021-2027 δίνει ιδιαίτερη έμφαση στην κοινωνική ένταξη, στην πράσινη και στην ψηφιακή μετάβαση, καθώς και στην προώθηση της συμμετοχής των νέων στον δημοκρατικό βίο.
                    Στηρίζει προτεραιότητες και δραστηριότητες που καθορίζονται στον Ευρωπαϊκό Χώρο Εκπαίδευσης, στο σχέδιο δράσης για την ψηφιακή εκπαίδευση και στο ευρωπαϊκό θεματολόγιο δεξιοτήτων.
                     Το πρόγραμμα
                    <ul>
                        <li>στηρίζει επίσης τον ευρωπαϊκό πυλώνα κοινωνικών δικαιωμάτων</li>
                        <li>υλοποιεί τη στρατηγική της ΕΕ για τη νεολαία 2019-2027</li>
                        <li>αναπτύσσει την ευρωπαϊκή διάσταση στον αθλητισμό</li>
                    </ul>
                </p>
            </div>
            <div class="footer-image">
                <img src="media/images/erasmus.png" alt="Erasmus picture" width="186" height="57">
            </div>
        </div>
    </body>
</html>
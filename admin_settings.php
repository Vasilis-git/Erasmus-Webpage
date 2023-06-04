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
        uni{
            grid-area: u;
        }
        applications{
            grid-area: ap;
        }
        application_date{
            grid-area: ad;
        }
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
                        ".  .  .  ad ad .  .  ."
                        ".  .  .  ap ap .  .  ."
                        ".  .  .  u  u  .  .  ."
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
                                    "ad"
                                    "ap"
                                    "u";
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
                <a href="more.php">Περισόττερα</a>
                <!--διαφορετικές σελίδες για τις επιλογές με πρόσβαση απο το μενού εδώ;-->
            </div>

            <div class = "application_date content">
                <h1>Περίοδος αιτήσεων:</h1>
                <!-- Προσθήκη πεδίων ημερομηνίας εδώ, με κουμπί αποθήκευση, καθαρισμός
                    Μπορεί να είναι κενό, πρέπει να αποθηκεύεται μάλλον στη βάση σε δικό του
                    πίνακα, για να μπορώ να βρώ αν είναι περίοδος δηλώσεων στο app.php
                -->
            </div>

            <div class = "applications content">
                <h1>Αιτήσεις</h1>
                <!-- Εδώ οι αιτήσεις με όλα τα στοιχεία που ζητά η εκφώνηση σε μορφή πίνακα της html,
                    Η πρώτη γραμμή να είναι οι επιλογές για εμφάνιση των αιτήσεων με φθίνουσα σειρά μέσου όρου (ένα κουμπί πάνω απο τη στήλη 'μέσος όρος')
                    Πάνω απο τη στήλη ποσοστό περασμένων μαθημάτων, πεδίο κειμένο που δέχεται νούμερα απο 0-100, θα εμφανίζει μόνο τις αιτήσεις με το
                    συγκεκριμένο νούμερο
                    drop down list επιλογής πανεπιστημίου, που θα παίρνει τα πανεπιστήμια απο τη βάση δεδομένων, όπως στη φόρμα στο usr_application.php
                    όταν επιλεγέι θα εμφανίζονται μόνο οι αιτήσεις που το περιλαμβάνουν
                    η 1η στήλη του πίνακα: ένα checkbox σε κάθε γραμμή, για επιλογή αιτήσεων.
                    κάτω κάτω κουμπί "δεκτές", για να θέτει τις επιλεγμένες αιτήσεις δεκτές
                -->
            </div>

            <div class = "applications content">
                <h1>Δεκτές Αιτήσεις</h1>
                <!-- Κουμπί "εμφάνιση δεκτών αιτήσεων", να τις τυπώνει όπως πάνω αλλά χωρίς δυνατότητα επεξεργασίας
                    κάτω κάτω κουμπί 'ανακοίνωση των αποτελεσμάτων', θα μεταφέρει τις δεκτές στο more.php
                -->
            </div>

            <div class = "uni content">
                <h1>Συνεργαζόμενα πανεπιστήμια</h1>
                <!-- κουμπί "συνεργαζόμενα πανεπιστήμια", τα εμφανίζει παίρνωντας τα απ΄τη βάση δεδομένων
                    κουμπία προσθήκης και αφαίρεσης πανεπιστημίου
                -->
            </div>

            <div class="admin content">
                <!-- κουμπί 'Διαχειριστές', θα προβάλει όλους τους διαχειριστές τις σελίδας και θα έχει κουμπί προσθήκη
                μετά φόρμα παρόμοια με το sign_up, αλλά με αριθμό μητρώου 2022999999999 και δημιουργία τυχαίου κωδικού 10 χαρακτήρων    
            -->
            </div>

        </div>
    </body>
</html>
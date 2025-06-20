<!DOCTYPE html>

<html style="background-color: rgb(173, 173, 173);">
    <head>
        <meta charset="UTF-8">
        <title> Erasmus UoP</title>
        <link rel="stylesheet" href="styles/stylefile.css"/>
        <style>
            table{
                width:100%;
                border: 1px solid gray;
                border-collapse: collapse;
                float: left;
                align-items: center;
                justify-content: center;
            }
            tr:nth-child(even) {
                border-bottom: 1px solid gray;
            }
            th, td {
                padding: 1px;
                text-align: center;
                border: 1px solid gray;
                vertical-align: middle;
            }
            a, input[type="button"] {
                margin-bottom: 0vw;
            }
            video{
                border-radius: 1vw;
                margin-left: 1vw;
                margin-top: 1vw;
            }
            audio{
                margin-top: 2vw;
            }
            .application{
                grid-area: a;
            }
            @media screen and (min-width: 760px) {/*for desktop*/
                .container{
                        display: grid;
                        grid-template-columns: repeat(8, 1fr);
                        grid-auto-rows: minmax(1vw, auto);
                        margin: 0 auto;
                        grid-template-areas: 
                                            "h  h  h  h  h  h  h  hi"
                                            "ht ht ht ht ht ht ht hi"
                                            "m  m  m  m  m  m  di di"
                                            "c  c  c  c  c  rv rv rv"
                                            "bc bc bc bc bc rv rv rv"
                                            "cu cu cu cu cu rv rv rv"
                                            "a  a  a  a  a  rv rv rv"
                                            "a  a  a  a  a  .  .  ."
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
                                    "bc"
                                    "cu"
                                    "a";
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
                .decor-image{
                   display: none;
                }
                .related-content{
                    display: none;
                }
            }  
            @media screen and (min-width: 601px) and (max-width: 759px){
                .container{/*for tablets*/
                    display: grid;
                    grid-template-columns: repeat(8, 1fr);
                    grid-auto-rows: minmax(1vw, auto);
                    margin: 0 auto;
                    grid-template-areas: 
                                        "h  h  h  h  h  h  h  h"
                                        "ht ht ht ht ht ht ht ht"
                                        "m  m  m  m  m  m  m  m"
                                        "c  c  c  c  bc bc bc bc"
                                        "cu cu cu cu cu cu cu cu"
                                        "a  a  a  a  a  a  a  a"
                                        "a  a  a  a  a  a  a  a"
                                        "rv rv rv rv rv rv rv rv"
                                        "rv rv rv rv rv rv rv rv"
                                        "di di di di di di di di"
                                       ;
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
                .footer-image{
                    display: none;
                }
                .decor-image{
                    margin:auto;
                    margin-bottom: 5vw;
                }
                video{
                    margin-top: 1vw;
                }
            }
            .related-content{
                margin-left:6vw;
                font-family: Arial, Helvetica, sans-serif;
                grid-area: rv;
            }
            .below{
                grid-area: bc;
            }
            .coop-unis{
                grid-area: cu;
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
                    <h1>Περρισότερα σχετικά με το Erasmus</h1> 
                </div>
                <div class="menu">
                    <a href="index.php">Αρχική</a>
                    <a href="reqs.php">Ελάχιστες απαιτήσεις</a>
                </div>
                <div class="decor-image">
                    <img src="media/images/eramsus-logo.png" width="293" height="60">
                </div>

            <div class="content">
                <h1>Ευκαιρίες</h1>
                        Το Erasmus+ προσφέρει ευκαιρίες κινητικότητας και συνεργασίας όσον αφορά τα εξής:
                        <ul>
                        <li>Το Erasmus+ προσφέρει ευκαιρίες κινητικότητας και συνεργασίας όσον αφορά τα εξής:</li>
                        <li>επαγγελματική εκπαίδευση και κατάρτιση</li>
                        <li>σχολική εκπαίδευση (συμπεριλαμβανομένης της προσχολικής αγωγής και μέριμνας)</li>
                        <li>εκπαίδευση ενηλίκων</li>
                        <li>νεολαία και </li>
                        <li>αθλητισμός</li>
                    </ul>
                    Λεπτομέρειες πληροφορίες γι’ αυτές τις δυνατότητες, συμπεριλαμβανομένων των κριτηρίων επιλεξιμότητας,
                    περιέχονται στον παρακάτω σύνδεσμο:<br>
                    <a href="https://erasmus-plus.ec.europa.eu/el/programme-guide/erasmus-programme-guide?">Λεπτομέρειες</a>
            </div>

            <div class="coop-unis content">
                <h1>Συνεργαζόμενα πανεπιστήμια:</h1>
                <a href="https://umich.edu/">University of Michigan</a>
                <a href="https://www.harvard.edu/">Harvard University</a>    
                <a href="https://www.mit.edu/education">M.I.T.</a>
                <a href="https://www.ox.ac.uk">Oxford University</a>
                <a href="https://www.cam.ac.uk">Cambridge University</a>
                <a href="https://www.stanford.edu">Stanford University</a>
            </div>

            <div class="below content">
                <h1>Αποτελέσματα</h1>
                Τα αποτελέσματα του Erasmus+ είναι διαθέσιμα σε εκθέσεις και συλλογές στατιστικών, 
                καθώς και μέσω της πλατφόρμας σχεδίων Erasmus+.Περιλαμβάνονται οι περισσότερες από τις πρωτοβουλίες που χρηματοδοτούνται από το πρόγραμμα, 
                καθώς και ορισμένες ορθές πρακτικές και επιτυχημένα παραδείγματα.<br>
                <a href="http://ec.europa.eu/programmes/erasmus-plus/projects/">Πλατφόρμα</a>
            </div>
            
            <div class="related-content">
                <h1>Σχετικά βίντεο</h1>
                <a href="https://www.youtube.com/watch?v=JOXPm1N5wAQ" ><img src="https://i.ytimg.com/vi/JOXPm1N5wAQ/hq720.jpg?sqp=-oaymwEcCOgCEMoBSFXyq4qpAw4IARUAAIhCGAFwAcABBg==&rs=AOn4CLCfmXqpen5P4Hcb8OeSqKZ6EqhErw" width="320" height="180"></a>
                <a href="https://www.youtube.com/watch?v=9Da3KcbwfDc"><img src="https://i.ytimg.com/vi/9Da3KcbwfDc/maxresdefault.jpg" width="320" height="180"></a>
                <a href="https://www.youtube.com/watch?v=odV2I68MfoI"><img src="https://i.ytimg.com/vi/odV2I68MfoI/hqdefault.jpg?sqp=-oaymwEcCNACELwBSFXyq4qpAw4IARUAAIhCGAFwAcABBg==&rs=AOn4CLCU3qhLdBnnD1Uuy31MtcgNF-qdAA" width="320" height="180"></a>       
                <video width="180" height="320" controls>
                    <source src="media/videos/The_EU's_Erasmus_Programme_Explained.mp4" type="video/mp4">
                </video> 
                <audio controls>
                    <source src="media/audio/song.mp3" type="audio/mp3">
                </audio>
                            
                <div class="footer-image">
                    <img src="media/images/erasmus.png" alt="Erasmus picture" width="186" height="57">
                </div>
            </div>

            <?php
                $con = mysqli_connect("localhost", "root", "", "erasmus_db") or die('connection problem');
                $result = mysqli_fetch_assoc(mysqli_query($con, "SELECT announce FROM applications_date"));
                $announce = $result["announce"];
                echo '<div class="application content">';
                echo '<h1 style="margin-bottom:5px;">Στοιχεία χρηστών δεκτών αιτήσεων προγράμματος</h1>';
                if($announce){
                    echo '<table>
                    <tr>
                        <th>Όνομα</th>
                        <th>Επίθετο</th>
                        <th>ΑΜ</th>
                    </tr>
                    ';
                    $result = mysqli_query($con, "SELECT users.fname,users.lname,users.a_m FROM users,usr_aplications WHERE users.a_m=usr_aplications.a_m AND approved=true");
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<tr><td>'.$row["fname"].'</td>';
                        echo '<td>'.$row["lname"].'</td>';
                        echo '<td>'.$row["a_m"].'</td></tr>';
                    }
                }
                else{
                    echo '<p>Δεν υπάρχουν διαθέσιμα δεδομένα αυτή τη στιγμή.</p>';
                }
                echo '</div>';
                mysqli_close($con);
            ?>  
            
        </div>
    </body>
</html>
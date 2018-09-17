<!DOCTYPE html>
<?php
//array with question and answers
    $niz = array(
            array("pitanje" => "Koji od navedenih slikara je ziveo u 20 veka?", 
                  "odgovor" => "Marko Celebonovic",
                  "predlozi" => array("Vincent van Gogh", "Leonardo da Vinci", "Marko Celebonovic", "Eduar Mane")),
            array("pitanje" => "Izbacite uljeza",
                  "odgovor" => "Bubamara", 
                  "predlozi" => array("Bubamara", "Lav", "Tigar", "Leopard")),
            array("pitanje" => "Pobednik svetskog prvenstva u fudbalu u Rusiji 2018 je reprezentacija:", 
                  "odgovor" => "Francuska", 
                  "predlozi" => array("Engleska", "Francuska", "Belgija", "Hrvatska")),
            array("pitanje" => "Najvisi vodopad na svetu je: ", 
                  "odgovor" => "Andjelov vodopad", 
                  "predlozi" => array("Andjelov vodopad", "Nijagarini vodopadi", "Viktorijini vodopadi", "Igazu vodopadi")),
            array("pitanje" => "Gde su pocele da se koriste prve papirne novcanice? ", 
                  "odgovor" => "Kina", 
                  "predlozi" => array("Indija", "Egipat", "Kina", "Mesopotamija"))
            );

    $brojPitanja = sizeof($niz);
    
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Quiz</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
    </head>
    <body>
        <div class="container">
            <div class="row">
                <img style="width: 80%;height: 300px" src="quiz_1.jpg" alt="slika">
            </div>
            <div class="row">
                <div class="offset-sm-2 col-sm-8">
        <?php
        if (!isset($_POST['broj'])) {
            ?>    
                  
            <form method="POST" action="index.php">
                <input type="hidden" name="broj" id="broj" value="0"/>
                <div class="btn btn-default"><input type="submit" value="Zapocni kviz"/></div>
            </form>
           
        <?php
        } else if ($_POST['broj'] < $brojPitanja) {
            ?>   
                    </div>
            </div>  
            <div class="offset-sm-1 col-sm-8">
            <form method="POST" action="index.php">
                <?php
                $rbPitanja = $_POST['broj'];
                echo "<table class='table table-striped table-bordered'>";
//                    echo '<thead><tr><td>Pitanje broj ' . ($rbPitanja + 1) . '</td></tr>';
                    echo '<thead><td><b>' . $niz[$rbPitanja]['pitanje'] . '</b></td></thead>';
                    $brPonudjenihOdgovora = sizeof($niz[$rbPitanja]['predlozi']);
                    echo '<tbody>';
                    for ($i = 0; $i < $brPonudjenihOdgovora; $i++) {
                        $vr = $niz[$rbPitanja]['predlozi'][$i];
                        echo "<tr><td><input type='radio' name='odgovor' value='$vr' id='odgovor$i'>";
                        echo "<label for='odgovor$i'>$vr</label></td></tr>";
                    }
                    $slPitanje = $rbPitanja + 1;
                echo "</tbody></table>";
                ?>
                <br/>
                <input type="hidden" name="broj" id="broj" value="<?php echo $slPitanje; ?>"/>
                <input type="submit" value="Sledece pitajne"/> 
            
            </form>

            <?php
            if ($rbPitanja > 0) {
                echo '<br/><br/><br/>';
                if(isset($_POST['odgovor'])){
                    if (strcasecmp($_POST['odgovor'], $niz[$rbPitanja - 1]['odgovor']) == 0) {
                        echo "Odgovor na prethodno pitanje je <b>TACAN</b>";
                    } else {
                        echo "Odgovor na prethodno pitanje je <b>NETACAN</b>";
                    }
                }else{
                    echo "Niste dali odgovor na prethodno pitanje";
                }
            }
        } else {
            $rbPitanja = $_POST['broj'];
            if ($rbPitanja > 0) {
                echo '<br/><br/><br/>';
                if(isset($_POST['odgovor'])){
                    if (strcasecmp($_POST['odgovor'], $niz[$rbPitanja - 1]['odgovor']) == 0) {
                        echo "Odgovor na prethodno pitanje je <b>TACAN</b>";
                    } else {
                        echo "Odgovor na prethodno pitanje je <b>NETACAN</b>";
                    }
                }else{
                    echo "Niste dali odgovor na prethodno pitanje";
                }
            }
            ?>  
        
        
        
                <br/><br/><br/><h1>Kraj kviza</h1><br>
                <form method="POST" action="index.php">
                    <!--<input type="hidden" name="broj" id="broj" value="0"/>-->
                    <input type="submit" value="Vrati se na pocetak">
                </form>
                <?php
            }
            ?>
                
               </div> 
            </div>    
                
                
                
                
                
                
                
                <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
                
    </body>
</html>

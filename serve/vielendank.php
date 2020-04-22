<?php
if(!isset($_POST["gender"]) || 
    !isset($_POST["fname"]) ||
    !isset($_POST["lname"]) ||
    !isset($_POST["plz"]) ||
    !isset($_POST["place"]) ||
    !isset($_POST["street"]) ||
    !isset($_POST["country"])){

    header('Location: /');
    exit;
}


$xml = simplexml_load_file("../../source/data/orders.xml");

$msg = $xml->addChild("order");

$msg->addChild("gender", $_POST["gender"]);
$msg->addChild("fname", $_POST["fname"]);
$msg->addChild("lname", $_POST["lname"]);
$msg->addChild("plz", $_POST["plz"]);
$msg->addChild("place", $_POST["place"]);
$msg->addChild("street", $_POST["street"]);
$msg->addChild("country", $_POST["country"]);
$xml->asXML("../../source/data/orders.xml");

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="/favicon.png">
        <style>
            body {
                font-family: Arial, Helvetica, sans-serif;
                margin-top: 10em;
  				align-items: center;
                text-align: center;
				color:white;
            }
            button {
                background-color: green;
                border: none;
                border-radius: 2px;
            }
        </style>
    </head>

    <body bgcolor="#2E2E2E">
        <img src="haken.png" alt="bestaetigung" height="200px" width="200px">
        <h1><font size="7">Vielen dank f&uumlr Ihre Bestellung bei <br><strong>Wool Street</strong>!</font><h1>
        <br>
        <h4>Ihre Bestellung ist bei uns eingegangen und wird nun bearbeitet
            <br> und anschlie&szlig an die von Ihnen angegebene Adresse versandt. 
            <br>Sie werden Ihren Artikel in den n&aumlchsten 3 bis 4 Werktagen erhalten.</h4>
        <h4>Wir w&uumlnschen Ihnen viel Spa&szlig mit unserem Produkt!</h4>
        <br>
        <a href="/"><button>Zur&uumlck zur Startseite</button></a>
    </body>
</html>
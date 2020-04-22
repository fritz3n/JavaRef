<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Kontakt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/favicon.png">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/navbar.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/kontakt.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/footer.css">
</head>

<?php 

$submitted = false;
if(isset($_POST["name"]) && isset($_POST["subject"])){
    $submitted = true;

    $xml = simplexml_load_file("../../source/data/contact.xml");
    $msg = $xml->addChild("message");
    $msg->addChild("name", $_POST["name"]);
    $msg->addChild("msg", $_POST["subject"]);
    $msg->addChild("email", $_POST["email"]);
    
    $xml->asXML("../../source/data/contact.xml");
}
?>

<body>
    <div class="all">
        <?php include("../../source/navbar.php") ?>
        <div class="content">

            <?php if($submitted) echo '<div class="acknowledgement">Nachricht abgesendet!</div>'; ?>

            <div class="container">
                <form name="contact" action="kontakt.php" onsubmit="return validateForm()" method="post">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Ihr Name" required>

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Ihre Email-Adresse (Optional)">

                    <label for="subject">Nachricht</label>
                    <textarea id="subject" name="subject" placeholder="Was liegt ihnen am Herzen?" style="height:200px" required></textarea>

                    <input type="submit" value="Abschicken">
                </form>
            </div>
        </div>
    </div>
    <?php include("../../source/footer.html") ?>
</body>
<script src="/js/navbar.js"></script>

</html>
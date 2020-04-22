<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Adresse</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="/favicon.png">
        <link rel="stylesheet" type="text/css" media="screen" href="/css/navbar.css">
        <link rel="stylesheet" type="text/css" media="screen" href="/css/address.css">
        <link rel="stylesheet" type="text/css" media="screen" href="/css/footer.css">
    </head>
    <body>
		<div class="all">
        <?php include("../source/navbar.php") ?>
        <div class="content">
		<p><strong>Bitte geben Sie ihre Adressdaten an.</strong><br><br>
			Nachdem Sie ihre Adressdaten eingegeben haben, <br>dr&uumlcken Sie bitte auf den "Absenden"- Knopf. <br>
			Ihre Bestellung wird anschlie&szligend an die <br>von Ihnen eingegebene Adresse versandt.
		</p>
		<form action="/vielendank.html" method="post">		
			<label for="herr">Herr </label>
			<input type="radio" name="gender" id="herr" value="male" required> 
			<br>           
	        <label for="frau">Frau </label>
			<input type="radio" name="gender" id="frau" value="female" required>
	        <br>
	        <label for="divers">Divers </label>
			<input type="radio" name="gender" id="divers" value="other" required>
	        <br>
            <label for="Vorname">Vorname </label>
	        <input type="text" id="Vorname" name="fname" required>
	        <br>
	        <label for="Nachname">Nachname </label>
	        <input type="text" id="Nachname" name="lname" required>
	        <br> 
            <label for="plz">PLZ </label>
	        <input pattern="[0-9]{5}" title="Eine Zahlenkompination aus 5 Zahlen wird erfordert." type="text" id="plz" name="plz" required>
	        <br>
            <label for="ort">Ort </label>
	        <input type="text" id="ort" name="place" required>
	        <br>
            <label for="strasse">Stra&szlige </label>
	        <input type="text" id="strasse" name="street" required>
            <br>
            <label>Land
			    <select name="country" required>
					<option value="">------ Bitte auswählen ------</option>
				    <option>Albanien</option>
				    <option>Andorra</option>
				    <option>Belgien</option>
				    <option>Bosnien</option>
				    <option>Bulgarien</option>
                    <option>D&aumlnemark</option>
				    <option>Deutschland</option>
				    <option>Estland</option>
				    <option>Finnland</option>
				    <option>Frankreich</option>
                    <option>Griechenland</option>
				    <option>Irland</option>
				    <option>Island</option>
				    <option>Italien</option>
				    <option>Kasachstan</option>
                    <option>Kaufland</option>
                    <option>Kosovo</option>
				    <option>Kroatien</option>
				    <option>Lettland</option>
				    <option>Lichtenstein</option>
				    <option>Litauen</option>
                    <option>Luxemburg</option>
				    <option>Malta</option>
				    <option>Moldau</option>
				    <option>Monaco</option>
				    <option>Montenegro</option>
                    <option>Niederlande</option>
				    <option>Nordmazedonien</option>
				    <option>Norwegen</option>
				    <option>&Oumlsterreich</option>
				    <option>Polen</option>
                    <option>Portugal</option>
				    <option>Rum&aumlnien</option>
				    <option>Russland</option>
                    <option>Saarland</option>
                    <option>Sailach</option>
				    <option>San Marino</option>
				    <option>Schweden</option>
                    <option>Schweiz</option>
                    <option>Serbien</option>
				    <option>Slowakei</option>
				    <option>Slowenien</option>
				    <option>Spanien</option>
				    <option>Tschechien</option>
                    <option>T&uumlrkei</option>
				    <option>Ukraine</option>
                    <option>Ungarn</option>
                    <option>Vatikanstadt</option>
				    <option>Vereinigtes K&oumlnigreich</option>
				    <option>Wei&szligrussland</option>
			    </select>
		    </label>
			<br>
			<br>
			<br>
			<input type="submit" value="Absenden">			        
		</form>
		
		</div>  
		</div>
        <?php include("../source/footer.html")?>
    </body>
    <script src="/js/navbar.js"></script>
</html>
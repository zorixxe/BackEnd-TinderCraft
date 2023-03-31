<?php include "../handy_methods.php" ?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DateCraft</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="./rapport.css">
    <link rel="stylesheet" href="../options.css">
    <script src="../options.js" defer></script>
</head>

<body>

    <?php include "../options.php" ?>

    <div id="container">
        <div id="rapportChoice">
            <button class="rapportButton"><a href="../RAPPORT/tildis.php">Robin</a></button>
            <button class="rapportButton"><a href="../RAPPORT/saile.php">Elias</a></button>
        </div>

        <h1>Databas struktur.</h1>
        <img src='../media/dbsetup.png'>

        <p>
            Databas uppkoppling i en php fil "handy_methods.php" som inkluderas på varje sida. <br><br>
            $dbname, $username och $password är variabler som deklareras i en skild fil "hemlis.php". Deklarera egna databas 
            credentials där för att koppla upp till den.
        </p>

        <img src='../media/databasestructure.png'>

        <h3 class="rapportHeader">Profiles</h2>
        <p>
            Det börja med våra basic 10st rader i vår första table som heter "profiles". <br><br>

            Dessa rader består av: <br><br>

            id, för att kunna bättre hålla koll så får varje användare ett eget id. Dessa auto inkrementeras men används bara i kommentarsyfte. <br><br>

            username, Det användaren själv vill ha som sitt användarnamn. Username är understreckat eftersom dom är unika och används för att identifiera användare.
            När man registrerar sig checkas det ifall det finns en user med den usernamen. ID användas inte i början som
            identifier eftersom vi inte kunde använda oss av inner joins då, dock används de för comments tabellen. Bara användaren själv ser sitt eget username. <br><br>

            password, Deras lösen som hashas så att inte ens vi vet vad lösenordet är och om vår data kommer ut så kan ingen se deras lösenord.<br><br>

            realName, användarens riktiga namn som syns åt alla andra användare.<br><br>

            email, användarens email adress. <br><br>

            zipcode, Var användaren bor. <br><br>

            bio, Här kan användaren skriva vad dom vill. <br><br>

            salary, deras årslön. <br><br>


            preference, Senare ändrat till "gender" i kod syfte för sortering. 
            det började som att man bara satt in en siffra men vi insåg att det är mer logiskt att användaren sätter in sitt kön och sen kan völja vad hen vill sortera efter. <br><br>

            likes, ett tal så vi kan hålla koll på hur många "likes" sagda användare har.

            picture, användarens profilbild sparad som mediumblob på databasen. OBS!! på bilden står det bara blob. <br><br>
        </p>

        <h3 class="rapportHeader">Comments</h2>
        <p>
            Den andra tabellen vi har i databasen är "comments". <br><br>
            Den består av kolumerna: <br><br>
            id, unikt id för varje kommentar. Används inte på sidan men nödvändigt i databasen. <br><br>
            sender, receiver, sender ID för den som skickar kommentaren och receiver är ID för den som får kommentaren. ID tas från "profiles".
            När kommentarerna printas ut så tas username från "profiles" med hjälp av ID.<br><br>
            message, kommentaren själv. <br><br>
            date, datumet för när kommentaren skickades. Automatiskt via databasen alltså följer dess klocka. <br><br>
        </p>

    </div>
</body>

</html>
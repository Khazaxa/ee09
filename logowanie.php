<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Forum o psach</title>
</head>
<body>
    
    <div id="baner">
        <h1>Forum wielbicieli psów</h1>
    </div>
    <div id="lewy">
        <img src="obraz.jpg" alt="foksterier">
    </div>
    <div id="prawy1">
        <h2>Zapisz się</h2>
        

        <form action="logowanie.php" method="POST">
            login: <input type="text"  name='login'></input><br>
            hasło: <input type="password"  name='haslo'></input><br>
            powtórz hasło: <input type="password" name='haslopowt'></input><br>
            <input type="submit" value="zapisz"></input>
        </form>

        <?php
        //tu skrypt 1 php
        
    $conn = mysqli_connect('localhost', 'root', '', 'psy');

    if(empty($_POST['login']) || empty($_POST['haslo']) || empty($_POST['haslopowt']))
    {
        echo "<p>Wypełnij wszystkie pola</p>";
    }
    else
    {
        $login = $_POST['login'];
        $haslo = $_POST['haslo'];
        $haslop = $_POST['haslopowt'];
        $query = "SELECT login FROm uzytkownicy WHERE login LIKE ('$login');";
        $res = mysqli_query($conn, $query);
        $ile = mysqli_num_rows($res);

        if($ile > 0 ) {
            echo "<p>login wystepuje w bazie danych, konto nie zostało dodane</p>";
        }
        else if ($haslo !== $haslop)
        {
            echo "<p>hasła nie są takie same, konto nie zostało dodane</p>";
        }
        else {
            $hasloSH = sha1($haslo);
            $q2 = "INSERT INTO `uzytkownicy` (`id`, `login`, `haslo`) VALUES (NULL, '$login', '$hasloSH'); ";

            $res2 = mysqli_query($conn, $q2);

            if($res2){
                echo "<p> Konto zostało dodane </p>";
            }
            
        }
    }


    mysqli_close($conn);
    
        ?>


    </div>
    <div id="prawy2">
        <h2>Zapraszamy wszystkich</h2>
        <ol>
            <li>właścicieli psów</li>
            <li>weterynarzy</li>
            <li>tych, co chcą kupić psa</li>
            <li>tych, co lubią psy</li>
        </ol>
        <a href="regulamin.html" target="_blank">Przeczytaj regulamin forum</a>
    </div>
    <div id="stopka">
        Stronę wykonał: 0000000000000
    </div>



</body>
</html>

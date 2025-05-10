<?php
    $sql = "SELECT id_klient, .imie, nazwisko, numer_telefonu FROM rest_klienci";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Lp</th><th>Imię</th><th>Nazwisko</th><th>Telefon</th></tr>";
        $lp = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $lp++ . "</td><td>" .
                            htmlspecialchars($row["imie"]) . "</td><td>" . 
                            htmlspecialchars($row["nazwisko"]) . "</td><td>" . 
                            htmlspecialchars($row["numer_telefonu"]) . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<h1>PHP nie zadziałał poprawnie :/</h1>";
    }
?>
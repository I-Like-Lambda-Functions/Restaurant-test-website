<?php
    $sql = "SELECT kategoria, SUM(z.ilosc) AS liczba_pozycji
            FROM rest_zamowienia z
            JOIN rest_menu m ON z.id_pozycja = m.id_pozycja
            GROUP BY m.kategoria
            ORDER BY m.kategoria";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Lp</th><th>Kategoria</th><th>Liczba zamówień</th></tr>";
        $lp = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $lp++ . "</td><td>" .
                htmlspecialchars($row["kategoria"]) . "</td><td>" .
                htmlspecialchars($row["liczba_pozycji"]) . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<h1>PHP nie zadziałał poprawnie :/</h1>";
    }
?>
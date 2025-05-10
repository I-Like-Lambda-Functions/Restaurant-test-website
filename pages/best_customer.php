<?php
    $sql = "SELECT k.imie, k.nazwisko,
            SUM(z.ilosc * m.cena) AS suma_wartosci_zamowien
            FROM rest_zamowienia z
            JOIN rest_klienci k ON z.id_klient = k.id_klient
            JOIN rest_menu m ON z.id_pozycja = m.id_pozycja
            GROUP BY k.id_klient
            ORDER BY suma_wartosci_zamowien DESC LIMIT 1";
    $result = $conn->query($sql);
    
    if ($result && $result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Lp</th><th>Imię</th><th>Nazwisko</th><th>Kwota</th></tr>";
        $lp = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $lp++ . "</td><td>" .
                htmlspecialchars($row["imie"]) . "</td><td>" .
                htmlspecialchars($row["nazwisko"]) . "</td><td>" .
                number_format($row["suma_wartosci_zamowien"], 2) . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<h1>PHP nie zadziałał poprawnie :/</h1>";
    } 
?>
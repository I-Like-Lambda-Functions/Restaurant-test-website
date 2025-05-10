<?php
    $sql = "SELECT k.imie, k.nazwisko, z.data_zamowienia, m.nazwa_pozycji, z.ilosc, m.cena,
            (z.ilosc * m.cena) AS cena_zamowienia
            FROM rest_zamowienia z
            JOIN rest_klienci k ON z.id_klient = k.id_klient
            JOIN rest_menu m ON z.id_pozycja = m.id_pozycja
            ORDER BY k.imie";
    $result = $conn->query($sql);
    
    if ($result && $result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Lp</th><th>Imię</th><th>Nazwisko</th><th>Data zamówienia</th><th>Nazwa</th><th>Ilość</th><th>Cena jednego dania</th><th>Pełna cena zamównienia</th></tr>";
        $lp = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $lp++ . "</td><td>" .
                htmlspecialchars($row["imie"]) . "</td><td>" .
                htmlspecialchars($row["nazwisko"]) . "</td><td>" .
                htmlspecialchars($row["data_zamowienia"]) . "</td><td>" .
                htmlspecialchars($row["nazwa_pozycji"]) . "</td><td>" .
                htmlspecialchars($row["ilosc"]) . "</td><td>" .
                number_format($row["cena"], 2) . "</td><td>" .
                number_format($row["cena_zamowienia"], 2) . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<h1>PHP nie zadziałał poprawnie :/</h1>";
    }
?>
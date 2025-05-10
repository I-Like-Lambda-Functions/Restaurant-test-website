<?php
    $sql = "SELECT rest_menu.id_pozycja, rest_menu.nazwa_pozycji, rest_menu.cena, rest_menu.kategoria FROM rest_menu";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Lp</th><th>Nazwa</th><th>Cena</th><th>Kategoria</th></tr>";
        $lp = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $lp++ . "</td><td>" .
                htmlspecialchars($row["nazwa_pozycji"]) . "</td><td>" . 
                htmlspecialchars($row["cena"]) . "</td><td>" . 
                htmlspecialchars($row["kategoria"]) . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<h1>PHP nie zadziałał poprawnie :/</h1>";
    }
?>
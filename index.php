<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=JetBrains%20Mono' rel='stylesheet'>
    <link href="style.css" rel="stylesheet">
    <title>Strona Restauracji</title>
</head>
<body>
    <nav>
        <aside class="left">
            <ul>
                <li><a href="?page=home">Strona Główna</a></li>
                <li><a href="?page=menu">Menu</a></li>
                <li><a href="?page=customers">Klienci</a></li>
                <li><a href="?page=orders">Zamówienia</a></li>
                <li><a href="?page=orders_by_type_of_dish">Zestawienie zamówień według kategorii</a></li>
                <li><a href="?page=best_customer">Najlepszy klient</a></li>
            </ul>
        </aside>
    </nav>
    <main>
        <section class="right">
            <?php
            include "config.php";
            
            $conn = new mysqli($host, $user, $password, $dbname);
            
            if ($conn->connect_error) {
                error_log("Database connection error: " . $conn->connect_error);
                die("Błąd połączenia: Proszę spróbować ponownie później.");
            }

            $allowed_pages = ["home", "menu", "customers", "orders", "orders_by_type_of_dish", "best_customer"];
            $page = isset($_GET['page']) ? $_GET['page'] : 'home';

            if (in_array($page, $allowed_pages)) {
                include "pages/$page.php";
            } else {
                echo "<h1>Nie znaleziono strony :/</h1>";
            }

            $conn->close();
            ?>
        </section>
    </main>
    <footer>
        Copyright &copy; 2025 Gall Anonim.
    </footer>
</body>
</html>

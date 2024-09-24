<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sprawdzenie Płci Użytkownika</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Sprawdzenie Płci Użytkownika</h1><br>
    
    <form method="GET">
        <label for="name">Imię:</label>
        <input type="text" name="name" id="name" 
            value="<?php echo isset($_GET['name']) ? htmlspecialchars($_GET['name']) : ''; ?>" 
            required><br><br>

        <button type="submit">Sprawdź</button><br><br>

        <label for="result">Wynik:</label>
        <input type="text" id="result" name="result" 
            value="<?php echo checkGender(); ?>" readonly><br><br>
    </form>
</body>
</html>

<?php
function checkGender() {
    if (isset($_GET['name'])) {
        $name = trim($_GET['name']);

        if (strlen($name) > 0) {
            $lastChar = mb_substr($name, -1);

            if ($lastChar === 'a') {
                return "Dziewczyna";
            } else {
                return "Chłopak";
            }
        }
    }
    return '';
}
?>
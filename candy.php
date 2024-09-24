<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urodzinowe Słodkości</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Urodzinowe Słodkości</h1><br>

    <form method="GET">
        <label for="candy_count">Liczba cukierków:</label>
        <input type="number" name="candy_count" id="candy_count" 
            value="<?php echo isset($_GET['candy_count']) ? htmlspecialchars($_GET['candy_count']) : ''; ?>" 
            required><br><br>

        <label for="people_count">Liczba osób w klasie:</label>
        <input type="number" name="people_count" id="people_count" 
            value="<?php echo isset($_GET['people_count']) ? htmlspecialchars($_GET['people_count']) : ''; ?>" 
            required><br><br>

        <button type="submit">Podziel cukierki</button><br><br>

        <label for="result">Wynik:</label>
        <input type="text" id="result" name="result" 
            value="<?php echo divideCandies(); ?>" readonly><br><br>
    </form>
</body>
</html>

<?php
function divideCandies() {
    if (isset($_GET['candy_count']) && isset($_GET['people_count'])) {
        $candyCount = (int)$_GET['candy_count'];
        $peopleCount = (int)$_GET['people_count'];

        if ($peopleCount == 0) {
            return 'Nie można dzielić przez 0!';
        }

        $candiesPerPerson = intdiv($candyCount, $peopleCount);
        $leftoverCandies = $candyCount % $peopleCount;

        return "Każdy dostanie po " . $candiesPerPerson . " cukierków. Zostanie " . $leftoverCandies . " cukierków.";
    }
    return '';
}
?>
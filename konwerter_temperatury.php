<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konwerter Temperatury</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Konwerter Temperatury</h1><br>
    
    <form method="GET">
        <label for="temperature">Temperatura:</label>
        <input type="number" name="temperature" id="temperature" 
            value="<?php echo isset($_GET['temperature']) ? htmlspecialchars($_GET['temperature']) : ''; ?>" 
            required><br><br>

        <label for="unit">Jednostka:</label>
        <select name="unit" id="unit" required>
            <option value="C" <?php echo isset($_GET['unit']) && $_GET['unit'] == 'C' ? 'selected' : ''; ?>>Celsjusz (C)</option>
            <option value="F" <?php echo isset($_GET['unit']) && $_GET['unit'] == 'F' ? 'selected' : ''; ?>>Fahrenheit (F)</option>
            <option value="K" <?php echo isset($_GET['unit']) && $_GET['unit'] == 'K' ? 'selected' : ''; ?>>Kelvin (K)</option>
        </select><br><br>

        <button type="submit">Przelicz</button><br><br>

        <label for="result">Wynik:</label>
        <input type="text" id="result" name="result" 
            value="<?php echo convertTemperature(); ?>" readonly><br><br>
    </form>
</body>
</html>

<?php
function convertTemperature() {
    if (isset($_GET['temperature']) && isset($_GET['unit'])) {
        $temperature = (float)$_GET['temperature'];
        $unit = $_GET['unit'];

        switch ($unit) {
            case 'C':
                $fahrenheit = ($temperature * 9/5) + 32;
                $kelvin = $temperature + 273.15;
                return "Fahrenheit: " . round($fahrenheit, 2) . "°F, Kelvin: " . round($kelvin, 2) . "K";
            case 'F':
                $celsius = ($temperature - 32) * 5/9;
                $kelvin = $celsius + 273.15;
                return "Celsjusz: " . round($celsius, 2) . "°C, Kelvin: " . round($kelvin, 2) . "K";
            case 'K':
                $celsius = $temperature - 273.15;
                $fahrenheit = ($celsius * 9/5) + 32;
                return "Celsjusz: " . round($celsius, 2) . "°C, Fahrenheit: " . round($fahrenheit, 2) . "°F";
        }
    }
    return '';
}
?>
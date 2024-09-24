<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Kosztu Podróży</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Kalkulator Kosztu Podróży</h1><br>

    <form method="GET">
        <label for="distance">Dystans (w kilometrach):</label>
        <input type="number" step="0.01" name="distance" id="distance" 
            value="<?php echo isset($_GET['distance']) ? htmlspecialchars($_GET['distance']) : ''; ?>" 
            required><br><br>

        <label for="fuel_consumption">Średnie spalanie (litrów na 100 km):</label>
        <input type="number" step="0.01" name="fuel_consumption" id="fuel_consumption" 
            value="<?php echo isset($_GET['fuel_consumption']) ? htmlspecialchars($_GET['fuel_consumption']) : ''; ?>" 
            required><br><br>

        <label for="fuel_price">Cena paliwa (za litr w zł):</label>
        <input type="number" step="0.01" name="fuel_price" id="fuel_price" 
            value="<?php echo isset($_GET['fuel_price']) ? htmlspecialchars($_GET['fuel_price']) : ''; ?>" 
            required><br><br>

        <button type="submit">Oblicz Koszt</button><br><br>

        <label for="result">Koszt podróży:</label>
        <input type="text" id="result" name="result" 
            value="<?php echo calculateTravelCost(); ?>" readonly><br><br>
    </form>
</body>
</html>

<?php
function calculateTravelCost() {
    if (isset($_GET['distance']) && isset($_GET['fuel_consumption']) && isset($_GET['fuel_price'])) {
        $distance = (float)$_GET['distance'];
        $fuelConsumption = (float)$_GET['fuel_consumption'];
        $fuelPrice = (float)$_GET['fuel_price'];
        $fuelNeeded = ($distance * $fuelConsumption) / 100;

        $cost = $fuelNeeded * $fuelPrice;

        return "Koszt podróży: " . round($cost, 2) . " zł";
    }
    return '';
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konwerter Jednostek Długości</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Konwerter Jednostek Długości</h1><br>
    
    <form method="GET">
        <label for="length">Długość:</label>
        <input type="number" step="0.01" name="length" id="length" 
            value="<?php echo isset($_GET['length']) ? htmlspecialchars($_GET['length']) : ''; ?>" 
            required><br><br>

        <label for="unit">Jednostka:</label>
        <select name="unit" id="unit" required>
            <option value="foot" <?php echo isset($_GET['unit']) && $_GET['unit'] == 'foot' ? 'selected' : ''; ?>>Stopy</option>
            <option value="yard" <?php echo isset($_GET['unit']) && $_GET['unit'] == 'yard' ? 'selected' : ''; ?>>Jardy</option>
            <option value="mile" <?php echo isset($_GET['unit']) && $_GET['unit'] == 'mile' ? 'selected' : ''; ?>>Mile lądowe</option>
            <option value="nautical_mile" <?php echo isset($_GET['unit']) && $_GET['unit'] == 'nautical_mile' ? 'selected' : ''; ?>>Mile morskie</option>
            <option value="inch" <?php echo isset($_GET['unit']) && $_GET['unit'] == 'inch' ? 'selected' : ''; ?>>Cale</option>
        </select><br><br>

        <button type="submit">Przelicz</button><br><br>

        <label for="result">Wynik:</label>
        <input type="text" id="result" name="result" 
            value="<?php echo convertLength(); ?>" readonly><br><br>
    </form>
</body>
</html>

<?php
function convertLength() {
    if (isset($_GET['length']) && isset($_GET['unit'])) {
        $length = (float)$_GET['length'];
        $unit = $_GET['unit'];

        switch ($unit) {
            case 'foot':
                $yards = $length / 3;
                $miles = $length / 5280;
                $nauticalMiles = $length / 6076.12;
                $inches = $length * 12;
                return "Jardy: " . round($yards, 2) . ", Mile lądowe: " . round($miles, 5) . 
                       ", Mile morskie: " . round($nauticalMiles, 5) . ", Cale: " . round($inches, 2);
            case 'yard':
                $feet = $length * 3;
                $miles = $length / 1760;
                $nauticalMiles = $length / 2025.37;
                $inches = $length * 36;
                return "Stopy: " . round($feet, 2) . ", Mile lądowe: " . round($miles, 5) . 
                       ", Mile morskie: " . round($nauticalMiles, 5) . ", Cale: " . round($inches, 2);
            case 'mile':
                $feet = $length * 5280;
                $yards = $length * 1760;
                $nauticalMiles = $length * 0.868976;
                $inches = $length * 63360;
                return "Stopy: " . round($feet, 2) . ", Jardy: " . round($yards, 2) . 
                       ", Mile morskie: " . round($nauticalMiles, 5) . ", Cale: " . round($inches, 2);
            case 'nautical_mile':
                $feet = $length * 6076.12;
                $yards = $length * 2025.37;
                $miles = $length * 1.15078;
                $inches = $length * 72913.4;
                return "Stopy: " . round($feet, 2) . ", Jardy: " . round($yards, 2) . 
                       ", Mile lądowe: " . round($miles, 5) . ", Cale: " . round($inches, 2);
            case 'inch':
                $feet = $length / 12;
                $yards = $length / 36;
                $miles = $length / 63360;
                $nauticalMiles = $length / 72913.4;
                return "Stopy: " . round($feet, 2) . ", Jardy: " . round($yards, 2) . 
                       ", Mile lądowe: " . round($miles, 5) . ", Mile morskie: " . round($nauticalMiles, 5);
        }
    }
    return '';
}
?>
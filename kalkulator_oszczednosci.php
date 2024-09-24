<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Oszczędności</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Kalkulator Oszczędności</h1><br>
    
    <form method="POST">
        <label for="initial_amount">Kwota początkowa:</label>
        <input type="number" name="initial_amount" id="initial_amount" value="<?php echo isset($_POST['initial_amount']) ? $_POST['initial_amount'] : ''; ?>" required><br><br>

        <label for="interest_rate">Roczna stopa procentowa (%):</label>
        <input type="number" name="interest_rate" id="interest_rate" value="<?php echo isset($_POST['interest_rate']) ? $_POST['interest_rate'] : ''; ?>" step="0.01" required><br><br>

        <label for="years">Liczba lat:</label>
        <input type="number" name="years" id="years" value="<?php echo isset($_POST['years']) ? $_POST['years'] : ''; ?>" required><br><br>

        <button type="submit">Oblicz</button>
        
        <br><br>

        <label for="result">Wartość końcowa:</label>
        <input type="text" id="result" name="result" value="<?php echo calculateSavings(); ?>" readonly><br><br>
    </form>
</body>
</html>

<?php
function calculateSavings() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $initial_amount = isset($_POST['initial_amount']) ? (float) $_POST['initial_amount'] : 0;
        $interest_rate = isset($_POST['interest_rate']) ? (float) $_POST['interest_rate'] : 0;
        $years = isset($_POST['years']) ? (int) $_POST['years'] : 0;

        $final_amount = $initial_amount * pow((1 + $interest_rate / 100), $years);
        return number_format($final_amount, 2, ',', ' ');
    }
    return '';
}
?>

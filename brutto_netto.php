<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Brutto / Netto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Kalkulator Brutto / Netto</h1><br>

    <form method="GET">
        <label for="amount">Kwota:</label>
        <input type="number" step="0.01" name="amount" id="amount" 
            value="<?php echo isset($_GET['amount']) ? htmlspecialchars($_GET['amount']) : ''; ?>" 
            required><br><br>

        <label for="type">Rodzaj kwoty:</label>
        <select name="type" id="type" required>
            <option value="netto" <?php echo isset($_GET['type']) && $_GET['type'] == 'netto' ? 'selected' : ''; ?>>Netto</option>
            <option value="brutto" <?php echo isset($_GET['type']) && $_GET['type'] == 'brutto' ? 'selected' : ''; ?>>Brutto</option>
        </select><br><br>

        <label for="vat_rate">Stawka VAT (%):</label>
        <input type="number" step="0.01" name="vat_rate" id="vat_rate" 
            value="<?php echo isset($_GET['vat_rate']) ? htmlspecialchars($_GET['vat_rate']) : ''; ?>" 
            required><br><br>

        <button type="submit">Oblicz</button><br><br>

        <label for="result">Wynik:</label>
        <input type="text" id="result" name="result" 
            value="<?php echo calculateVAT(); ?>" readonly><br><br>
    </form>
</body>
</html>

<?php
function calculateVAT() {
    if (isset($_GET['amount']) && isset($_GET['type']) && isset($_GET['vat_rate'])) {
        $amount = (float)$_GET['amount'];
        $type = $_GET['type'];
        $vatRate = (float)$_GET['vat_rate'] / 100;

        if ($type == 'netto') {
            $brutto = $amount * (1 + $vatRate);
            return "Kwota Brutto: " . round($brutto, 2) . " zł";
        } elseif ($type == 'brutto') {
            $netto = $amount / (1 + $vatRate);
            return "Kwota Netto: " . round($netto, 2) . " zł";
        }
    }
    return '';
}
?>
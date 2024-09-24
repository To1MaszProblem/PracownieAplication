<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Zwykły</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Kalkulator Zwykły</h1><br>
    
    <form method="POST">
        <label for="num1">Podaj pierwszą liczbę:</label>
        <input type="number" name="num1" id="num1" value="<?php echo isset($_POST['num1']) ? $_POST['num1'] : ''; ?>" required><br><br>

        <label for="num2">Podaj drugą liczbę:</label>
        <input type="number" name="num2" id="num2" value="<?php echo isset($_POST['num2']) ? $_POST['num2'] : ''; ?>" required><br><br>

        <div class="button-group">
            <button type="submit" name="operation" value="+">+</button>
            <button type="submit" name="operation" value="-">-</button>
            <button type="submit" name="operation" value="*">*</button>
            <button type="submit" name="operation" value="/">/</button>
        </div>
        
        <br>

        <label for="result">Wynik:</label>
        <input type="text" id="result" name="result" value="<?php echo oblicz(); ?>" readonly><br><br>
    </form>
</body>
</html>

<?php
function oblicz() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = isset($_POST['num1']) ? (float) $_POST['num1'] : 0;
        $num2 = isset($_POST['num2']) ? (float) $_POST['num2'] : 0;
        $operation = $_POST['operation'] ?? '';

        switch ($operation) {
            case '+':
                return $num1 + $num2;
            case '-':
                return $num1 - $num2;
            case '*':
                return $num1 * $num2;
            case '/':
                if ($num2 == 0) {
                    return "Nie można dzielić przez zero!";
                }
                return $num1 / $num2;
            default:
                return "Wybierz operację!";
        }
    }
    return '';
}
?>

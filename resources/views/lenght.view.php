<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lenght Converter</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <h1>Welcome to Lenght Converter Page</h1>
    <h1>
        <a href="/">Home</a>
        <a href="/lenght" style="color: blue;">Lenght</a>
        <a href="/weight">Weight</a>
        <a href="/temperature">Temperature</a>
    </h1>

    <form method="POST">
        <div>
            <p>Enter the length to convert</p>
            <input type="text" name='lenght' required>
        </div>
        <div>
            <p>Unit to convert from</p>
            <select name="from"  required>
                <option value="millimeter">millimeter</option>
                <option value="centimeter">centimeter</option>
                <option value="meter">meter</option>
                <option value="kilometer">kilometer</option>
                <option value="inch">inch</option>
                <option value="foot">foot</option>
                <option value="yard">yard</option>
                <option value="mile">mile</option>
            </select>
        </div>

        <div>
            <p>Unit to convert to</p>
            <select name="to" required>
                <option value="millimeter">millimeter</option>
                <option value="centimeter">centimeter</option>
                <option value="meter">meter</option>
                <option value="kilometer">kilometer</option>
                <option value="inch">inch</option>
                <option value="foot">foot</option>
                <option value="yard">yard</option>
                <option value="mile">mile</option>
            </select>
        </div>
        <br><br>
        <button type="submit">Convert</button>
    </form>
</body>

</html>


<?php
function convertLength($value, $fromUnit, $toUnit) {
    // Conversion factors to meters
    $conversionRates = [
        'millimeter' => 0.001,
        'centimeter' => 0.01,
        'meter' => 1,
        'kilometer' => 1000,
        'inch' => 0.0254,
        'foot' => 0.3048,
        'yard' => 0.9144,
        'mile' => 1609.34
    ];

    // Check if the provided units are valid
    if (!isset($conversionRates[$fromUnit]) || !isset($conversionRates[$toUnit])) {
        return "Invalid unit!";
    }

    // Convert from the 'from' unit to meters
    $valueInMeters = $value * $conversionRates[$fromUnit];

    // Convert from meters to the 'to' unit
    $convertedValue = $valueInMeters / $conversionRates[$toUnit];

    return $convertedValue;
}
if(isset($_POST['lenght'])){
    h1("Result of your convertion");
    $lenght = floatval($_POST['lenght']);
   
    $from = $_POST['from'];
    
    $to = $_POST['to'];
    
    h1($lenght. " ". $from. " = ". convertLength($lenght, $from, $to). " ". $to);

    h1("<a href='/lenght'><button>Reset</button></a>");
}

?>
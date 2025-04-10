<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weight Converter</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<h1>Welcome to Weight Converter Page</h1>
    <h1>
        <a href="/">Home</a>
        <a href="/lenght">Lenght</a>
        <a href="/weight" style="color: blue;">Weight</a>
        <a href="/temperature">Temperature</a>
    </h1>
    <form method="POST">
        <div>
            <p>Enter the Weight to convert</p>
            <input type="text" name='weight' required>
        </div>
        <div>
            <p>Unit to convert from</p>
            <select name="from"  required>
                <option value="milligram">milligram</option>
                <option value="gram">gram</option>
                <option value="kilogram">kilogram</option>
                <option value="ounce">ounce</option>
                <option value="pound">pound</option>
            </select>
        </div>

        <div>
            <p>Unit to convert to</p>
            <select name="to" required>
            <option value="milligram">milligram</option>
                <option value="gram">gram</option>
                <option value="kilogram">kilogram</option>
                <option value="ounce">ounce</option>
                <option value="pound">pound</option>
            </select>
        </div>
        <br><br>
        <button type="submit">Convert</button>
    </form>
</body>

</html>


<?php
function convertWeight($value, $from, $to)
{
    $units = [
        'milligram' => 0.000001,
        'gram'      => 0.001,
        'kilogram'  => 1,
        'ounce'     => 0.0283495,
        'pound'     => 0.453592,
    ];

    $from = strtolower($from);
    $to = strtolower($to);

    if (!isset($units[$from]) || !isset($units[$to])) {
        throw new Exception("Invalid unit: $from or $to");
    }

    // Convert from source unit to kilograms first
    $valueInKg = $value * $units[$from];

    // Then convert from kilograms to target unit
    $convertedValue = $valueInKg / $units[$to];

    return $convertedValue;
}


if(isset($_POST['weight'])){
    h1("Result of your convertion");
    $weight = floatval($_POST['weight']);
   
    $from = $_POST['from'];
    
    $to = $_POST['to'];
    
    h1($weight. " ". $from. " = ". convertWeight($weight, $from, $to). " ". $to);

    h1("<a href='/weight'><button>Reset</button></a>");
}

?>
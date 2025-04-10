<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temperature Converter</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <h1>Welcome to Temperature Converter Page</h1>
    <h1>
        <a href="/">Home</a>
        <a href="/lenght">Lenght</a>
        <a href="/weight">Weight</a>
        <a href="/temperature" style="color: blue;">Temperature</a>
    </h1>


    <form method="POST">
        <div>
            <p>Enter the Temperature to convert</p>
            <input type="text" name='temp' required>
        </div>
        <div>
            <p>Unit to convert from</p>
            <select name="from" required>
                <option value="celsius">celsius</option>
                <option value="fahrenheit">fahrenheit</option>
                <option value="kelvin">kelvin</option>

            </select>
        </div>

        <div>
            <p>Unit to convert to</p>
            <select name="to" required>
                <option value="celsius">celsius</option>
                <option value="fahrenheit">fahrenheit</option>
                <option value="kelvin">kelvin</option>
            </select>
        </div>
        <br><br>
        <button type="submit">Convert</button>
    </form>
</body>

</html>


<?php
function convertTemperature($value, $from, $to)
{
    $from = strtolower($from);
    $to = strtolower($to);

    if ($from === $to) {
        return $value;
    }

    // Convert from source to Celsius first
    switch ($from) {
        case 'celsius':
            $celsius = $value;
            break;
        case 'fahrenheit':
            $celsius = ($value - 32) * 5 / 9;
            break;
        case 'kelvin':
            $celsius = $value - 273.15;
            break;
        default:
            throw new Exception("Invalid from unit: $from");
    }

    // Convert from Celsius to target unit
    switch ($to) {
        case 'celsius':
            return $celsius;
        case 'fahrenheit':
            return ($celsius * 9 / 5) + 32;
        case 'kelvin':
            return $celsius + 273.15;
        default:
            throw new Exception("Invalid to unit: $to");
    }
}



if (isset($_POST['temp'])) {
    h1("Result of your convertion");
    $temp = floatval($_POST['temp']);

    $from = $_POST['from'];

    $to = $_POST['to'];

    h1($temp . " " . $from . " = " . convertTemperature($temp, $from, $to) . " " . $to);

    h1("<a href='/temperature'><button>Reset</button></a>");
}

?>
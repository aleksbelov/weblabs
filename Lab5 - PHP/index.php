<html>
<head>
    <title>php</title>
    <style type="text/css">
        table {
            border-collapse: collapse;
        }
        td, tr {
            border: solid 1px;
        }

    </style>
</head>
<body>
<?php
$datafile = "data.txt";
echo "<p>Таблица из файла " . $datafile . ", отсортировано по первому столбцу</p>";

$lines = file($datafile);
asort($lines);

echo "<table >";
foreach ($lines as $line) {
    echo "<tr>";
    foreach (explode(",", $line) as $e) {
        echo "<td>" . $e . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>

</body>
</html>
<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "techplement";

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Sorry, we failed to connect: " . mysqli_connect_error());
} else {
    echo "Connection was successful<br>";
}

if (isset($_POST['calculate'])) {
    $expression = $_POST['display'];
    $result = eval("return $expression;");
}

if (isset($result)) {
    echo "Expression: $expression<br>";
    echo "Result: $result";
} else {
    echo "Invalid calculation.";
}

$sql = "INSERT INTO internship (result, expression) VALUES ('$result', '$expression')";
        $result = mysqli_query($conn, $sql);

       

        if ($result) {
            echo "Data inserted successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
       

?>

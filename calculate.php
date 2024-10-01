<?php
// Get inputs and operators 
$input1 = $_POST['input1'];
$operator1 = $_POST['operator1'];
$input2 = $_POST['input2'];
$operator2 = $_POST['operator2'];
$input3 = $_POST['input3'];

function calculate($a, $op, $b) {
    switch ($op) {
        case '+': return $a + $b;
        case '-': return $a - $b;
        case '*': return $a * $b;
        case '/': 
            if ($b == 0) {
                return "ERROR: Division by zero";
            }
            return $a / $b;
        default: return "Invalid Operator";
    }
}

// Handle multiplication and division precedence
if ($operator1 == '*' || $operator1 == '/') {
    $result1 = calculate($input1, $operator1, $input2);
    $final_result = calculate($result1, $operator2, $input3);
} elseif ($operator2 == '*' || $operator2 == '/') {
    $result2 = calculate($input2, $operator2, $input3);
    $final_result = calculate($input1, $operator1, $result2);
} else {
    $result1 = calculate($input1, $operator1, $input2);
    $final_result = calculate($result1, $operator2, $input3);
}

// Display the result
echo "<h2>Calculation Result:</h2>";
if (is_numeric($final_result)) {
    echo "Result: " . $final_result;
} else {
    echo $final_result;
}
?>

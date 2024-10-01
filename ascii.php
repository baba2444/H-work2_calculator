<?php

$size = isset($_GET['size']) ? intval($_GET['size']) : 5; // Change  the size of the square

// Check if size is valid
if ($size >= 5 && $size % 2 == 1) {
    //  HTML table
    echo '<style>
            table { border-collapse: collapse; font-family: Courier, monospace; }
            td { width: 20px; height: 20px; text-align: center; }
            .outer { color: blue; }
            .crosshair { color: red; }
            .empty { color: white; }
          </style>';
    echo '<table>';

    // Generate the ASCII art
    for ($i = 0; $i < $size; $i++) {
        echo '<tr>';
        for ($j = 0; $j < $size; $j++) {
            // Determine the character to display
            if ($i == 0) {
                // Top edge
                echo '<td class="outer">' . ($j == 0 ? '/' : ($j == $size - 1 ? '\\' : '-')) . '</td>';
            } elseif ($i == $size - 1) {
                // Bottom edge
                echo '<td class="outer">' . ($j == 0 ? '\\' : ($j == $size - 1 ? '/' : '_')) . '</td>';
            } elseif ($j == 0 || $j == $size - 1) {
                // Side edges
                echo '<td class="outer">|</td>';
            } elseif ($i == floor($size / 2) && $j == floor($size / 2)) {
                // Center plus sign
                echo '<td class="crosshair">+</td>';
            } elseif ($i % 2 == 1 && ($j == 1 || $j == $size - 2)) {
                // Vertical bars of the bullseye
                echo '<td class="crosshair">|</td>';
            } else {
                // Empty space
                echo '<td class="empty">&nbsp;</td>';
            }
        }
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo "Please enter an odd number greater than or equal to 5.";
}
?>


<?php

// Create array to hold list of todo items
$items = array();

// List array items formatted for CLI
// Return string of list items separated by newlines.
// Should be listed [KEY] Value like this:
// [1] TODO item 1
// [2] TODO item 2 - blah
// DO NOT USE ECHO, USE RETURN

function list_items($list)
{
    $result = '';
    foreach ($list as $key => $value) {

        $result .= "[" . ($key + 1) . "] $value\n";
    }
    return $result;
}

// Get STDIN, strip whitespace and newlines,
// and convert to uppercase if $upper is true

function get_input($upper = FALSE)
{
    // Return filtered STDIN input

    $result = trim(fgets(STDIN));

    return ($upper) ? strtoupper($result) : $result;
}

// Add a (S)ort option to your menu. When it is chosen, it should call a function called sort_menu()

function sort_menu($items)
{
    echo '(A)-Z, (Z)-A, (O)rder entered, (R)everse order entered: ';

        $input = get_input(TRUE);

        switch($input) {
            case 'A':
                asort($items);
                break;
            case 'Z':
                arsort($items);
                break;
            case 'O':
                ksort($items);
                break;
            case 'R':
                krsort($items);
        }
        // if ($input == 'A') {
        //     sort($items);
        // } elseif ($input == 'Z') {
        //     rsort($items);
        // } elseif ($input == 'O') {
        //     ksort($items);
        // } elseif ($input == 'R') {
        //     krsort($items);
        // }


        return $items;

}



// The loop!
do {
    // Echo the list produced by the function
    echo list_items($items);

    // Show the menu options
    // Add a sort option
    echo '(N)ew item, (R)emove item, (S)ort items, (Q)uit : ';

    // Get the input from user
    // Use trim() to remove whitespace and newlines
    $input = get_input(TRUE);

    // Check for actionable input
    if ($input == 'N') {
        // Ask for entry
        echo 'Enter item: ';
        // Add entry to list array
        //$items[] = get_input();
        // Give user option to place todo item at beginning/end of list..default to end if no input
        $temp = get_input();
        echo 'Would you like this item at the (B)eginning or (E)nd of you list? ';
        $input = get_input(TRUE);
        if ($input == 'B') {
            array_unshift($items, $temp);
        } elseif (($input == 'E') || ($input == FALSE)) {
            array_push($items, $temp);
        }

    } elseif ($input == 'R') {
        // Remove which item?
        echo 'Enter item number to remove: ';
        // Get array key
        $key = get_input();
        // Remove from array
        unset($items[$key - 1]);
        // resets array
        //$items = array_values($items);
    } elseif ($input == 'S') {
        // Sort array by user input
        $items = sort_menu($items);
    }
// Exit when input is (Q)uit
} while ($input != 'Q');

// Say Goodbye!
echo "Goodbye!\n";

// Exit with 0 errors
exit(0);

// // Create array to hold list of todo items
// $items = array();

// // The loop!
// do {
//     // Iterate through list items
//     foreach ($items as $key => $item) {
//         // Start $key value at 1 instead of 0
//         $key++;
//         // Display each item and a newline
//         echo "[{$key}] {$item}\n";
//     }

//     // Show the menu options
//     echo '(N)ew item, (R)emove item, (Q)uit : ';

//     // Get the input from user
//     // Use trim() to remove whitespace and newlines
//     $input = trim(fgets(STDIN));

//     // Check for actionable input
//     if (($input == 'N') || ($input == 'n')) {
//         // Ask for entry
//         echo 'Enter item: ';
//         // Add entry to list array
//         $items[] = trim(fgets(STDIN));
//     } elseif (($input == 'R') || ($input == 'r')) {
//         // Remove which item?
//         echo 'Enter item number to remove: ';
//         // Get array key
//         $key = trim(fgets(STDIN));
//         // subtract $key value by 1 to remove correct item
//         $key--;
//         // Remove from array
//         unset($items[$key]);
//     }
//     // resets array
//     $items = array_values($items);
// // Exit when input is (Q)uit
// } while (($input != 'Q') && ($input != 'q'));

// // Say Goodbye!
// echo "Goodbye!\n";

// // Exit with 0 errors
// exit(0);

// ?>
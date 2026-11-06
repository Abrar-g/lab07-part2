<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Booking Confirmation</title>
</head>
<body>
    <h1>Rohirrim Tour Booking Confirmation</h1>
<?php
    // isset() checks that each value was actually submitted.
    // htmlspecialchars() stops users injecting HTML into the page.
    $firstname = isset($_POST["firstname"]) ? htmlspecialchars($_POST["firstname"]) : "";
    $lastname  = isset($_POST["lastname"])  ? htmlspecialchars($_POST["lastname"])  : "";
    $age       = isset($_POST["age"])       ? htmlspecialchars($_POST["age"])       : "";
    $food      = isset($_POST["food"])      ? htmlspecialchars($_POST["food"])      : "";
    $partysize = isset($_POST["partysize"]) ? htmlspecialchars($_POST["partysize"]) : "";

    // the radio buttons send a single letter, so turn it into a species name
    $species = "";
    if (isset($_POST["species"])) {
        if ($_POST["species"] == "M") {
            $species = "Human";
        } elseif ($_POST["species"] == "D") {
            $species = "Dwarf";
        } elseif ($_POST["species"] == "E") {
            $species = "Elf";
        } elseif ($_POST["species"] == "H") {
            $species = "Hobbit";
        }
    }

    // each checkbox is only sent if it was ticked, so check them one at a time
    $bookings = array();
    if (isset($_POST["accom"])) {
        $bookings[] = "Accommodation";
    }
    if (isset($_POST["4day"])) {
        $bookings[] = "Four-day tour";
    }
    if (isset($_POST["10day"])) {
        $bookings[] = "Ten-day tour";
    }
    $booked = implode(" and ", $bookings);

    echo "<p>Welcome $firstname $lastname !<br>";
    echo "You are now booked on the $booked<br>";
    echo "Species: $species<br>";
    echo "Age: $age<br>";
    echo "Meal Preference: $food<br>";
    echo "Number of travellers: $partysize</p>";
?>
</body>
</html>
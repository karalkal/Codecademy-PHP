<?php
function returnSeason($month)
{
    switch ($month) {
        case "December":
        case "January":
        case "February":
            return "winter";
        case "March":
        case "April":
        case "May":
            return "spring";
        case "June":
        case "July":
        case "August":
            return "summer";
        case "September":
        case "October":
        case "November":
            return "fall";
    }
}

function returnSeasonFallThrough($month)
{
    switch ($month) {
        case "December":
            echo "Winter";
        case "January":
            echo "Winter";
        case "February":
            echo "Winter";
            break;

        case "March":
            echo "Spring";
        case "April":
            echo "Spring";
        case "May":
            echo "Spring";
            break;

        case "June":
            echo "Summer";
        case "July":
            echo "Summer";
        case "August":
            echo "Summer";
            break;

        case "September":
            echo "Autumn";
        case "October":
            echo "Autumn";
        case "November":
            echo "Autumn";
    }
}

echo returnSeason("February");
echo "\n";
echo returnSeason("April");
echo "\n";
echo returnSeason("August");
echo "\n";
echo returnSeason("October");

echo "\n\n";
echo "Run in terminal with php [file name] to test fall through\n";
echo "Enter Month\n";
$month_name = readline(">> ");
returnSeasonFallThrough($month_name);

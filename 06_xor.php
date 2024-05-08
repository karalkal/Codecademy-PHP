<?php
$result1 = (true xor true);
echo "(true xor true) = ";
echo $result1 ? "" : "FALSE (both are true)";
echo "\n";

$result2 = (false xor false);
echo "(false xor false) = ";
echo $result2 ? "" : "FALSE (both are false)";
echo "\n";

$result3 = (true xor false);
echo "(true xor false) = ";
echo $result3 ? "TRUE (only one is true)" : "";
echo "\n";

$result4 = (true xor false xor false);
echo "(true xor false xor false) = ";
echo $result4 ? "TRUE - first eval is true, then true xor false is also true" : "";
echo "\n";

$result5 = (false xor false xor true);
echo "(false xor false xor true) = ";
echo $result5 ? "TRUE - first eval is false, then false xor true is true" : "";


/*
We can use xor to answer either/or questions: Did you wear either glasses or contacts today?
    If neither, the answer is “No”—I didn’t wear glasses nor did I wear contacts. My vision is impaired.
    If I wore both, the answer is “No”—I didn’t wear either glasses or contacts. My vision is impaired.
    If I wore contacts, the answer is “Yes”—I wore contacts, so my vision was corrected.
    If I wore glasses, the answer is “Yes”—I wore glasses, so my vision was corrected.
*/


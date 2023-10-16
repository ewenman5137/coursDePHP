<?php
function isPalindrome($mot){
    include 'reverse.php';
    return $mot==reverse($mot)?"true":"false";
}
?>
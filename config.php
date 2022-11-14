<?php
/**
 * PHP version 8.08
 * 
 * @category None
 * @package  None
 * @author   "Audrey Borges <audrey.borges@audreyborges.com>
 * @license  https://www.audreyborges.com/ GNU General Public License
 * @link     https://www.audreyborges.com/
 */

$servername = "localhost";
$username = "dbu3360126";
$password = "5eK6WHwqT9j@46q";
$dbname = "audreyborges.com";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `CONTACTS`(`id`, `name`, `email`, `details`) VALUES (Billy Bob, billy.bob@gmail.com, Hi)";

if ($conn->query($sql) === true) {
    echo "Record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

<?php
/**
 * PHP version 7.3
 * 
 * @category None
 * @package  None
 * @author   "Audrey Borges <audrey@audreyborges.com>
 * @license  https://www.audreyborges.com/ GNU General Public License
 * @link     https://www.audreyborges.com/
 */

// Create database connection
$conn = mysqli_connect('localhost', '1142513', '59WR.D!tgXBYK.D', '1142513');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
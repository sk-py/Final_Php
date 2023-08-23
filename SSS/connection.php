<?Php
$conn = mysqli_connect("localhost", "root", "", "ecom_db");
define("MAIN_PATH", $_SERVER['DOCUMENT_ROOT']);
define("IMG_PATH", $_SERVER['DOCUMENT_ROOT'] . "/Final_Php/images/");
define("FETCH_PATH", "../images/");
?>
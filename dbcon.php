<?
$dbconn = mysqli_connect("localhost","root","","usersDb");

if(!$dbconn) {
    die('Connection Failed'. mysqli_connect_error());
}

?>
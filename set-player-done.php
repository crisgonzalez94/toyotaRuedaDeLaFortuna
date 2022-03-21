<?php
require_once("config.php");

$data_post = json_decode(file_get_contents('php://input'),true);
error_log($data_post['token']);
if (isset($data_post['token']) && $data_post['token'] == "70acbeef398242c68435c4fdc99c8f36") {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "UPDATE players SET played = 1 WHERE id=" . $data_post['id'];
    if($conn->query($sql) == TRUE)
    {
        $data = array(
            'error' => 0, 
            'message' => 'Update success.'
          );
    } else {
        $data = array(
            'error' => 1, 
            'message' => 'Update error. Please check Id.'
          );
    }
} else {
  $data = array(
    'error' => 2, 
    'message' => 'Auth failed.'
  );
}
$conn->close();
} 
?>
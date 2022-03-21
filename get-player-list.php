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

$sql = "SELECT id, name, credits, prize, pin, played FROM players";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  $players = array();
  while($row = $result->fetch_assoc()) {
      $data = array(
        'id' => $row["id"], 
        'name' => $row["name"], 
        'credits' => $row["credits"], 
        'prize' => $row["prize"], 
        'pin' => $row["pin"], 
        'played' => $row["played"], 
      );
    array_push($players, $data);
  }
  $participants = array(
    'participants' => $players 
  );
  echo json_encode($participants);
} else {
  echo "{}";
}
$conn->close();
} 
?>
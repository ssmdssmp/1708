<?php
// require('./Database/db_connection.php');
// require('./Database/queryes_manager.php');

require('./Telegram/TelegramAPI.php');
require('./ClientModel.php');

// возвращать результат вот в таком виде: 
// echo json_encode(array('responseCode' => '2', 'responseMsg' => 'Cannot send data, try again'));


const POST_NUMBER_KEY = 'phone';
const POST_NAME_KEY = 'name';
$arrKeys = array(
  POST_NUMBER_KEY,
  POST_NAME_KEY
);
//функция проверки всех параметров пост которые требуются($arrKeys)
function postValidator(array $keys){
  $isOK = TRUE;
  foreach($keys as $key)
  { 
    $isOK = ($isOK && isset($_POST[$key]));
  } 
  return $isOK;
}



if(!postValidator($arrKeys)){
  echo json_encode(array('responseCode' => '1', 'responseMsg' => 'Not correct post parameters'));
  exit();
}

$client=new ClientModel($_POST[POST_NAME_KEY], $_POST[POST_NUMBER_KEY]);

// $dbManager = new DB_Maneger();

// $conn = ($dbManager->connectToDb()) or exit("Невозможно подключится к БД");
// $queryManager = new Query_Manager();
// $queryManager->addClientQuery($conn, "mama mia", $_POST['form-number']);
// $dbManager->closeConnection();
$telegramApi = new TelegramAPI();
if($telegramApi->sendMsg($client->toURLString())){
  echo json_encode(array('responseCode' => '0', 'responseMsg' => 'Data succesfully send'));
} else {
  echo json_encode(array('responseCode' => '2', 'responseMsg' => 'Cannot send data, try again'));
}
?>
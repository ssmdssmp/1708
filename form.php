<?php

/* https://api.telegram.org/bot5047013850:AAExDJksx6jmAqdZwnX6bBYI_mBG-avC0rg/getUpdates,
где, XXXXXXXXXXXXXXXXXXXXXXX - токен вашего бота, полученный ранее */
// print_r($_POST);
$phone = $_POST['form-number'];
$token = "5047013850:AAExDJksx6jmAqdZwnX6bBYI_mBG-avC0rg";
$chat_id = "-1001616261182";

$arr = array(
  "Phone: " => $phone
);
$txt = "";
foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value;
};

 $sendToTelegram = fopen("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&parse_mode=html&text=$txt","r");

if ($sendToTelegram) {
  echo 'Congrats!s';
} else {
  echo "Error";
}
?>
<?php
/* https://api.telegram.org/bot5047013850:AAExDJksx6jmAqdZwnX6bBYI_mBG-avC0rg/getUpdates,
где, XXXXXXXXXXXXXXXXXXXXXXX - токен вашего бота, полученный ранее */

//API для отправки сообщений в телеграм бота
class TelegramAPI
{
    private string $m_token;
    private string $m_chat_id;

    public function __construct(string $token = "5047013850:AAExDJksx6jmAqdZwnX6bBYI_mBG-avC0rg", string $chat_id = "-1001616261182") {
        $this->m_token = $token;
        $this->m_chat_id = $chat_id;
    }

    public function sendMsg(string $msg): bool  {
        $result = fopen("https://api.telegram.org/bot$this->m_token/sendMessage?chat_id=$this->m_chat_id&parse_mode=html&text=$msg","r");
        if($result) {
            return true;
        } else {
            return false;
        }
    }

}
?>
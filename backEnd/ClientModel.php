<?php
class ClientModel
{
    // объявление свойства
    private string $m_name;
    private string $m_phone;
    private DateTime $m_dateCreate;

    public function __construct(string $name = "", string $phone = "", DateTime $dateCreate= new DateTime()) {
        $this->m_name = $name;
        $this->m_phone = $phone;
        $this->m_dateCreate = $dateCreate;
    }

    function toString(): string {
        $nelLineSymbol = "%0A";
        return "CLIENT DATA: ". "\n"
                ."name: ".$this->m_name. "\n"
                ."phone: ".$this->m_phone. "\n"
                ."date create: ".$this->m_dateCreate->format("Y-m-d");
    }

    function toURLString(): string {
        return urlencode($this->toString());
    }
    function toHTMLString(): string {
        
        return "CLIENT DATA: <br>"
                ."name: ".$this->m_name."<br>"
                ."phone:" . $this->m_phone."<br>"
                ."date create: ". ($this->m_dateCreate->format("Y-m-d"));
    }
}
?>
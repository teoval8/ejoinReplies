<?php
include_once 'Database.php';

class risposte_sms {
    //Mappatura record della tabella
    private $username;
    private $password;
    private $sender;
    private $receiver;
    private $port;
    private $charset;
    private $content;

    public function __construct($username, $password, $sender, $receiver, $port, $charset, $content){
        $this->username = $username;
        $this->password = $password;
        $this->sender = $sender;
        $this->receiver = $receiver;
        $this->port = $port;
        $this->charset = $charset;
        $this->content = $content;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getSender() {
        return $this->sender;
    }

    public function getReceiver() {
        return $this->receiver;
    }

    public function getPort() {
        return $this->port;
    }

    public function getCharset() {
        return $this->charset;
    }

    public function getContent() {
        return $this->content;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setSender($sender) {
        $this->sender = $sender;
    }

    public function setReceiver($receiver) {
        $this->receiver = $receiver;
    }

    public function setPort($port) {
        $this->port = $port;
    }

    public function setCharset($charset) {
        $this->charset = $charset;
    }

    public function setContent($content) {
        $this->content = $content;
    }
}

class access_risposte_sms {
    public static function insertResply ($risposta) {
        $username = $risposta->getUsername();
        $password = $risposta->getPassword();
        $sender = $risposta->getSender();
        $receiver = $risposta->getReceiver();
        $port = $risposta->getPort();
        $charset = $risposta->getCharset();
        $content = $risposta->getContent();

        $conn = Database::getConnection();
        $stmt = $conn->prepare("INSERT INTO risposte_ejoin (username, password, sender, receiver, port, charset, content) VALUES (:username, :password, :sender, :receiver, :port, :charset, :content)");
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":sender", $sender);
        $stmt->bindParam("receiver", $receiver);
        $stmt->bindParam("port", $port);
        $stmt->bindParam("charset", $charset);
        $stmt->bindParam(":content", $content);

        if($stmt->execute()) return true;

        return false;
    }
}
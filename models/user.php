<?php
namespace Models;

class User {
    private $id;
    private $username;
    private $photo;

    public function __construct($id, $username, $photo) {
        $this->id = $id;
        $this->username = $username;
        $this->photo = $photo;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPhoto(){
        $blobData = $this->photo;
        $mimeType = 'photo/jpeg';
        if (substr($blobData, 0, 4) === "\x89PNG") {
            $mimeType = 'photo/png';
        }
        $base64Data = base64_encode($blobData);
        return 'data:' . $mimeType . ';base64,' . $base64Data;
    }
}
?>
<?php

class Comment {
    
    private $commentID, $sendingID, $recipientID, $leftWhen, $comment;
    
    public function __construct($commentID, $sendingID, $recipientID, $leftWhen, $comment) {
        $this->commentID = $commentID;
        $this->sendingID = $sendingID;
        $this->recipientID = $recipientID;
        $this->leftWhen = $leftWhen;
        $this->comment = $comment;
    }
    
    public function getCommentId() {
        return $this->commentID;
    }
    
    public function setCommentID($commentID) {
        $this->commentID = $commentID;
    }

    public function getSendingID() {
        return $this->sendingID;
    }
    
    public function setSendingId($sendingID) {
        $this->sendingID = $sendingID;
    }

    public function getRecipientId() {
        return $this->recipientID;
    }
    
    public function setRecipientId($recipientID) {
        $this->recipientID = $recipientID;
    }

    public function getLeftWhen() {
        return $this->leftWhen;
    }
    
    public function setLeftWhen($leftWhen) {
        $this->leftWhen = $leftWhen;
    }

    public function getComment() {
        return $this->comment;
    }
    
    public function setComment($comment) {
        $this->comment = $comment;
    }

    
}
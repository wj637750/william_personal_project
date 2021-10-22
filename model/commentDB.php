<?php

class CommentDB {
    
    public static function addComment($sendingID, $recipientID, $comment) {
        $db = Database::getDB();
        
        $query = 'INSERT INTO comments
                  (sendingID, recipientID, leftWhen, comment)
                  VALUES (:sendingID, :recipientID, NOW(), :comment)';
        $statement = $db->prepare($query);
        $statement->bindValue(':sendingID', $sendingID);
        $statement->bindValue(':recipientID', $recipientID);
        $statement->bindValue(':comment', $comment);
        $statement->execute();
        $statement->closeCursor();
    }
    
    public static function getCommentsByMovieId($recipientID) {
        $db = Database::getDB();
        
        $query = 'SELECT *
                  FROM comments
                  WHERE recipientId = :recipientID';
        
        $statement = $db->prepare($query);
        $statement->bindValue(':recipientID', $recipientID);
        $statement->execute();
        $rows =  $statement->fetchAll();
        $statement->closeCursor();
        
        $comments = array();
        foreach ($rows as $row) {
            $i = new Comment($row['commentID'],
                             $row['sendingID'],
                             $row['recipientID'],
                             $row['leftWhen'],
                             $row['comment']);
            $comments[] = $i;
        }
        
        return $comments;
    }
    
    
}

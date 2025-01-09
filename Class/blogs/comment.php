<?php
class Comment
{
    private $dbcon;
    private $id;
    private $text;
    private $blogID;
    private $UserID;
    public function __construct($dbcon)
    {
        $this->dbcon = $dbcon;
    }
    public function createComment()
    {
        $this->blogID = $_POST["BLOGID"];
        $this->UserID = $_POST["USERID"];
        $this->text = $_POST["COMMENT"];
        $query = "INSERT INTO comment(centext, userID, blogID) VALUES (':text', ':user', ':blog')";
        try {
            $stmt = $this->dbcon->prepare($query);
            $executed = $stmt->execute([
                'text' => $this->text,
                'user' => $this->UserID,
                'blog' => $this->blogID
            ]);
            if ($executed) {
                return ["status" => 1, "message" => "comment was added sucssesfully"];
            } else {
                return ["status" => 0, "message" => "comment was not added"];
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function getAllComments()
    {
        $query = "SELECT * FROM comment";
        try {
            $stmt = $this->dbcon->prepare($query);
            $stmt->execute();
            $comments = $stmt->fetchAll();
            return ["status" => 1, "message" => $comments];
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

}
?>
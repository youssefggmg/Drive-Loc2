<?php
class Tags
{
    private $dbcon;
    private $tagname;
    private $tagID;
    private $blogID;


    public function __construct($dbcon)
    {
        $this->dbcon = $dbcon;
    }
    public function getTags()
    {
        try {
            $query = "SELECT * FROM tags";
            $stmt = $this->dbcon->query($query);
            $result = $stmt->fetchAll();
            return ['status' => 1, 'data' => $result];
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function addTag()
    {
        try {
            $query = "INSERT INTO tags (tagname) VALUES (:tagname)";
            $stmt = $this->dbcon->prepare($query);
            $stmt->bindParam(':tagname', $this->tagname);
            $stmt->execute();
            return ['status' => 1, 'message' => 'Tag added successfully'];
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function assignTag()
    {
        $this->tagID = $_POST["tagID"];
        $this->blogID = $_POST["blogID"];
        try {
            $query = "INSERT INTO tagBlog (blog , tag) VALUES (:blogID , :tagID)";
            $stmt = $this->dbcon->prepare($query);
            $stmt->execute([
                ':blogID' => $this->blogID,
                ':tagID' => $this->tagID
            ]);
            return ['status' => 1, 'message' => 'Tag assigned successfully'];
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
?>
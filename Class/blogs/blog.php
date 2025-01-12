<?php
class Blog
{
    private $dbcon;
    private $title;
    private $content;
    private $Image;
    private $authorID;
    private $BlogID;

    public function __construct($dbcon)
    {
        $this->dbcon = $dbcon;
    }
    public function addBlog()
    {
        $this->title = $_POST["title"];
        $this->content = $_POST["content"];
        $this->Image = $_POST["Image"];
        $this->authorID = $_POST["authorID"];
        $query = "INSERT INTO blog (title, content, image,authorID) VALUES (:title ,:content, :image,:id)";
        try {
            $stmt = $this->dbcon->prepare($query);
            $executed = $stmt->execute([
                ':title' => $this->title,
                ':content' => $this->content,
                ':image' => $this->Image,
                ':id' => $this->authorID
            ]);
            if ($executed) {
                return ["status" => 1, "message" => "blog was added sucssesfully"];
            } else {
                return ["status" => 0, "message" => "ther is some problem"];
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function getAPPBlogs()
    {
        $query = "SELECT * FROM blog where isapproved = 'approved'";
        try {
            $stmt = $this->dbcon->prepare($query);
            $executed = $stmt->execute();
            if ($executed) {
                $rows = $stmt->fetchAll();
                return ["status" => 1, "message" => $rows];
            } else {
                return ["status" => 0, "message" => "ther is some problem"];
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function editBlog()
    {
        $this->title = $_POST["title"] ?? "";
        $this->content = $_POST["content"] ?? "";
        $this->Image = $_POST["Image"] ?? "";
        $this->BlogID = $_POST["blogID"] ?? "";
        $params = [];
        $query = "UPDATE Blog set ";
        if (!empty($this->title)) {
            $query .= "title = :title, ";
            $params[":title"] = $this->title;
        }
        if (!empty($this->content)) {
            $query .= "content = :content, ";
            $params[":content"] = $this->content;
        }
        if (!empty($this->Image)) {
            $query .= "image = :image, ";
            $params[":image"] = $this->Image;
        }
        $query .= "WHERE id = :id";
        $params["id"] = $this->BlogID;

        $stmt = $this->dbcon->prepare($query);
        $executed = $stmt->execute($params);
        if ($executed) {
            return ["status" => 1, "message" => "blog was updated successfully"];
        } else {
            return ["status" => 0, "message" => "ther is some problem"];
        }
    }
    public function deleteBlog()
    {
        $id = $_POST["id"];
        $query = "DELETE FROM blog WHERE id = :id";
        try {
            $stmt = $this->dbcon->prepare($query);
            $params = [":id" => $id];
            $executed = $stmt->execute($params);
            if ($executed) {
                return ["status" => 1, "message" => "blog was deleted successfully"];
            } else {
                return ["status" => 0, "message" => "ther is some problem"];
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function search()
{
    $this->title = $_GET["title"]; 
    $query = "SELECT * FROM blog WHERE title LIKE :title"; 

    try {
        $stmt = $this->dbcon->prepare($query); 

        $params = [":title" => "%" . $this->title . "%"];

        $stmt->execute($params); 

        $result = $stmt->fetchAll();

        return [
            "status" => 1,
            "message" => !empty($result) ? $result : "No results found."
        ];
    } catch (PDOException $e) {
        return [
            "status" => 0,
            "message" => $e->getMessage()
        ];
    }
}
    public function getSingleBlog()
    {
        $this->BlogID = $_GET["id"];
        $query = "SELECT * FROM blog WHERE id = :id";
        try {
            $stmt = $this->dbcon->prepare($query);
            $params = ["id" => $this->BlogID];
            $stmt->execute($params);
            $result = $stmt->fetch();
            return ["status" => 1, "message" => $result];
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function ApproveBlog()
    {
        $this->BlogID = $_GET["id"];
        $query = "UPDATE blog SET isapproved = approved WHERE id = :id";
        try {
            $stmt = $this->dbcon->prepare($query);
            $params = ["id" => $this->BlogID];
            $executed = $stmt->execute($params);
            if ($executed) {
                return ["status" => 1, "message" => "blog was approved successfully"];
            } else {
                return ["status" => 0, "message" => "ther is some problem"];
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function MYBlogs()
    {
        $this->authorID = $_COOKIE["userID"];
        $query = "SELECT * FROM blog WHERE authorID = :id";
        try {
            $stmt = $this->dbcon->prepare($query);
            $params = ["id" => $this->authorID];
            $stmt->execute($params);
            $result = $stmt->fetchAll();
            if ($result) {
                return ["status" => 1, "message" => $result];
            }
            else {
                return ["status" => 0, "message" => "no blogs found"];
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
?>
<?php
class Catigory {
    private $dbcon;

    public function __construct($dbcon)
    {
        $this->dbcon = $dbcon;
    }

    public function addCategory()
    {
        $query = "INSERT INTO catigory (catigoryName) VALUES (:catigoryName)";

        try {
            $catigoryName = $_POST["catigoryName"];

            $stmt = $this->dbcon->prepare($query);
            $executed = $stmt->execute([
                "catigoryName" => $catigoryName
            ]);

            if ($executed) {
                return ["status" => 1, "message" => "Category added successfully"];
            } else {
                return ["status" => 0, "error" => "Failed to add category"];
            }
        } catch (PDOException $e) {
            return json_encode(["status" => 0, "error" => $e->getMessage()]);
        }
    }

    public function editCategory()
    {
        $query = "UPDATE catigory SET catigoryName = :catigoryName WHERE catigorYid = :catigorYid";

        try {
            $catigorYid = $_POST["catigorYid"];
            $catigoryName = $_POST["catigoryName"];

            $stmt = $this->dbcon->prepare($query);
            $executed = $stmt->execute([
                "catigorYid" => $catigorYid,
                "catigoryName" => $catigoryName
            ]);

            if ($executed) {
                return json_encode(["status" => 1, "message" => "Category updated successfully"]);
            } else {
                return json_encode(["status" => 0, "error" => "Failed to update category"]);
            }
        } catch (PDOException $e) {
            return json_encode(["status" => 0, "error" => $e->getMessage()]);
        }
    }

    public function deleteCategory()
    {
        $query = "DELETE FROM catigory WHERE catigorYid = :catigorYid";

        try {
            // Get user input
            $catigorYid = $_POST["catigorYid"];

            $stmt = $this->dbcon->prepare($query);
            $executed = $stmt->execute([
                "catigorYid" => $catigorYid
            ]);

            if ($executed) {
                return json_encode(["status" => 1, "message" => "Category deleted successfully"]);
            } else {
                return json_encode(["status" => 0, "error" => "Failed to delete category"]);
            }
        } catch (PDOException $e) {
            return json_encode(["status" => 0, "error" => $e->getMessage()]);
        }
    }
    public function getAllCategories()
    {
        $query = "SELECT * FROM catigory";

        try {
            // Prepare and execute the query
            $stmt = $this->dbcon->prepare($query);
            $stmt->execute();

            $categories = $stmt->fetchAll();

            if ($categories) {
                return ["status" => 1, "categories" => $categories];
            } else {
                return ["status" => 0, "message" => "No categories found"];
            }
        } catch (PDOException $e) {
            return ["status" => 0, "error" => $e->getMessage()];
        }
    }
}
?>

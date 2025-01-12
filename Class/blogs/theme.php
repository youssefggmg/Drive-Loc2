<?php
class Theme
{
    private $dbcon;

    public function __construct($dbcon)
    {
        $this->dbcon = $dbcon;
    }
    public function getThemes()
    {
        try {
            $query = "SELECT * FROM theme";
            $stmt = $this->dbcon->query($query);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return ['status' => 1, 'data' => $result];
        } catch (PDOException $e) {
            return ['status' => 0, 'message' => $e->getMessage()];
        }
    }
    public function addTheme($themeName, $themeImage)
    {
        try {
            $query = "INSERT INTO theme (themeName, themeImage) VALUES (:themeName, :themeImage)";
            $stmt = $this->dbcon->prepare($query);
            $stmt->bindParam(':themeName', $themeName);
            $stmt->bindParam(':themeImage', $themeImage);
            $stmt->execute();

            return ['status' => 1, 'message' => 'Theme added successfully'];
        } catch (PDOException $e) {
            return ['status' => 0, 'message' => $e->getMessage()];
        }
    }
}
?>

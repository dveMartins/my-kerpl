<?php

class MainObject {
    
    public function redirect ($address) {
        header("Location: " . "$address"); 
    }
    
    public static function count_all($table) {
        global $database;

        $sql = "SELECT COUNT(*) FROM $table";
        $result_set = $database->query($sql);
        
        $row = mysqli_fetch_array($result_set);
        return array_shift($row);
        
    }
    
    public static function count_all_cat($categorie) {
        global $database;

        $sql = "SELECT COUNT(*) FROM projects WHERE project_cat = '$categorie'";
        $result_set = $database->query($sql);
        
        $row = mysqli_fetch_array($result_set);
        return array_shift($row);
        
    }
    
}



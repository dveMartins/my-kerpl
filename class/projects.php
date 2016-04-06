<?php

class Projects extends MainObject {
    public $project_id;
    public $project_cat;
    public $project_name;
    public $image;
    public $project_desc;
    public $project_image_name;
    public $project_img_tmp_name;
    public $error_msg = array(
        "file_exists" => ""
    );
    
    public function get_all_prj() {
        global $database;
        $sql = "SELECT * FROM projects ORDER BY id DESC";
        return $database->query($sql);
    
    }
    
    public function delete_prj() {
        global $database;
        $sql = "DELETE FROM projects WHERE id = $this->project_id";
        $del_prj = $database->query($sql);
        if($del_prj){
        $target_file = getenv('DOCUMENT_ROOT') ."/conny-kerpl/images/$this->image";
        unlink($target_file);
        }
        return $del_prj;
   
    }
    
    public function category_row($cat) {
        global $database;
        
        $sql = "SELECT * FROM projects WHERE project_cat = '$cat'";
        $result = $database->query($sql);
        $result_row = mysqli_num_rows($result);
        return $result_row;
    }
    
     public function set_project_img() {

        $target_dir = "../images/";
        $target_file = $target_dir . basename($this->project_image_name);
        $uploadOk = true;
        
        //check if file already exists
        if (file_exists($target_file)) {
            $this->error_msg['file_exists'] = "Fehler! Dieses Bild existiert";
            $uploadOk = false;
        }

        //upload file
        if (move_uploaded_file($this->project_img_tmp_name, $target_file)) {
            return $this->project_image_name;
        } else {

            return FALSE;
        }
    }
    
    public function create_new_project() {
        global $database;
        
        $sql = "INSERT INTO projects (project_cat, project_name, image, project_desc) "
                . "VALUES ('$this->project_cat', '$this->project_name', '$this->image', '$this->project_desc')";
        return $database->query($sql);
    }
    
}


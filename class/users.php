
<?php

class User extends MainObject {
    public $password;
    public $cpassword;
    public $username;
    public $email;
    public $user_id;
    public $signed_in = false;
    public $error_msg = array(
        "match_password" => "",
        "email_error" => "",
        "username_error" => "",
        "password_error" => "",
        "cpassword_error" => "",
        "success_msg" => ""
    );


    public function verify_user() {
        global $database;

        $query = "SELECT * FROM users WHERE username = '$this->username'";

        $db_user = $database->query($query);

        if ($db_user) {

            while ($row = mysqli_fetch_assoc($db_user)) {
                $this->user_id = $row['id'];
                $db_username = $row['username'];
                $db_password = $row['password'];
            }


            if (!empty($this->user_id) && $db_username == $this->username && $this->password == $db_password) {

                return $this->user_id;
            } else {
                return FALSE;
            }
        } else {
            echo 'no result found';
        }
    }
    
    public function get_user() {
        global $database;
        if(isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $sql = "SELECT * FROM users WHERE id = $user_id";
            $user_details = $database->query($sql);
            while($row = mysqli_fetch_array($user_details)) {
                $this->username = $row['username'];
                $this->password = $row['password'];
                $this->email = $row['email'];
            }
        }
        return TRUE;
    }
    
    public function edit_profile($username, $email) {
        
        global $database;
        $user_id = $_SESSION['user_id'];
        $sql = "UPDATE users SET username = '$username', email = '$email' "
                . "WHERE id = $user_id";
        if($database->query($sql)) {
        return $this->get_user();
        } else {
        echo 'failed';
        }
        return true;
    }
    
    public function update_pass($new_pass) {
        
        global $database;
        $user_id = $_SESSION['user_id'];
        $sql = "UPDATE users SET password = '$new_pass' WHERE id = $user_id";
        
        if($database->query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
        return true;
    }

    public function login($user) {

        if ($user) {
            $_SESSION['user_id'] = $user;
            $this->signed_in = true;
            return $user;
        }
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->signed_in = false;

        $_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]
            );
        }

        // Finally, destroy the session.
        session_destroy();
    }

    public function find_query_by_id($user_id) {

        global $database;

        $sql = "SELECT * FROM users WHERE id = {$user_id}";

        return $database->query($sql);
    }

    public function encrypt_pass($password) {

        $options = [
            'cost' => 11,
            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
        ];
        return password_hash("$password", PASSWORD_BCRYPT, $options);
    }

    public function set_user_image() {

        $target_dir = "../images/";
        $target_file = $target_dir . basename($this->user_image_name);
        $uploadOk = true;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        //check if file already exists
        if (file_exists($target_file)) {
            $this->error_msg['file_exists'] = "OOPS! The Profile Image you wish to Upload already exists";
            $uploadOk = false;
        }

        //check image type 

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {

            $uploadOk = FALSE;
        }

        //upload file
        if ($uploadOk == false) {
            
        } elseif (move_uploaded_file($this->user_image_tmp_name, $target_file)) {
            return $this->user_image_name;
        } else {

            return FALSE;
        }
    }

    public function create_user() {

        $empty = "";
        global $database;
        $first_name = $database->escape_string($this->first_name);
        $last_name = $database->escape_string($this->last_name);
        $username = $database->escape_string($this->username);
        $password = $database->escape_string($this->password);
        $cpassword = $database->escape_string($this->cpassword);
        $email = $this->email;

        switch ($empty):
            case $first_name:
                $this->error_msg['first_name_error'] = "Please enter First Name";

            case $last_name:
                $this->error_msg['last_name_error'] = "Last name is required";

            case $username:
                $this->error_msg['username_error'] = "Error! Username is required";

            case $password:
                $this->error_msg['password_error'] = "Password not given!";

            case $cpassword:
                $this->error_msg['cpassword_error'] = "Re-enter Password to match";

            case $email:
                $this->error_msg['email_error'] = "Please Enter a valid Email!";
                break;
            default :

                if ($password != $cpassword) {
                    $this->error_msg['match_password'] = "Password given do not match!";
                    return FALSE;
                } else {
                    $d_pass = $this->encrypt_pass($password);


                    $user_image = $this->set_user_image();

                    //insert datas to database
                    $sql = "INSERT INTO users (first_name, last_name, username, password, user_image, email) "
                            . "VALUES ('$first_name', '$last_name', '$username', '$d_pass', '$user_image', '$email')";

                    $create_user = $database->query($sql);

                    $database->confirm_query($create_user);
                    $this->error_msg['success_msg'] = "Your account has been successfully created";
                }
        endswitch;
    }

}

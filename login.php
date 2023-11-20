    <?php
        session_start();
        require 'hosteliteClass.php';
        $obj = new db();
        
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];
            $r = $obj->validate($username , $password);
            if($r)
            {
                $_SESSION['cid'] = $r['id'];
                 header('location:Dashboard.php');
            }
            else
            {
                echo "Enter Correct Credentials";
            }
        

?>

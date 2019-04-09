<?php //Login script
if (isset($_POST['login-submit'])){
    require 'dbh.inc.php';
    
    $userid = $_POST['userid'];
    $password = $_POST['pwd'];
    
    if (empty($userid) || empty($password)){
        header("Location: ../login.php?error=emptyfields");
        exit();
    }
    else{
        $sql = "SELECT * FROM users WHERE uidUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../login.php?error=sqlerror");
            exit();           
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $userid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)){
                $pwdCheck = password_verify($password, $row['pwdUsers']);
                if ($pwdCheck == false){
                header("Location: ../login.php?error=invalidpassword");
                exit();
                }
                else if($pwdCheck == true){
                    
                    session_start();
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userUid'] = $row['uidUsers'];
                    header("Location: ../main.php"); //Valid session redirect.
                    exit();
                    
                }
                else {
                header("Location: ../login.php?error=invalidpassword");
                exit();  
                }
            }
            else{
                header("Location: ../login.php?error=invaliduser");
                exit();
            }
        }
    }
    
}
    else{
        header("Location: ../login.php");
        exit();
    }
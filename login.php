<?php

session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: /WDV341/loginandlogout/welcome.php");
    exit;
}
 

require_once "config.php";
 

$username = $password = "";
$username_err = $password_err = $login_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["event_user_name"]))){
        $username_err = "Please insert the username.";
    } else{
        $username = trim($_POST["event_user_name"]);
    }
    
    
    if(empty(trim($_POST["event_user_password"]))){
        $password_err = "Insert the password.";
    } else{
        $password = trim($_POST["event_user_password"]);
    }
    
  
    if(empty($username_err) && empty($password_err)){
        
        $sql = "SELECT event_user_id, event_user_name, event_user_password FROM event_user WHERE username = :event_user_name";
        
        if($stmt = $pdo->prepare($sql)){
            
            $stmt->bindParam(":event_user_name", $param_username, PDO::PARAM_STR);
            
        
            $param_username = trim($_POST["event_user_name"]);
            
            
            if($stmt->execute()){
               
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $username = $row["event_user_name"];
                        $hashed_password = $row["event_user_password"];
                        if(password_verify($password, $hashed_password)){
                           
                            session_start();
                            
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["event_user_name"] = $event_user_name;                            
                            
                            
                            header("location: /WDV341/loginandlogout/welcome.php");
                        } else{
                            
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

           
            unset($stmt);
        }
    }
    
   
    unset($pdo);
}
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>User Name</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $event_user_name; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Entrar">
            </div>
            <p>Dont have account? <a href="register.php">Sign in now</a>.</p>
        </form>
    </div>
</body>
</html>
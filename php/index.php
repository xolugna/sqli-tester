<!-- ./php/index.php -->

<?php
if (!empty($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (strpos( strtolower($username), 'sleep') === false && strpos( strtolower($password), 'sleep') === false && strpos( strtolower($username), 'benchmark') === false && strpos( strtolower($password), 'benchmark') === false) {
        try {
            $connection = mysqli_connect('db', 'devuser', 'devpass', "test_db");
            $count = 0;
            // Check connection 
            if (mysqli_connect_errno()) 
            { 
                echo "Database connection failed."; 
            } 

            $query = "SELECT * FROM geek WHERE username='$username' AND password='$password'"; 
            
            $result = mysqli_query($connection, $query); 

            // Perform query 
            if ($result) {
                $count = mysqli_num_rows($result);
            }
        
            if ($count > 0) {
                print("Success");
            } else {
                print("<script>alert('Wrong Username or Password')</script>");
            }
            mysqli_close($connection); 
        } catch (PDOException $e) {
            print($e);
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Login</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <style>
        #login-form {
            background: #969592;
            border: 3px solid #eeeee;
            padding: 9px 9px;
            width: 300px;
            border-radius: 5px;
            color: #1a1f2c;
        }

        input, select, textarea {
            color: #150C07;
            width: 180px;
        }
        input[type="submit"],
        input[type="reset"],
        input[type="button"],
        button {
            -moz-appearance: none;
            -webkit-appearance: none;
            -ms-appearance: none;
            appearance: none;
            -moz-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            -webkit-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            -ms-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            background-color: transparent;
            border-radius: 4px;
            border: 0;
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.3);
            color: #ffffff !important;
            cursor: pointer;
            display: inline-block;
            font-weight: 300;
            height: 3em;
            line-height: 3em;
            padding: 0 2.25em;
            text-align: center;
            text-decoration: none;
            white-space: nowrap;
        }
        input[type="submit"]:hover, input[type="submit"]:active,
        input[type="reset"]:hover,
        input[type="reset"]:active,
        input[type="button"]:hover,
        input[type="button"]:active,
        button:hover,
        button:active {
            box-shadow: inset 0 0 0 1px #e44c65;
            color: #e44c65 !important;
        }
    </style>
</head>
<body class="is-preload">
<!-- Wrapper -->
<div id="wrapper">

    <!-- Main -->
    <section id="main">
        <form id="login-form" method="POST" action="" onsubmit="">
            <table border="0.5">
                <tr>
                    <td><label for="username">Username </label></td>
                    <td><input type="text" name="username" id="username"></td>
                </tr>
                <tr>
                    <td><label for="password">Password </label></td>
                    <td><input type="password" name="password" id="password"></input></td>
                </tr>
                <tr>
                    <td><button class="button small" type="submit" value="Submit">Login</button></td>
                </tr>
            </table>
        </form>

    </section>

    <!-- Footer -->
    <section id="footer">
    </section>

</div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Brite Pedigree Registry</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>


    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["userName"])) {
            $userNameErr = "Username Required";
        } else {
            $userName = test_input($_POST["userName"]);

            if (!preg_match("/^[a-zA-Z-' ]*$/", $userName)) {
                $userNameErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["password"])) {
            $passwordErr = "Password Required";
        } else {
            $password = test_input($_POST["password"]);
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    echo "<h2>Your Input:</h2>";
    echo $userName;
    echo "<br>";
    echo $password;
    echo "<br>";

    ?>


    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card border border-dark">
                <div>
                    <div class="card-body">
                        <p class="fs-5">Sign into your account</p>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="form-group">
                                <label for="text">User Name</label>
                                <input type="text" name="userName" id="userName" class="form-control" placeholder="User Name">
                                <span class="error">* <?php echo $userNameErr; ?> </span>
                            </div>
                            <div class="form-group mb-4">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                                <span class="error">* <?php echo $passwordErr; ?> </span>
                            </div>
                            <input name="login" id="login" class="btn btn-block login-btn mb-4 border border-primary" type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>



</body>

</html>

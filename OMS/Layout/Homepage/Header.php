<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1" id="wixDesktopViewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Wix.com Website Builder" />
    <title>Home Heaven</title>
    <style>
    body {
        background-color: #202020;
        color: #ffffff;
    }

    .navigation {
        background-color: #000000;
        color: #ffffff;
        text-align: center;
        padding: 10px;
        font-size: 20px;
        font-family: "Times New Roman", Times, serif;
    }

    .link {
        color: #ffffff;
        text-decoration: none;
    }

    .link:hover {
        color: #90EE90;
        text-decoration: none;
    }


    .dropdown {
        padding: 10px;
        font-size: 20px;
        border: none;
        outline: none;
        background-color: #000000;
        color: #ffffff;
        border-radius: 8px;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        cursor: pointer;
        font-family: "Times New Roman", Times, serif;
    }

    .dropdown:hover {
        background-color: #555;
        color: #90EE90;
    }

    .dropdown option {
        padding: 10px;
        font-size: 20px;
        border: none;
        outline: none;
        background-color: #000000;
        color: #ffffff;
        border-radius: 8px;
        font-family: "Times New Roman", Times, serif;
    }

    .dropdown option:hover {
        background-color: #555;
        color: #90EE90;
    }
    </style>
</head>

<body>



    <header>
        <div class="navigation" name="navigation">
            <p>
            <h1>SAFE HEAVEN</h1>
            <a class="link" href="#">Home</a> <span>&nbsp; | &nbsp;</span>
            <a class="link" href="../Views/Homepage.php#aboutUs">About us</a> <span>&nbsp; | &nbsp;</span>
            <a class="link" href="../Views/Homepage.php#contactUs">Contact Us</a> <span>&nbsp; | &nbsp;</span>
            <a class="link" href="#">Our Team</a> <span>&nbsp; | &nbsp;</span>
            <a class="link" href="../Views/Adopter/SignUp.php">Sign Up</a> <span>&nbsp; | &nbsp;</span>
            <!-- <a class="link" href="../Views/Adopter/Login.php">Login</a> <span>&nbsp; | &nbsp;</span> -->
            <select class="dropdown" onchange="window.location.href=this.value;">
                <option selected disabled>Login</option>
                <option value="../Views/Adopter/Login.php">User Login</option>
                <option value="../Views/Supervisor/Login.php">Supervisor Login</option>
                <option value="#">Orphan Login</option>
            </select>
            </p>
        </div>
    </header>




</body>

</html>
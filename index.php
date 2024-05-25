<html>

<head>
    <title>FORM LOGIN</title>
    <link href="index.css?v=1.1" rel="stylesheet" type="text/css">
    <style>
        body {
            background-image: url(bg2.jpeg);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            height: 100%;
        }

        .title {
            text-align: center;
            font-size: 2.5em;
            color: white;
            background-color: black;
        }

        .container {
            width: 100px;
            height: 200px;
            position: absolute;
            left: 60%;
            top: 40%;
        }
    </style>
</head>

<body>
    <h1 class="title">
        APLIKASI KASIR FASHION NAVISA
    </h1>
    <div class="container">
        <fieldset>
            <legend>LOGIN KASIR</legend>
            <form method="post" action="login2.php">
                <table border="0" cellspacing="5" cellpadding="10">
                    <tr>
                        <td align="center"><img src="icon1.png" width="200px" height="200px"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="username" style="width: 400; height: 50; font-size:20px; 
    text-align:center; background-color:white;" placeholder="Username"></td>
                    </tr>
                    <tr>
                        <td><input type="password" name="password" id="passwordku" style="width: 400; height: 50; font-size:20px; 
    text-align:center; background-color:white;" placeholder="Password"></td>
                    </tr>
                    <tr>
                        <td><!-- membuat form checkbox dengan perintah menjalankan function showHide() saat diklik -->
                            <input type="checkbox" onclick="showHide()"> Tampilkan Password
                        </td>
                    </tr>
                    <tr>
                        <td align="right"><input type="submit" value="LOGIN" style="width: 100; height: 30; 
color: white; background:black;"></td>
                    </tr>
                </table>
                <script type="text/javascript">
                    function showHide() {
                        var inputan = document.getElementById("passwordku");
                        if (inputan.type === "password") {
                            inputan.type = "text";
                        } else {
                            inputan.type = "password";
                        }
                    } 
                </script>
                <?php
                session_start();
                if (isset($_GET['error']) && $_GET['error'] == 'incorrect') {
                    echo "<script>alert('Username atau Password Salah!')</script>";
                }
                ?>
            </form>
        </fieldset>
    </div>
</body>

</html>
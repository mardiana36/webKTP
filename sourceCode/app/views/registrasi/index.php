<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_SESSION['page'] ?></title>
    <link rel="stylesheet" href="app/views/assets/css/styleUmum.css">
    <link rel="stylesheet" href="app/views/assets/css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.2/dist/aos.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="app/views/assets/js/login.js" ></script>
    <script src="app/views/assets/js/nav.js" ></script>
</head>
<body>
<main>
    <?php
    require('app/views/components/navbarUser.php')
    ?>
     <section class="container containerLogin">
            <div class="content contentLogin">
                <div class="cardLogin">
                    <div class="containerTitle">
                        <h1>Registrasi</h1>
                    </div>
                    <form action="" class="formRegis formLogin">
                        <div class="divInputLogin">
                            <label for="userName" >Username</label>
                            <input type="text" id="userName" required autocomplete="">
                            <div class="divIconLogin">
                                <i class='bx bxs-user'></i>
                            </div>
                        </div>
                        <div class="divInputLogin">
                            <label for="emailRegis" >Email</label>
                            <input type="email" id="emailRegis" required autocomplete="email">
                            <div class="divIconLogin">
                                <i class='bx bxs-envelope'></i>
                            </div>
                        </div>
                        <div class="divInputLogin">
                            <label for="passwordRegis">Password</label>
                            <input type="password" minlength="8" key="password" class="statusActive" id="passwordRegis" required autocomplete="current-password">
                            <div class="divIconLogin">
                                <i class='bx bxs-lock iconPassword'></i>
                            </div>
                            <div id="checkPassword">
                                <div><p>Mudah</p></div>
                                <div><p>Normal</p></div>
                                <div><p>Aman</p></div>
                                <div><p>Sangat Aman</p></div>
                            </div>
                        </div>
                        <div class="divBtnLogin divBtnRegis">
                            <div>
                                <input type="submit" id="btnSubmitR" value="Registrasi">
                            </div>
                        </div>
                        <div>
                            <p>Atau daftar dengan</p>
                            <div class="divOtherLogin">
                                <a href=""><i class='bx bxl-google'></i>Google</a href="">
                                <a href=""><i class='bx bxl-facebook'></i>Facebook</a href="">
                            </div>
                            <div class="linkRegisterd">
                                <p>Sudah punya akun? Silahkan <a href="login.html">Login</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <script src="app/views/assets/plugins/sweetalert/js/sweetalert.min.js"></script>
    <script src="app/views/assets/js/login.js"></script>
</body>

</html>
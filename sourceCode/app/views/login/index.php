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
<?php
    require('app/views/components/navbarUser.php')
    ?>
    <main>
        <section class="container containerLogin">
            <div class="content contentLogin">
                <div class="cardLogin">
                    <div class="containerTitle">
                        <h1>Login</h1>
                    </div>

                    <form action="index.php?action=login" method="post" class="formLogin">
                        <div class="divInputLogin">
                            <label for="emailLogin">Email / Username</label>
                            <input type="text" name="usernameOrEmail" id="emailLogin" required >
                            <div class="divIconLogin">
                                <i class='bx bxs-user'></i>
                            </div>
                        </div>
                        <div class="divInputLogin">
                            <label for="passwordLogin">Password</label>
                            <input type="password" minlength="8" key="password" name="password" class="statusActive" id="passwordLogin" required>
                            <div class="divIconLogin">
                                <i class='bx bxs-lock iconPassword'></i>
                            </div>
                            <div id="checkPassword">
                                <div>
                                    <p>Mudah</p>
                                </div>
                                <div>
                                    <p>Normal</p>
                                </div>
                                <div>
                                    <p>Aman</p>
                                </div>
                                <div>
                                    <p>Sangat Aman</p>
                                </div>
                            </div>
                        </div>
                        <div class="divForgetPw">
                            <a href="">Lupa Password</a>
                        </div>
                        <div class="divBtnLogin">
                            <div>
                                <input type="submit" id="btnSubmit" value="Masuk">
                            </div>
                        </div>
                        <div>
                            <p>Atau login dengan</p>
                            <div class="divOtherLogin">
                                <a href=""><i class='bx bxl-google'></i>Google</a href="">
                                <a href=""><i class='bx bxl-facebook'></i>Facebook</a href="">
                            </div>
                            <div class="linkRegisterd">
                                <p>Belum punya akun? Ayo <a href="index.php?action=regis">Registrasi</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <?php require("app/views/components/footersUser.php") ?>
    <script src="app/views/assets/plugins/sweetalert/js/sweetalert.min.js"></script>
    <script src="app/views/assets/js/login.js"></script>
</body>

</html>
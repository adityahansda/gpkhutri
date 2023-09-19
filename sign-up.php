<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="sign-up.css">
    <script src="https://kit.fontawesome.com/5f18765c61.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <aside class="sidebar">
            <div class="sidebar__head">
                <img height="60px" width="60px" src="/image/gp-khutri-logo-Main2.png" alt="">
                <h2 class="sidebar__title">Government Polytechnic Khutri, Bokaro</h2>
            </div>
            <div class="sidebar__image">
                <img src="https://cdn.dribbble.com/users/68398/screenshots/5699907/2.gif" />
            </div>
        </aside>
        <main class="main">
            <div class="main__inner">
                <header class="main__header">
                </header>
                <div class="main__head">
                    <span class="main__sub">STUDENT LOGIN</span>
                    <h1>Sign up to G.P Khutri</h1>
                    <p>Already a member? <a class="main__link" href="sign-up.html">Sign In</a></p>
                </div>
                <form id="Register">
                    <label for="Name">
                        Name
                        <input type="text" id="username" placeholder="College Name" name="Name">
                        <span class="icon"></span>
                    </label>
                    <label for="email">
                        Email id
                        <input type="email" id="email" placeholder="name@gmail.com" name="email">
                        <span class="icon"></span>
                    </label>
                    <label for="board_roll">
                        Board Roll
                        <input maxlength="11" type="text" id="roll" placeholder="Ex-215020500XX" name="roll">
                        <span class="icon"></span>
                    </label>
                    <label for="D.O.B">
                        D.O.B
                        <input type="date" id="dob" placeholder="D.O.B" name="dob">
                        <span class="icon"></span>
                    </label>
                    <label for="psw">
                        Password
                        <input maxlength="6" type="password" id="password" placeholder="6+ Characters, 1 Capital letter" name="password">
                        <a class="main__forg_pass" href="#">Forgot Password</a>
                        <span class="icon"></span>
                    </label>
                    <button type="submit" name="submit" id="signUp" class="btn btn--primary">Create an Account</button>
                    <button class="btn btn--outline">Sign up with Google</button>
                </form>
                <footer class="footer">
                    <small class="cap">This site is protected by CAPTCHA and the Google
                        <a class="link" href="#">Privacy Policy</a> and Terms of
                        <a class="link" href="#">Service apply</a>
                    </small>
                </footer>
            </div>
        </main>
    </div>

    <script type="module">
        // Import the functions you need from the SDKs you need
        import { initializeApp } from "https://www.gstatic.com/firebasejs/9.22.1/firebase-app.js";
        import { getDatabase, ref, set } from "https://www.gstatic.com/firebasejs/9.22.1/firebase-database.js";
//initilize Aurth 
import { getAuth } from "https://www.gstatic.com/firebasejs/9.22.1/firebase-auth.js";



        // Your web app's Firebase configuration
        const firebaseConfig = {
            apiKey: "AIzaSyCaN5_zTYlp6h9NPlJTLPziubwPPX9wzgI",
    authDomain: "gpbrightupapp-5250a.firebaseapp.com",
    databaseURL: "https://gpbrightupapp-5250a-default-rtdb.firebaseio.com",
    projectId: "gpbrightupapp-5250a",
    storageBucket: "gpbrightupapp-5250a.appspot.com",
    messagingSenderId: "534844391307",
    appId: "1:534844391307:web:78106898a99b6dbb36398e"
        };

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);

        // Get a reference to the database service
        const db = getDatabase();

        const auth = getAuth(app);

        document.getElementById("signUp").addEventListener('click', function(e) {
            e.preventDefault();

            const rollValue = document.getElementById("roll").value;
           
            set(ref(db, 'userdetails/' + rollValue), {
                username: document.getElementById("username").value,
                email: document.getElementById("email").value,
                roll: document.getElementById("roll").value,
                dob: document.getElementById("dob").value,
                password: document.getElementById("password").value
            });

            alert("Login Successful!");
        });
    </script>
</body>

</html>




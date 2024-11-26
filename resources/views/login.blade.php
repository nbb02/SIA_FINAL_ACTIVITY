
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="icon" href="./public/favicon.jpg" type="image/x-icon">
        <link
            href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap"
            rel="stylesheet"
        />
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Poppins", sans-serif;
            overflow: hidden;
        }

        .wave {
            position: fixed;
            bottom: 0;
            left: 0;
            height: 100%;
            z-index: -1;
        }

        .container {
            width: 100vw;
            height: 100vh;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 7rem;
            padding: 0 2rem;
        }

        .img {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .login-content {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            text-align: center;
        }

        .img img {
            width: 500px;
        }

        form {
            width: 360px;
        }

        .login-content img {
            height: 100px;
        }

        .login-content h2 {
            margin: 15px 0;
            color: #333;
            text-transform: uppercase;
            font-size: 2.9rem;
        }

        .login-content .input-div {
            position: relative;
            display: grid;
            grid-template-columns: 7% 93%;
            margin: 25px 0;
            padding: 5px 0;
            border-bottom: 2px solid #d9d9d9;
        }

        .login-content .input-div.one {
            margin-top: 0;
        }

        .i {
            color: #d9d9d9;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .i i {
            transition: 0.3s;
        }

        .input-div > div {
            position: relative;
            height: 45px;
        }

        .input-div > div > h5 {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 18px;
            transition: 0.3s;
        }

        .input-div:before,
        .input-div:after {
            content: "";
            position: absolute;
            bottom: -2px;
            width: 0%;
            height: 2px;
            background-color: #38d39f;
            transition: 0.4s;
        }

        .input-div:before {
            right: 50%;
        }

        .input-div:after {
            left: 50%;
        }

        .input-div.focus:before,
        .input-div.focus:after {
            width: 50%;
        }

        .input-div.focus > div > h5 {
            top: -5px;
            font-size: 15px;
        }

        .input-div.focus > .i > i {
            color: #38d39f;
        }

        .input-div > div > input {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            border: none;
            outline: none;
            background: none;
            padding: 0.5rem 0.7rem;
            font-size: 1.2rem;
            color: #555;
            font-family: "poppins", sans-serif;
        }

        .input-div.pass {
            margin-bottom: 4px;
        }

        a {
            display: block;
            text-align: right;
            text-decoration: none;
            color: #999;
            font-size: 0.9rem;
            transition: 0.3s;
        }

        a:hover {
            color: #38d39f;
        }

        .btn {
            display: block;
            width: 100%;
            height: 50px;
            border-radius: 25px;
            outline: none;
            border: none;
            background-image: linear-gradient(
                to right,
                #32be8f,
                #38d39f,
                #32be8f
            );
            background-size: 200%;
            font-size: 1.2rem;
            color: #fff;
            font-family: "Poppins", sans-serif;
            text-transform: uppercase;
            margin: 1rem 0;
            cursor: pointer;
            transition: 0.5s;
        }

        .btn:hover {
            background-position: right;
        }

        @media screen and (max-width: 1050px) {
            .container {
                grid-gap: 5rem;
            }
        }

        @media screen and (max-width: 1000px) {
            form {
                width: 290px;
            }

            .login-content h2 {
                font-size: 2.4rem;
                margin: 8px 0;
            }

            .img img {
                width: 400px;
            }
        }

        @media screen and (max-width: 900px) {
            .container {
                grid-template-columns: 1fr;
            }

            .img {
                display: none;
            }

            .wave {
                display: none;
            }

            .login-content {
                justify-content: center;
            }
        }
        .change_theme {
            position: absolute;
            background-color: transparent;
            padding: .5em 1em;
            font-size: 1em;
            border: 2px solid #38d39f;
            color: #32be8f;
            font-weight: 500;
            border-radius: 0.5em;
            bottom: 1em;
            left: 50%;
            transform: translate(-50%, 0);
            background-color: white;
            box-shadow: 0 0 10px #38d39f;
            font-weight: 550;

            &:hover {
                font-size: 1.1em;
                color: white;
                background-color: #32be8f;
                box-shadow: 0 0 30px #38d39f;
                border: 2px solid white;
            }
        }

        .creds:has(input:not(:placeholder-shown))   {
            h5 {
                top: -5px;
                font-size: 15px;
            }
        }

        .creds input::placeholder{
            opacity: 0;
        }

        .errors {
            color:red;
            font-weight: bold;
            border: 2px solid red;
            border-radius: 0.25em;
            background-color: rgba(255, 155, 155, 0.281);
            height: max-content;
            margin-bottom: 2em;
        }
    </style>
    <body>
        <img
            class="wave"
            src="https://raw.githubusercontent.com/sefyudem/Responsive-Login-Form/master/img/wave.png"
        />
        <div class="container">
            <div class="img">
                <img
                    src="https://raw.githubusercontent.com/sefyudem/Responsive-Login-Form/master/img/bg.svg"
                />
            </div>
            <div class="login-content">
                <form action="/login" method="POST">
                    @csrf
                    @if ($errors->any())
                    <div class="errors">
                        @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                    @endif
                    <img
                        src="https://raw.githubusercontent.com/sefyudem/Responsive-Login-Form/master/img/avatar.svg"
                    />
                    <h2 class="title">Welcome</h2>
                    <div class="input-div one">
                        <div class="i">
                            <i class="fas fa-user"></i>
                        </div>
                            <div class="creds">
                            <h5>Email</h5>
                            <input
                                name="email"
                                type="email"
                                class="input"
                                required
                                value="{{ old('email') }}"
                                placeholder="email"
                            />
                        </div>
                    </div>
                    <div class="input-div pass">
                        <div class="i">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="creds">
                            <h5>Password</h5>
                            <input
                                name="password"
                                type="password"
                                class="input"
                                required
                                placeholder="password"
                            />
                        </div>
                    </div>
                    <input type="submit" class="btn" value="Login" />
                </form>
            </div>
            <button class="change_theme">Change Theme</button>
        </div>
        <script>
            const inputs = document.querySelectorAll(".input");

            function addcl() {
                let parent = this.parentNode.parentNode;
                parent.classList.add("focus");
            }

            function remcl() {
                let parent = this.parentNode.parentNode;
                if (this.value == "") {
                    parent.classList.remove("focus");
                }
            }

            inputs.forEach((input) => {
                input.addEventListener("focus", addcl);
                input.addEventListener("blur", remcl);
            });

            document
                .querySelector(".change_theme")
                .addEventListener("click", function () {
                    let theme = getCookie("login_theme");
                    if (theme === "") {
                        theme = 1;
                    } else {
                        theme = theme == 1 ? 0 : 1;
                    }
                    setCookie("login_theme", theme);
                    location.reload();
                });

            function setCookie(name, value) {
                const expires = new Date();
                expires.setTime(expires.getTime() + 30 * 24 * 60 * 60 * 1000);
                document.cookie = `${name}=${value};expires=${expires.toUTCString()};path=/`;
            }

            function getCookie(name) {
                const value = `; ${document.cookie}`;
                const parts = value.split(`; ${name}=`);
                if (parts.length === 2) return parts.pop().split(";").shift();
                return "";
            }
        </script>
    </body>
</html>

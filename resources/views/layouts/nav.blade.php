<link rel="stylesheet" href="{{ env('LOCAL') ? '' : '/public' }}/css/styles.css">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Geist:wght@100..900&family=Niramit:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&family=Pixelify+Sans:wght@400..700&display=swap');

    * {
        box-sizing: border-box;
    }

    .main-nav {
        display: flex;
        align-items: center;
        width: 100%;
        padding: 1em 1em;
        padding-left: 2rem;
        gap: 1em;

        >h1 {
            margin: 0;
        }

        :nth-child(2) {
            margin-left: auto;
        }
    }

    .title {
        margin-right: auto;
    }

    .button {
        color: var(--text);
        font-family: "Niramit";
        font-size: 0.9rem;

        height: 50px;
        width: 150px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        position: relative;
        overflow: hidden;

        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
        transition: all 0.5s ease-in-out;
    }

    .type1::after {
        content: "New Resume";
        height: 50px;
        width: 150px;
        background-color: var(--accent);
        position: absolute;
        top: 0%;
        left: 0%;
        transform: translateY(50px);
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.5s ease-in-out;
    }

    .type1::before {
        content: "Add";
        height: 50px;
        width: 150px;
        background-color: var(--secondary);
        position: absolute;
        top: 0%;
        left: 0%;
        transform: translateY(0px) scale(1.2);
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.5s ease-in-out;
    }

    .type1:hover::after {
        transform: translateY(0) scale(1.2);
    }

    .type1:hover::before {
        transform: translateY(-50px) scale(0) rotate(120deg);
    }

    .button:active {
        margin-top: 0.5rem;
        transition: margin-top 0.18s ease-in-out;
    }

    .Btn {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        width: 45px;
        height: 45px;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        transition-duration: 0.3s;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
        background-color: var(--secondary);
        margin: 0 1rem;
    }

    .sign {
        width: 100%;
        transition-duration: 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .sign svg {
        width: 19px;
    }

    .sign svg path {
        fill: var(--text);
    }

    .text {
        position: absolute;
        right: 0%;
        width: 0%;
        opacity: 0;
        color: var(--text);
        font-size: 1.2em;
        font-weight: 600;
        transition-duration: 0.3s;
    }

    .Btn:hover {
        width: 125px;
        border-radius: 40px;
        background-color: var(--accent);
        transition-duration: 0.3s;
    }

    .Btn:hover .sign {
        width: 30%;
        transition-duration: 0.3s;
        padding-left: 20px;
    }

    .Btn:hover .text {
        opacity: 1;
        width: 70%;
        transition-duration: 0.3s;
        padding-right: 10px;
    }

    .Btn:active {
        transform: translate(3px, 3px);
    }

    .logout_card {
        position: relative;

        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;

        width: 300px;
        height: fit-content;
        background: var(--accent);
        border-radius: 20px;
        gap: 20px;
        padding: 30px;
        padding-top: 8rem;
        position: relative;
        box-shadow: 20px 20px 30px rgba(0, 0, 0, 0.068);
    }

    .thinking-icon {
        position: absolute;
        left: 50%;
        top: -40%;
        transform: translateX(-50%)
    }

    .card-content {
        width: 100%;
        height: fit-content;
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .card-heading {
        font-size: 20px;
        font-weight: 700;
        color: var(--text);
    }

    .card-description {
        font-weight: 400;
        color: var(--text);
    }

    .card-button-wrapper {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .card-button {
        width: 50%;
        height: 35px;
        border-radius: 10px;
        border: none;
        cursor: pointer;
        font-weight: 600;
    }

    .primary {
        background-color: var(--primary);
        color: var(--text);
    }

    .primary:hover {
        background-color: var(--text);
        color: var(--primary);
    }

    .secondary {
        background-color: var(--secondary);

    }

    .secondary:hover {
        background-color: var(--text);
        color: var(--primary);
    }

    .background {
        z-index: -1;
    }

    .main-nav {
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.199);
        height: 5em;
        min-height: max-content;
        flex-wrap: wrap;
    }

    .modal {
        z-index: 10;

        img {
            height: 100%;
        }
    }
</style>
<div class="modal"
    style="position: fixed; top:50%;left:50%; transform:translate(-50%,-50%); background-color: white;
border-radius: 0.25em; border: 2px solid black; padding:0.5em; display:none; width:max-content">
</div>
<nav class="main-nav">
    <h1 class="title">Welcome @yield('user')</h1>
    @yield('elements')

    @if (Request::path() == 'dashboard')
        <button class="button type1" id="add_resume"></button>
    @endif
    <button class="Btn" id="logout">
        <div class="sign">
            <svg viewBox="0 0 512 512">
                <path
                    d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z">
                </path>
            </svg>
        </div>
        <div class="text">Logout</div>
    </button>
    <script>
        const resumeBtn = document.querySelector('#add_resume')
        if (resumeBtn) {
            resumeBtn.addEventListener('click', function() {
                window.location.href = '/add_resume';
            });
        }

        document.querySelector('#logout').addEventListener('click', function() {
            document.querySelector('.modal').innerHTML = `
                <div class="logout_card">
                    <div class="card-content">
                        <img class="thinking-icon" src="{{ env('LOCAL') ? '' : '/public' }}/icons/thinking.svg" height="350">
                        <p class="card-heading">Continue?</p>
                        <p class="card-description">Are you sure you want to log out?</p>
                    </div>
                    <div class="card-button-wrapper">
                        <button class="card-button secondary" id="cancel-logout" >Cancel</button>
                        <button class="card-button primary" id="confirm-logout">Log out</button>
                    </div>
                </div>
            `;
            document.querySelector('.modal').style.display = 'flex';
            document.querySelector('#confirm-logout').addEventListener('click', function() {
                window.location.href = '/logout';
            });

            document.querySelector('#cancel-logout').addEventListener('click', function() {
                document.querySelector('.modal').style.display = 'none';
            });
        });
    </script>

</nav>

<style>
    .main-nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.5em 1em;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }
</style>
<nav class="main-nav">
    <h1>Hello @yield('user')</h1>
    @yield('elements')
    <button id="logout">Log Out</button>
    <script>
        document.querySelector('#logout').addEventListener('click', function() {
            document.querySelector('.modal').innerHTML = `
                <div class="modal-content">
                <p>Are you sure you want to log out?</p>
                <button id="confirm-logout">Yes</button>
                <button id="cancel-logout">No</button>
                </div>
            `;
            document.querySelector('.modal').style.display = 'block';
            document.querySelector('#confirm-logout').addEventListener('click', function() {
                window.location.href = '/logout';
            });

            document.querySelector('#cancel-logout').addEventListener('click', function() {
                document.querySelector('.modal').style.display = 'none';
            });
        });
    </script>
</nav>
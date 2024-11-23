<style>
    .main-nav {

        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.5em 1em;
        background-color:white;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        gap:0.5em;
    
        p {
            color:black;
            font-size:1.2em;
            font-family: "Josefin Sans", sans-serif;  
        }
        
        :nth-child(2){
            margin-left:auto;
        }
        
    }
    #logout{
        color : red;
        background-color:white;
        font-weight: bold;
        padding :0.5em 1em;
        border:1px solid red;
        border-radius:0.25em;
        
        &:hover {
            color:white;
            background-color:red;
        }
    }
</style>
<nav class="main-nav">
    <p>Hello @yield('user')</p>
    @yield('elements')
    <button id="logout">Log Out</button>
    <script>
        document.querySelector('#logout').addEventListener('click', function() {
            document.querySelector('.modal').innerHTML = `
                
                <p>Are you sure you want to log out?</p>
                <footer>
                <button class="yes">Yes</button>
                <button class="no">No</button>
                </footer>
                
            `;
            document.querySelector('.modal').style.display = 'block';
            document.querySelector('.yes').addEventListener('click', function() {
                window.location.href = '/logout';
            });

            document.querySelector('.no').addEventListener('click', function() {
                document.querySelector('.modal').style.display = 'none';
            });
        });
    </script>
</nav>
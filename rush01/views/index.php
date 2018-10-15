<!DOCTYPE html>
<html>
<head>
    <title>Battle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="../styles/main.css" type="text/css" rel="stylesheet">
    <script src='https://code.jquery.com/jquery-3.3.1.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../scripts/main.js" type="text/javascript"></script>
</head>
<body>
    <div id="wrapper">
        <header>
            <nav class="overlined">
                <ul>
                    <li><img src="../images/circled-play-filled.png"></li>
                    <li><a href="#">PLAY
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </a></li>
                    <li><a  href="#" onclick="openBox('loginBox');return false;">USERS
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </a></li>
                    <li><a href="#" onclick="docBox('docBox');return false;">DOC
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </a></li>
                    <li><a href="#">ABOUT US
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </a></li>
                </ul>
            </nav>
        </header>
    </div>
    <div class="content">
        <canvas></canvas>
                    <script src='../scripts/ship.js'></script>
        <img id='me' src='../images/ship.png'>
        <img id='enemy' src='../images/ship.png'>
        <img id='aster' src='../images/aster.gif'>
    </div>
    <div class="content1">
            <table id="table">
                <tr class="menu"><td><h2>Player #1</h2></td></tr>
                <tr class="menu">
        <td><a href="#" id='move1'>Move
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </a></td>
                </tr>
                <tr class="menu">
        <td><a href="#" id='clockRotation1'>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </a></td>
                </tr>
                <tr class="menu">
        <td><a href="#" id='antiClockRotation1'>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </a></td>
                </tr>
                <tr class="menu">
                    <td><a href="#" id='shoot1'>Shoot
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </a></td>
                </tr>
                <tr class="menu"><td><hr></td></tr>
                <tr class="menu"><td><h2>Player #2</h2></td></tr>
                <tr class="menu">
                <td><a href="#" id='move2'>Move
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </a></td>
                </tr>
                <tr class="menu">
                    <td><a href="#" id='clockRotation2'>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </a></td>
                </tr>
                <tr class="menu">
                    <td><a href="#" id='antiClockRotation2'>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </a></td>
                </tr>
                <tr class="menu">
                    <td><a href="#" id='shoot2'>Shoot
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </a></td>
                </tr>
                <br>
                <tr class="menu">
                    <td><button id='end'>End</button></td></tr>
            </table>
        </div>
    <div id="docBox" style="display: none;">
        <div id="docBoxContent">
            <div class="close" onclick="openBoxCreate('docBox')">close</div>
            <h1>Instructions</h1>
            <div class="form">
                <form class="login-form">
                  bla-bla
                    <p class="message">Have fun!</p>
                </form>
            </div>
        </div>
    </div>
<section></section>
        <div id="loginBox" style="display: none;">
            <div id="loginBoxContent">
                <div class="close" onclick="openBox('loginBox')">close</div>
                <h1>Login to your account</h1>
                <div class="form">
                    <form action="#" method="post" class="login-form">
                        <input type="text" placeholder="username" name = "user"/>
                        <input type="password" required placeholder="password" name = "pass"/>
                        <button type="submit"><span>OK</span></button>
                        <p class="message">Not registered? <a href="#" onclick="openBox('loginBox'); openBoxCreate('createBox');return false;">Create an account</a></p>
                    </form>
                </div>
            </div>
        </div>
        <div id="createBox" style="display: none;">
            <div id="createBoxContent">
                <div class="close" onclick="openBoxCreate('createBox')">close</div>
                <h1>Create new account</h1>
                <div class="form">
                    <form action="#" method="post" class="login-form">
                        <input type="text" placeholder="username" name = "user"/>
                        <input type="text" placeholder="email" name = "email"/>
                        <input type="password" required placeholder="password" name = "pass"/>
                        <button type="submit" onclick="openBoxCreate('createBox');openBox('loginBox');"><span>OK</span></button>
                        <p class="message">Enjoy!</p>
                    </form>
                </div>
            </div>
        </div>
        <div id="usersBox" style="display: none;">
            <div id="usersBoxContent">
                <div class="close" onclick="openBoxCreate('usersBox')">close</div>
                <h1>Create new account</h1>
                <div class="form">
                    <form action="#" method="post" class="login-form">
                        <input type="text" placeholder="nick" name = "nick"/>
                        <input type="text" placeholder="username" name = "user"/>
                        <input type="text" placeholder="email" name = "email"/>
                        <input type="password" required placeholder="password" name = "pass"/>
                        <button type="submit"><span>OK</span></button>
                        <p class="message">Enjoy!</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

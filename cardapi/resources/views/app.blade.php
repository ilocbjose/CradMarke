<html>
    <head>
        <title> @yield('Card Market')</title>

    <link rel="icon" href="https://img2.freepng.es/20180723/oor/kisspng-magic-the-gathering-duels-of-the-planeswalker-magic-the-gathering-logo-5b55c4287f14b0.3599000515323474325205.jpg" type="image/gif" sizes="16x16">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body class="cyan lighten-3">
        <nav class="purple darken-1">
            <div class="nav-wrapper">
              <a href="http://127.0.0.1:90/CradMarke/cardapi/public/" class="brand-logo center">Card Market</a>
              <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="http://127.0.0.1:90/CradMarke/cardapi/public/search">Search</a></li>
                <li><a href="http://127.0.0.1:90/CradMarke/cardapi/public/login">Login</a></li>
                <li><a href="http://127.0.0.1:90/CradMarke/cardapi/public/createCard">Create Card</a></li>
                <li><a href="http://127.0.0.1:90/CradMarke/cardapi/public/createSell">Create Sell</a></li>
                <li><a href="http://127.0.0.1:90/CradMarke/cardapi/public/createCollection">Create Collection</a></li>
              </ul>
            </div>
          </nav>
        <div class="container">
            @yield('content')
        </div>
    </body>

    <style type="text/css"> 
        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            }
    </style>

    <footer class="page-footer purple darken-1">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Card Market</h5>
                <p class="grey-text text-lighten-4">Tu mercado de cartas de confianza.</p>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2021 Copyright CardMarket
            <a class="grey-text text-lighten-4 right" href="https://github.com/ilocbjose/CradMarke.git">Github</a>
                <div class="col s6">
                    <form action="http://127.0.0.1:90/CradMarke/cardapi/public/api/user" method="POST">
                        <center>
                        <button class="btn waves-effect waves-light" name="send" value="Submit" type="submit">Profile
                            <i class="material-icons right">account_circle</i>
                        </button>
                        </center>
                    </form>
                </div>
            </div>
          </div>
        </footer>
</html>
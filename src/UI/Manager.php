<?php

class Manager
{

    public static function getHtml($page,$wyloguj = '<li><a href="app/login.php?logout=1">Wyloguj</a></li>')
    {
        $main = require($page.'.php');
        return manager::html($main,$wyloguj);
    }

    public static function setHtml($html,$wyloguj = '<li><a href="app/login.php?logout=1">Wyloguj</a></li>')
    {
        return manager::html($html,$wyloguj);
    }

    public static function html($main,$wyloguj)
    {
        $html = <<< HTML
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="UI/css/a.css">
</head>
<body>
    <div class="wrapper">
    
        <header role="banner">
            <nav role="navigation">
                <h1><a href="#">Quiz</a></h1>
                <ul class="nav-ul-header">
                    {$wyloguj}
                </ul>
            </nav>
        </header>

        
        <main role="main">

        {$main}

        </main>
    </div>
    <footer>
        <p class="copy">&copy; Paweł Mierzwiński</p>
    </footer>
</body>
</html>
HTML;
        return $html;
    }
}

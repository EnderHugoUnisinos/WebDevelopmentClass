<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="icon" type="image/x-icon" href="/imgs/favicon.png">
    <link rel="stylesheet" href="/css/styles.css">
    <script>
        const forum_name = "Forum"
        const page_name = "Home"
        document.title = `${forum_name} - ${page_name}`;
    </script>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="img-container">
                <a href="/home">
                    <img src="/imgs/favicon.png" alt="forum logo">
                </a>
            </div>
            <div class="main-title">
                <h1>Forum header</h1>
            </div>
        </div>
        <div class="navbar-container">
                <a href="/home">
                    <div class="link-btn">
                        Forums
                    </div>
                </a>
                <a href="/profile">
                    <div class="link-btn">
                        Profile
                    </div>
                </a>
                <a href="/map">
                    <div class="link-btn">
                        Map
                    </div>
                </a>
                <a href="/mail">
                    <div class="link-btn">
                        Mail
                    </div>
                </a>
        </div>
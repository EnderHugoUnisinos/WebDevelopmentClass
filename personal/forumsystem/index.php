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
                <img src="/imgs/favicon.png" alt="forum logo">
            </div>
            <div class="main-title">
                <h1>Forum header</h1>
            </div>
        </div>
        <div class="navbar-container">
            <a href="">Link 1</a>
            <a href="">Link 2</a>
            <a href="">Link 3</a>
            <a href="">Link 4</a>
        </div>
        <div class="path-container">
            <span class="forum-path"><p>Path -> Path</p></span>
        </div>
        <div class="forum-container">
            <div class="forum-top">
                <div class="topic-title forum-cell">Topic</div>
                <div class="reply-count forum-cell">Replies</div>
                <div class="author-name forum-cell">Author</div>
                <div class="last-reply forum-cell">Last reply</div>
            </div>
            <div class="forum-post">
                <div class="topic-title forum-cell">Topic name</div>
                <div class="reply-count forum-cell">2</div>
                <div class="author-name forum-cell">Ender Hugo</div>
                <div class="last-reply forum-cell">Sat Mar 22, 1998 08:17 pm</div>
            </div>
            <div class="forum-post">
                <div class="topic-title forum-cell">Topic name</div>
                <div class="reply-count forum-cell">0</div>
                <div class="author-name forum-cell">Ender Hugo</div>
                <div class="last-reply forum-cell">Sat Mar 22, 1998 09:39 pm</div>
            </div>
        </div>
        <div class="footer">
            <p>Developed by Ender Hugo - All rights reserved (1998).</p>
        </div>
    </div>
</body>
</html>

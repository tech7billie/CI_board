<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <title>CodeIgniter</title>
     
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

    </head>
    <body>
        <div id="main">
            <header id="header" data-role="header" data-position="fixed">
                <blockquote>
                    <p>
                        만들면서 배우는 CodeIgniter
                    </p>
                    <small>실행 예제</small>
                </blockquote>
            </header>
            <nav id="gnb">
                <ul>
                    <li>
                        <a rel="external" href="/bbs/<?php echo $this -> uri -> segment(1); ?>/lists/<?php echo $this -> uri -> segment(3); ?>"> 게시판 프로젝트 </a>
                    </li>
                </ul>
            </nav>
 
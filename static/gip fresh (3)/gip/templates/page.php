<?php
// De html template van de pagina
return "<!Doctype html>
<html>
<head>
<title>$pagedata->title</title>
<met http-equiv='content-Type' content='text/html;charset=utf-8'/>
$pagedata->css
</head>
<body>
$pagedata->content
</body>
</html>";
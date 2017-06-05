<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" content="text/html" http-equiv="CONTENT-TYPE">
    <title>Movies</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    {block name="header"}{/block}
</head>
<body>
<div class="container">
    <div class="container-fluid">
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">Movies</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="/?page=add">Add new movie</a></li>
                <li><a href="/?page=import-data">Import data</a></li>
            </ul>
        </nav>
        <div>
            {block name="content"}{/block}
        </div>
    </div>
</div>
</body>
</html>





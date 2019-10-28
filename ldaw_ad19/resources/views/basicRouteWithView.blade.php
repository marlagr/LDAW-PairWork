<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <h1>Route Using View Template</h1>

        <h2>Welcome <?php echo $name; ?></h2>

        <p>
            This route is a basic route (constant string pattern and closure as parameters) which loads it response (HTML)
            from a template located at "resources/views/basicRouteWithView.blade.php"
        </p>
    </body>
</html>

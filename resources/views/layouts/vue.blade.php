<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Tasks</title>
        <meta name="description" content="Tasks">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script>
            window.Laravel = {!!  json_encode(['csrfToken' => csrf_token()]) !!};
        </script>
    </head>
    <body>
        <div id="app">
            @yield('vue')
        </div>
        <link rel="stylesheet" href="css/app.css">
        <script src="js/app.js"></script>
    </body>
</html>

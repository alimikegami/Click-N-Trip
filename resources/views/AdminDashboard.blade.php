<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="stylesheet" href="{{asset('css/AdminDashboard.css')}}">
    <title>Admin Dashboard</title>
</head>
<body>
    <div class="container-fluid wrapper">
        <div class="row">
            <div class="col-2">
                <nav class='bg-dark' id="sidebar">
                    <ul>
                        <li class='mb-3'>
                            <a href="#">Profile</a>
                        </li>
                        <li class='mb-3'>
                            <a href="#">Tour Guide List</a>
                        </li>
                        <li class='mb-3'>
                            <a href="#">Tour Guide Requests</a>
                        </li>
                        <li class='mb-3'>
                            <a href="#">User List</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col">
                <h1>Content Here</h1>
            </div>
        </div>
    </div>
</body>
</html>
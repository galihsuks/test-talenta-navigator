<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Test Talenta Navigator')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Outfit:wght@100;300;400;500;700;900&display=swap");

        * {
            font-family: "Outfit", sans-serif;
            /* --merah: #db4444; */
            --merah: #df2e38;
            --merahLogo: #b00404;
            --hijaumuda: #f2fbf4;
            --hijaumuda1: #ddf7e3;
            --hijaumuda2: #c7e8ca;
            --hijau: #1db954;
            --bck: #f5f5f5;
        }

        .konten {
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            border-radius: 2em;
            width: 80%;
        }

        .btn-icon {
            text-decoration: none;
            color: white;
            background-color: var(--hijau);
            display: flex;
            gap: 0.5em;
            align-items: center;
            justify-content: center;
            padding: 0.7em 1em;
            border-radius: 1em;
            transition: 0.2s;
        }

        .btn-icon:hover {
            background-color: var(--hijaumuda2);
            color: var(--hijau);
            transition: 0.2s;
        }

        .btn-icon i {
            display: block;
            width: fit-content;
        }

        .btn-icon p {
            margin: 0;
        }

        .btn-icon.outline {
            color: var(--hijau);
            background: none;
            border: 1px solid var(--hijau);
            transition: 0.2s;
        }

        .btn-icon.outline:hover {
            background-color: var(--hijau);
            color: white;
            transition: 0.2s;
        }

        .item-movie {
            display: flex;
            justify-content: space-between;
            align-items: end;
            text-decoration: none;
            color: black;
            transition: 0.2s;
            /* border: 1px solid rgba(0, 0, 0, 0.3); */
        }

        .item-movie:hover {
            transition: 0.2s;
            color: var(--hijau);
        }

        .item-movie p {
            margin: 0;
        }

        .genre {
            display: block;
            width: fit-content;
            background-color: var(--hijaumuda1);
            padding: 0.4em 1em;
            border-radius: 2em;
        }
    </style>
</head>

<body style="height: 100svh; width: 100vw;" class="d-flex justify-content-center align-items-center">
    <div class="konten p-5">
        <div class="d-flex align-items-center gap-3 mb-3">
            <p class="text-secondary mb-1" style="width: fit-content;">Test Talenta Navigator</p>
            <span class="d-block" style="flex: 1; height: 1px; background-color: rgba(0,0,0,0.3)"></span>
        </div>
        <main>
            @yield('content')
        </main>
    </div>
</body>

</html>
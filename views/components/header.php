<html>
<head>
    <title>title</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<header class="bg-blue-800 text-gray-50">
    <div class="container mx-auto flex justify-between items-center py-4">
        <div>
            <h1 class="inline">LOGO</h1>
            <h2 class="inline">Company Name</h2>
        </div>

        <div>
            <nav>
                <ul class="flex gap-2">
                    <li class="<?= $uri == '/' ?  'bg-blue-600' :  '' ?> py-1 px-2 rounded-md"><a href="/">Home</a><li>
                    <li class="<?= $uri == '/about' ?  'bg-blue-600' :  '' ?> py-1 px-2 rounded-md"><a href="about">About</a><li>
                    <li class="<?= $uri == '/notes' ?  'bg-blue-600' :  '' ?> py-1 px-2 rounded-md"><a href="notes">Notes</a><li>
                    <li class="<?= $uri == '/contacts' ?  'bg-blue-600' :  '' ?> py-1 px-2 rounded-md"><a href="contacts">Contacts</a><li>
                </ul>
            </nav>
        </div>
    </div>
</header>

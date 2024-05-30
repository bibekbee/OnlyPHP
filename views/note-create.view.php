<?php require 'views/components/header.php' ?>
<main class="container mx-auto my-10">
<div class="mb-5">
    <p>Create a new note</p>
</div>
<div>
    <form class="flex flex-col w-1/4" action="" method="POST">
        <label for="note"><b>New Note:</b></label>
        <div>
        <input class="pl-2 border-2 rounded-md border-gray-200 mt-2" type="text" name="note" placeholder="write a new note here..."/>
        </div>
        <input class="py-2 px-4 text-sm rounded-md bg-blue-500 text-gray-50 w-1/4 mt-6" type="submit"/>
    </form>
</div>
</main>
</body>
</html>
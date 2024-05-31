<?php view('components/header.php') ?>
<main class="container mx-auto my-10">
<div class="mb-5 flex justify-between">
    <p>Create a new note</p>
    <a class="text-blue-500 underline" href="/notes"><?=$message?></a>
</div>
<div>
    <form class="flex flex-col w-1/4" action="/note/store" method="POST">
        <label for="note"><b>New Note:</b></label>
        <div>
        <textarea id="note" class="border-2 rounded-md border-gray-200 mt-2" name="note" rows="4" cols="50" placeholder="Enter your message here...">
        <?= $input != '' ? $input : '' ?>
        </textarea>
        <p class="mt-1 text-sm text-red-600">
            <?php echo empty($errors) ? '' : $errors['name']; ?>
        </p>
        </div>
        <input class="py-2 px-4 text-sm rounded-md bg-blue-500 text-gray-50 w-1/4 mt-4" type="submit"/>
    </form>
</div>
</main>
</body>
</html>
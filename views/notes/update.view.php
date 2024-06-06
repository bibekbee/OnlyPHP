<?php view('components/header.php') ?>
<main class="container mx-auto my-10">
<div class="mb-5 flex justify-between">
    <p>Create a new note</p>
    <a class="text-blue-500 underline" href="/notes"><?=$message?></a>
</div>
<div>
    <form class="flex flex-col w-1/4" action="/note/update" method="POST">
        <label for="note"><b>New Note:</b></label>
        <div>
        <input class="hidden" type="text" name="id" value="<?= $id ?>"/>
        <input class="hidden" type="text" name="__method" value="PATCH"/>
        <textarea id="note" class="border-2 rounded-md border-gray-200 mt-2" name="note" rows="4" cols="50" placeholder="Enter your message here...">
        <?php echo old('note') == '' ?  $input : old('note');?>
        </textarea>
        <p class="mt-1 text-sm text-red-600">
            <?php echo empty($errors) ? '' : $errors['name']; ?>
        </p>
        </div>
        <div class="flex gap-3 mt-4">
        <input class="py-2 px-4 text-sm rounded-md bg-blue-500 text-gray-50 w-1/4" type="submit" value="Update"/>
        <button form="delete" class="text-sm text-red-500 border-2 border-red-500 py-1 px-2 rounded-md cursor-pointer">Delete</button>
        <a href="/notes" class="text-sm text-gray-50 bg-gray-500 pt-2 px-2 rounded-md cursor-pointer">Cancle</a>
        </div>
    </form>

    <form id="delete" action="/note" method="post">
        <input class="hidden" type="text" name="id" value="<?= $id?>"/>
        <input class="hidden" type="text" name="__method" value="DELETE"/>
    </form>

</div>
</main>
</body>
</html>
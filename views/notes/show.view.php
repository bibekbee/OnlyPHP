<?php view('components/header.php') ?>
<main class="container mx-auto my-10">
<div class="mb-5">
    <a class="text-blue-600 underline" href="/notes">Back</a>
</div>
<div>
    <p><?php echo $result['title'] ?></p>
</div>
<div class="mt-4">
<a class="text-md text-gray-500 border-2 border-gray-500 py-1 px-2 rounded-md mt-4 cursor-pointer" href="note/edit?id=<?=$result['id']?>">Edit</a>
</div>

</main>
</body>
</html>
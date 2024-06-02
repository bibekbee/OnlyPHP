<?php view('components/header.php') ?>
<main class="container mx-auto my-10">
<div class="mb-5 flex justify-between items-center">
    <h1>Welcome to the Notes Page <?=$_SESSION['name'] ?? 'Guest'?></h1>
    <a href="/note/create"><button class="py-2 px-4 text-sm rounded-md bg-blue-500 text-gray-50">Create note</button></a>
</div>
<div class="mb-5">
    <ul class="flex flex-col">
    <?php
    foreach($results as $result){
    echo "<a class='text-blue-600 underline' href='note?id={$result['id']}'"."<li>". $result['title'] ."</li>"."</a>"; 
    }
    ?>
    </ul>
</div>
</main>
</body>
</html>
<?php require 'views/components/header.php' ?>
<main class="container mx-auto my-10">
<div>
    <h1>Welcome to the Notes Page</h1>
</div>
<div>
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
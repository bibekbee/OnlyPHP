<?php require 'views/components/header.php' ?>
<main class="container mx-auto my-10">
<div>
    <h1>Welcome to the Notes Page</h1>
</div>
<div>
<?php
 echo "<ul>";
 foreach($results as $result){
 echo "<li>". $result['title'] ."</li>"; 
 }
 echo "</ul>";
?>
</div>
</main>
</body>
</html>
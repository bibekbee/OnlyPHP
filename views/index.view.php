<?php require 'views/components/header.php' ?>


    <main class="container mx-auto">
    <div>
        <?php include 'app.php' ?>
        <?php foreach( $getitems as $item) : 
            ?>
            <h1><?= $item?> </h1>
        <?php endforeach?>
       
        <h2>Howdy</h2>
    </div>
    </main>
</body>
</html>

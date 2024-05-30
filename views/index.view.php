<?php view('components/header.php') ?>


    <main class="container mx-auto my-10">
    <div>
        <?php foreach( $getitems as $item) : 
            ?>
            <h1><?= $item?> </h1>
        <?php endforeach?>
        <h2>Howdy</h2>
    </div>
    </main>
</body>
</html>

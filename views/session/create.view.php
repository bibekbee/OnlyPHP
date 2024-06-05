<?php view('components/header.php') ?>
<main class="container mx-auto my-10">
<div class="mb-5 flex justify-between">
    <p>Login: </p>
</div>
<div>
    <form class="flex flex-col w-1/4" action="" method="POST">
        <label for="user"><b>Email:</b></label>
        <input class="border-2 border-gray-500" type="email" name="email" id="user"/>
        <p class="mt-1 text-sm text-red-600">
            <?php echo empty($errors) ? '' : $errors['email']; ?>
        </p>
        
        <label for="pass"><b>Password:</b></label>
        <input class="border-2 border-gray-500" type="password" name="password" id="pass"/>
        <p class="mt-1 text-sm text-red-600">
            <?php echo empty($errors) ? '' : $errors['pass']; ?>
        </p>
        <input class="py-2 px-4 text-sm rounded-md bg-blue-500 text-gray-50 w-1/4 mt-4" type="submit"/>
    </form>
</div>
</main>
</body>
</html>
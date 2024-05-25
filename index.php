<html>
<head>
    <title>title</title>
</head>
<body>
    <?php
        $greetings = ['Hello, World','Hello, Planet','Hello, Earth' ,1 ,2];

        function get($items){
            $string_greetings = [];
            foreach($items as $item){
            if(is_string($item)){
                array_push($string_greetings, $item);
            }
            }
            return $string_greetings;
        }

    ?>
    <div>
        <?php include 'app.php' ?>
        <?php foreach($greetings as $greeting) : ?>
            <h1><?php if(is_string($greeting)){
                echo $greeting;
            }else{ echo "not a string";}?> </h1>
        <?php endforeach?>
       
        <h2>Howdy</h2>
    </div>
</body>
</html>

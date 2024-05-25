<html>
<head>
    <title>title</title>
</head>
<body>
    <?php
        $books = [
            [
                "name"=>"Republic",
                "author"=>"Plato",
                "Published_date"=>"400BC"
            ],
            [
                "name"=>"The Symposium",
                "author"=>"Plato",
                "Published_date"=>"300BC"
            ],
            [
                "name"=>"Letters From a Stoic",
                 "author"=>"Seneca",
                 "Published_date"=>"40AD"
            ],
            [
                "name"=>"Bhagavad Gita",
                 "author"=>"Vyasa",
                 "Published_date"=>"2500BC"
            ],
        ];

        function filter($items, $fn){
            $string_greetings = [];

            foreach($items as $item){
                $string_greetings[] = $fn($item);
            }

            return $string_greetings;
        }

        $getitems = filter($books, function ($x){
                    if($x['author'] == 'Plato'){
                        return $x['name'];
                    }; 
                    });

    ?>
    <div>
        <?php include 'app.php' ?>
        <?php foreach( $getitems as $item) : 
            ?>
            <h1><?= $item?> </h1>
        <?php endforeach?>
       
        <h2>Howdy</h2>
    </div>
</body>
</html>

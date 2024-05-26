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

<?php
function dd($value){
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
}
?>


<?php if($_SERVER['REQUEST_URI'] == '/about'){
        $page_name = "About";
        require 'views/about.view.php';
    }else if($_SERVER['REQUEST_URI'] == '/contacts'){
        $page_name = "Contacts";
        require 'views/contacts.view.php';
    }else{
        require 'views/index.view.php';
    }
?>
           
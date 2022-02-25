<?php

class Movie
{
    public string $title;
    public string $genre;
    public string $poster;
    public string $desc;
    public float $avgVote;

    function __construct(array $_infoMovie)
    {
        $requiredKeys = [
            "title",
            "genre",
            "poster",
            "desc",
            "avg_vote",
        ];

        foreach ($requiredKeys as $key) {
            if (!key_exists($key, $_infoMovie)) {
                var_dump("Chiave - $key - mancante");
            }
        }
        $this->title = $_infoMovie["title"];
        $this->genre = $_infoMovie["genre"];
        $this->poster = $_infoMovie["poster"];
        $this->desc = $_infoMovie["desc"];
        $this->avgVote = $_infoMovie["avg_vote"];
    }

    public function star() 
    {
        $this->avgVote = floor($this->avgVote);
        return $this->avgVote / 2;
    }

    public function printMovie()
    {
        echo "<h3 class='pt-3 title'>" . ucwords($this->title) . "</h3>";
        echo "<h5 class='pt-2'>" . ucfirst($this->genre) . "</h5>";
        echo "<p class='text-center pt-3'>" . ucfirst($this->desc) . "</p>";
        echo "<div>";
        for ($i = 0; $i <=5; $i++) {
            if($i <= $this->star()) {
                echo "<i class='fas fa-star'></i>";
            } else {
                echo "<i class='far fa-star'></i>";
            }
        }
        echo "</div>";
    }
};

$fastAndFurious = new Movie([
    "title" => "fast and furious",
    "genre" => "action",
    "poster" => "https://cdn.chili.com/images/public/cms/ef/8d/5b/08/ef8d5b08-651b-4cc4-b813-12643eada0e2.jpg?width=422",
    "avg_vote" => 3.6,
    "desc" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore incidunt reiciendis ullam necessitatibus nulla odit enim eos porro pariatur, saepe debitis modi, similique consequuntur ad doloremque tempora maxime accusamus? Veritatis."
]);

$harryPotter = new Movie([
    "title" => "harry potter",
    "genre" => "fantasy",
    "poster" => "https://cdn.bestmovie.it/wp-content/uploads/2010/10/Harry-Potter-7-LO-1.jpg",
    "avg_vote" => 7.2,
    "desc" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, vel? Iure hic natus earum magnam velit est expedita amet sapiente dolores, pariatur odio commodi illum eum ut perspiciatis praesentium fugiat?"
]);
?>
<?php

$cardsFile = $_SERVER['DOCUMENT_ROOT']."/data/deck.json";
  $jsonCards = file_get_contents($cardsFile); 
  $cardsData =  json_decode($jsonCards, TRUE);   

// Shuffle deck, then deal two hand. Half to each
  //https://stackoverflow.com/questions/14115976/how-to-split-divide-an-array-into-2-using-php
shuffle($cardsData);
list($handComputer, $handPlayer) = array_chunk($cardsData, ceil(count($cardsData) / 2));

// echo "<pre>";
// var_dump($handComputer);
// echo "</pre>";

echo "<h1>Computer Hand</h1>";

$downCardsComputer = 1;

foreach ($handComputer as $key => $card) {  
  //hide cards until count equals3. 
  if (($downCardsComputer <= 3) ) {
    echo "<img src='/assets/cards/blue.png' width=70px>";
  } else {
    echo "<img src='/assets/cards/".$card['path']."' width=70px>";
  }
  $downCardsComputer++;
  
  //reset count.
    if($downCardsComputer > 4){
          $downCardsComputer = 1;
    }
}

echo "<h1>Player Hand</h1>";
$downCardsPlayer = 1;
foreach ($handPlayer as $key => $card) {  
  if (($downCardsPlayer <= 3) ) {
    echo "<img src='/assets/cards/red.png' width=70px>";
  } else {
    echo "<img src='/assets/cards/".$card['path']."' width=70px>";
  }
  $downCardsPlayer++;
    if($downCardsPlayer > 4){
          $downCardsPlayer = 1;
    }
}
  


// echo "<pre>";
// var_dump($cardsData);
// echo "</pre><hr>";

// $rnd1 = rand(0,54);
// do {
//   $rnd2 = rand(0,54);
// } while ($rnd1 == $rnd2);

// if ($rnd1 == $rnd2) {
//   $rnd2 = $rnd2+1;
// }


// foreach ($cardsData as $key => $card) {
//   if ($rnd1 == $key) {
//     echo "<img src='/assets/cards/".$card['path']."' width=100px>";
//   }
//   if ($rnd2 == $key) {
//     echo "<img src='/assets/cards/".$card['path']."' width=100px>";
//   }
// }



// echo "<pre>";
// var_dump($rnd2);
// echo "</pre><hr>";



// function shuffleAndDealCards() {
//     $deck = range(1, 52);
//     shuffle($deck);

//     $player1 = array_slice($deck, 0, 26);
//     $player2 = array_slice($deck, 26, 26);

//     return array($player1, $player2);
// }

// list($player1, $player2) = shuffleAndDealCards();

// print_r($player1);
// print_r($player2);


?>


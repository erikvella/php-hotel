<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    $filteredhotels = [];
// il voto è 0 se non viene inviato alcun parametro in post
    $vote = isset($_POST['vote']) ? $_POST['vote'] : 0;
// se è stato checkato parking filtro con un foreach in base alla proprietà parking TRUE / FALSE , se parking è TRUE lo pusho nell'array che dovrò ciclare , and && anche in base al voto 
    if(isset($_POST['parking'])){
      foreach($hotels as $hotel){
        if($hotel['parking'] && $hotel['vote'] >= $vote){
          $filteredhotels[] = $hotel;
        }
      }
    }else{
      foreach($hotels as $hotel){
        if($hotel['vote'] >= $vote){
          $filteredhotels[] = $hotel;
        }
      }
      
      
    }

?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Hotel</title>
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>


  <div class="container my-5">
    <div class="row">
<div class="col-auto">
<form action="index.php" method="POST">
      <input type="checkbox" class="form-check-input" name="parking" id="parking">
      <label for="parking" class="form-check-label">
        Solo hotel con parcheggio
      </label>
</div>

<div class="col-auto">
<h3>Filtra gli hotel in base al voto minimo</h3>
    <form action="index.php" method="POST">
     

      <input type="radio" class="form-check-input" name="vote" value="1" id="vote1">
      <label for="vote1" class="form-check-label me-3 ">
        1
      </label>
      <input type="radio" class="form-check-input" name="vote" value="2" id="vote2">
      <label for="vote2" class="form-check-label me-3 ">
        2
      </label>
      <input type="radio" class="form-check-input" name="vote" value="3" id="vote3">
      <label for="vote3" class="form-check-label me-3 ">
        3
      </label>
      <input type="radio" class="form-check-input" name="vote" value="4" id="vote4">
      <label for="vote4" class="form-check-label me-3 ">
        4
      </label>
      <input type="radio" class="form-check-input" name="vote" value="5" id="vote5">
      <label for="vote5" class="form-check-label me-3 ">
        5
      </label>

      
      <button class="btn btn-success">Cerca</button>
    </form>

</div>
     


      <div class="col-12">
      <table class="table">
  <thead>
    <tr>
     <th scope="col">Nome</th>
     <th scope="col">Descrizione</th>
     <th scope="col">Parcheggio</th>
     <th scope="col">Voto</th>
     <th scope="col">Distanza dal centro</th>
     
      
    </tr>
  </thead>
  <tbody>
    <?php foreach($filteredhotels as $hotel): ?>
    <tr>
      <td><?php echo $hotel['name'] ?></td>
      <td><?php echo $hotel['description'] ?></td>
      <td><?php echo $hotel['parking'] ? 'Si' : 'No' ?></td>
      <td><?php echo $hotel['vote'] ?></td>
      <td><?php echo $hotel['distance_to_center'] ?> Km</td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>



      </div>
    </div>
  </div>


</body>
</html>
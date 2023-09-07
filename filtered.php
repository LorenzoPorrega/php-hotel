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
    //$availableParking = array_filter($hotels, ['parking',  false]);
    //$unavailableParking = array_diff($hotels, ['parking', true]);
    $parkingFilter = $_POST["parkingFilter"];
    $rateFilter = $_POST["rateFilter"];
?>

<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trivago</title>
  <!-- CUSTOM STYLE SHEET FILE LINK -->
  <!--<link rel="stylesheet" href="./css/style.css">-->
  
  <!-- THIRD PARTY LIBRARIES -->
  <!-- BOOTSTRAP CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <!-- FONTAWESOME CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- STANDARD FAVICON TO AVOID CONSOLE ERRORS ON FIREFOX -->
  <link rel="icon"type="image/x-icon" href="https://boolean.careers/favicon/favicon.ico">
  <!-- VUE CDN -->
  <!--<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>-->
  <!-- LUXON CDN -->
  <script src="https://cdn.jsdelivr.net/npm/luxon@3.3.0/build/global/luxon.min.js"></script>
  <!-- AXIOS CDN -->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
  <div class="container text-center mt-5">
  <h2 class="fw-bold">Hai scelto di visualizzare gli hotel <?php echo $parkingFilter === "1" ? "<span p class='text-decoration-underline'>con parcheggio</span>" : "<span p class='text-decoration-underline'>senza parcheggio</span>" ?></h2>
    <table class="table mt-5 table-striped">
      <thead>
        <tr>
          <th class="fs-5" scope="col">Nome</th>
          <th class="fs-5" scope="col">Parcheggio</th>
          <th class="fs-5" scope="col">Voto</th>
          <th class="fs-5" scope="col">Distanza dal centro (km)</th>
        </tr>
      </thead>
      <tbody>
          <?php if($parkingFilter = true){
            echo 'Hai selezionato la select con valore ' . $parkingFilter . ' <small>(1 = con parcheggio, 0 = senza parcheggio)</small>';
          }
          foreach ($hotels as $singleHotel){
            if(!$_POST
            || $_POST["parkingFilter"] == 'null' && $_POST["rateFilter"] == 'null'
            || $_POST["parkingFilter"] == $singleHotel["parking"] && $_POST["rateFilter"] == 'null'
            || $_POST["parkingFilter"] == $singleHotel["parking"] && $singleHotel["vote"] >=  $_POST["rateFilter"]
            || $_POST["parkingFilter"] == 'null' && $singleHotel["vote"] >=  $_POST["rateFilter"]){
          ?>
            <tr>
              <th scope="row">
                <?php echo $singleHotel['name']?>
              </th>
              <td>
                <?php echo $singleHotel['parking'] ? "Sì" : "No" ?>
              </td>
              <td>
                <?php echo $singleHotel['vote']?>
              </td>
              <td>
                <?php echo $singleHotel['distance_to_center']?> km
              </td>
            </tr>
          <?php 
            }
          }
          ?>
      </tbody>
    </table>
  </div>
</body>
<!--<script src="./js/main.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</html>
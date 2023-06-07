<?php


function convertBooleanToString($value)
{
    if (is_bool($value)) {
        return $value ? 'si' : 'no';
    }
    return $value;
}

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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link di BOOTSTRAP, per accedere alla libreria-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- script con link di BOOTSTRAP, da mettere in fondo al body o nell'head con defer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous" defer></script>
    <title>PHP Hotel</title>
</head>

<body>
    <div class="container">
        <form class="d-flex gap-2" method="GET">
            <select name="parking" class="form-select w-25 mb-3" aria-label="Default select example">
                <option value="" selected>Tutti</option>
                <option value="1">Con Parcheggio</option>
                <option value="2">Senza Parcheggio</option>
            </select>

            <select name="vote" class="form-select w-25 mb-3" aria-label="Default select example">
                <option value="" selected>Tutti</option>
                <option value="1">Voto 1</option>
                <option value="2">Voto 2</option>
                <option value="3">Voto 3</option>
                <option value="4">Voto 4</option>
                <option value="5">Voto 5</option>
            </select>

            <div class="d-grid gap-2 d-md-block">
                <button class="btn btn-primary" type="submit">Cerca</button>
                <button class="btn btn-danger" type="reset">Cancella</button>
            </div>
        </form>

        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <?php foreach ($hotels[0] as $key => $hotel) { ?>
                        <th><?= $key ?></th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hotels as $hotel) {
                    // Applica i filtri solo se sono stati selezionati
                    $parkingFilter = isset($_GET['parking']) && $_GET['parking'] !== '' ? intval($_GET['parking']) : null;
                    $voteFilter = isset($_GET['vote']) && $_GET['vote'] !== '' ? intval($_GET['vote']) : null;

                    // Effettua il filtraggio
                    if (($parkingFilter === null || $hotel['parking'] == $parkingFilter) &&
                        ($voteFilter === null || $hotel['vote'] == $voteFilter)) {
                        ?>
                        <tr>
                            <?php foreach ($hotel as $value) { ?>
                                <td scope="row"><?= convertBooleanToString($value) ?></td>
                            <?php } // end 2nd foreach ?>
                        </tr>
                <?php } // end filtering condition
                } // end 1st foreach ?>
            </tbody>

        </table>
    </div>

</body>

</html>
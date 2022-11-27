<?php

/*
 Užduotis nuo 1 iki 4 atlikite galite į vieną failą, rekomenduojame 5, 6, 7 užduotis atlikti atskiruose failuose.
 Funkcijų ir kintamųjų pavadinimus vadinkite suprantamai,
 taip kad kiti galėtu suprasti ką funkicija daro ar kintamasis saugo (vertinime atsižvelgsime į teisingus namingus)
 Pabandykite laikykis code standartų, tiek kiek esame apie juos šnekėje.
 */

/*
 1.  Grąžinkite visų lyginių skaičių, esančių $numbers masyve, sumą (1 balas) +0.5 jeigu array funkcijos naudojamos
*/

$numbers = [
    15,
    55,
    66,
    91,
    100,
    995,
    17,
    550,
];

function exercises1(array $newNumbers)
{
    return array_reduce($newNumbers, function (?int $carry, int $number) {
        if ($number % 2 === 0)
            $carry += $number;
        return $carry;
    });

}

var_dump(exercises1($numbers));


/*
 2. Grąžinkite visų skaičių, esančių $numbers2 masyve, sandaugą (1 balas), +0.5 jeigu array funkcijos naudojamos
*/

$numbers2 = [
    [1, 3, 5],
    [55, 87, 100],
    [12],
    [],
];

function exercises2($newNumbers2) : float
{
    return array_reduce($newNumbers2, function (int $carry, array $array) {
        foreach ($array as $number)

        $carry *= $number;
        return $carry;
        },
        1);

}
var_dump(exercises2($numbers2));
/*
 3. Masyve $holidays turime kelionių agentūros siūlomas keliones su kaina ir dalyvių skaičiumi.
 Terminale išspausdinkite santrauką, kurioje matytusi miesto pavadinimas, kelionių pavadinimai ir dalyvių sumokėta suma
 Dėmesio! Santraukoje nerodykite tų kelionių, kurių kaina yra null. (2 balai)
*/

//   Destination "Paris".
//   Titles: "Romantic Paris", "Hidden Paris"
//   Total: 99500
//   ************
//   Destination "New York"




$holidays = [
    [
        'title' => 'Romantic Paris',
        'destination' => 'Paris',
        'price' => 1500,
        'tourists' => 55,
    ],
    [
        'title' => 'Amazing New York',
        'destination' => 'New York',
        'price' => 2699,
        'tourists' => 21,
    ],
    [
        'title' => 'Spectacular Sydney',
        'destination' => 'Sydney',
        'price' => 4130,
        'tourists' => 9,
    ],
    [
        'title' => 'Hidden Paris',
        'destination' => 'Paris',
        'price' => 1700,
        'tourists' => 10,
    ],
    [
        'title' => 'Emperors of the past',
        'destination' => 'Beijing',
        'price' => null,
        'tourists' => 10,
    ],
];
function exercises3(array $allHolidays): void
{
    $presentHolidays = [];
    for ($i = 0; $i < count($allHolidays); $i++) if (isset($allHolidays[$i]['price'])) {
        $holidaySummary = array(
            'destination' => $allHolidays[$i]['destination'],
            'titles' => array($allHolidays[$i]['title']),
            'total' => $allHolidays[$i]['price'] * $allHolidays[$i]['tourists']
        );
        $presentHolidays = getArr($allHolidays, $holidaySummary, $presentHolidays);
    }
    function super_unique(array $array, mixed $key): array
    {
        $temp_array = [];
        foreach ($array as &$element) {
            if (!isset($temp_array[$element[$key]])) {
                $temp_array[$element[$key]] = &$element;
            }
        }
        return array_values($temp_array);
    }
    $presentHolidays = super_unique($presentHolidays, 'destination');
    foreach ($presentHolidays as $holidays) {
        $finalHolidays .= 'Destination ' . $holidays['destination'] . PHP_EOL . 'Titles: ' . $holidays['titles'] . PHP_EOL . 'Total: ' . $holidays['total'] . PHP_EOL . '************' . PHP_EOL;
    }
    echo $finalHolidays;
    $GLOBALS['finalHolidays'] = $finalHolidays;
}
function getArr(array $allHolidays, array $holidaySummary, array $presentHolidays): array
{
    foreach ($allHolidays as $holiday) {
        if ($holidaySummary['destination'] === $holiday['destination'] && !in_array($holiday['title'], $holidaySummary['titles'], true)) {
            $holidaySummary['titles'][] = $holiday['title'];
            $holidaySummary['total'] += $holiday['price'] * $holiday['tourists'];
        }
    }
    $holidaySummary['titles'] = implode(", ", $holidaySummary['titles']);
    $presentHolidays[] = $holidaySummary;
    return $presentHolidays;
}

exercises3($holidays);
/*
 4. Pakoreguokite 3 užduotį taip, kad ji duomenis rašytų ne į terminalą, o spausdintų į failą. (1 balas)
*/

function exercises4(): void
{
    $file = fopen("test.txt","w");

    fwrite($file,  $GLOBALS['finalHolidays']) ;

    fclose($file);

}
exercises4();


/*
 5. Sukurkite forma, kuri leistų pridėti failą ir vėliau jį išsaugotų serveryje su formoje nurodytu failo pavadinimu (name). (3 balai)
*/

//    File forma:
//    Name: [laboras.txt]
//    File: [browse]





/* 6. Parašykite programą, kuri per argumentų padavimą terminale, paleidžiant funkciją juos priimtų, sudaugintų
tarpusavyje ir pakeltu kvadratu. Atkreipkite dėmesį, kad jeigu argumentas yra paduodamas ne skaičius, reikia, kad
terminale gautumėme atitinkamą klaidos kodą ir pranešimą. (2 balai)
*/

//  php index.php  3 5 -->> Jūsų skaičius: 225
function exercise6(): void
{

    $firstNumber = readline('iveskite pirmaji skaiciu ');

    $secondNumber =readline('iveskite antraji skaiciu ');

    function patikra($firstNumber, $secondNumber) : bool{

        if (is_numeric($firstNumber) === false || is_numeric($secondNumber) === false)
            return false;
        else
            return true;

    }

    function calculation($firstNumber, $secondNumber) : int

    {

        if (patikra($firstNumber, $secondNumber) === true) {
            return pow(($firstNumber * $secondNumber), 2) . PHP_EOL;
        }
        else
            return 0;

    }
    if(calculation($firstNumber, $secondNumber) !== 0){
        $result = calculation($firstNumber, $secondNumber);
        echo "Atsakymas: " . $result . PHP_EOL;
    }
    else {
        ECHO  "Blogai ivesti skaiciai" . PHP_EOL;
        exit(0376);
    }
}
//exercise6();
/**
 * PAPILDOMAS
 * 7. Parašykite programą, kuri sugeneruotų ornamentą: https://iili.io/H3J974e.png .
 * Ornamentas turi būti sugeneruotas naudojant HTML ir PHP. (2 balai)
 **/
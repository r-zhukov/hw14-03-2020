<?php
echo "+++++++++++++ Task 1 +++++++++++++ <br>";

function createQueryString($array)
{
    ksort($array);
    $query = [];

    foreach ($array as $title => $value) {
        array_push($query, "$title=$value");

    }

    $str = join('&', $query);
    return $str . '<br>';
}

$queryArray = ['per' => 10, 'page' => 1];

echo createQueryString($queryArray) . '<br>';

echo "+++++++++++++ Task 2 +++++++++++++ <br>";

$links = [
    'Google' => [
        'Mail' => 'http://gmail.com',
        'Adwords' => 'http://google.com/adwords',
        'Adsense' => 'http://google.com/adwords',
    ],
    'Яндекс' => [
        'Метрика' => 'http://metrika.yandex.ru',
        'Direct' => 'http://direct.yandex.ru',
    ],
    'Yahoo' => 'http://yahoo.com'
];
echo count($links) . '<br>';

echo "<ul>";

foreach ($links as $item => $value) {
    if (is_array($value)) {
        echo "<li>{$item}<ul>";
        foreach ($value as $title => $link) {
            echo "<li><a href=\"$link\" >$title</a></li>";
        }
        echo "</ul></li>";
    } else {
        echo "<li><a href=\"$value\">{$item}</a></li>";
    }
}

echo "</ul>";

echo "+++++++++++++ Task 3 +++++++++++++ <br>";

$countries = [
    'Ukraine' => [
        'population' => 42,
        'capital' => 'Kiev'
    ],
    'USA' => [
        'population' => 315.2,
        'capital' => 'Washington'
    ]
];

function showCountries($array)
{
    foreach ($array as $country => $characteristic) {
        echo "<h2>$country</h2>";
        echo "<table border=\"1\"  >";

        foreach ($characteristic as $name => $value) {
            echo "<tr><th width=\"100px\">$name</th><td width=\"100px\">$value</td></tr>";
        }

        echo "</table>";
    }
}

echo showCountries($countries) . '<br>';

echo "+++++++++++++ Task 4 +++++++++++++ <br>";

$participants = [
    'Austria' => [
        'gold' => 3,
        'silver' => 5,
        'bronze' => 9,
    ],
    'Germany' => [
        'gold' => 12,
        'silver' => 9,
        'bronze' => 8,
    ],
    'Canada' => [
        'gold' => 6,
        'silver' => 5,
        'bronze' => 4,
    ],
    'China' => [
        'gold' => 0,
        'silver' => 6,
        'bronze' => 2,
    ],
    'Korea' => [
        'gold' => 3,
        'silver' => 1,
        'bronze' => 2,
    ],
    'Norway' => [
        'gold' => 10,
        'silver' => 10,
        'bronze' => 5,
    ],
    'Russia' => [
        'gold' => 9,
        'silver' => 6,
        'bronze' => 3,
    ],
    'USA' => [
        'gold' => 6,
        'silver' => 3,
        'bronze' => 4,
    ],
    'Finland' => [
        'gold' => 2,
        'silver' => 4,
        'bronze' => 6,
    ],
    'Japan' => [
        'gold' => 5,
        'silver' => 1,
        'bronze' => 4,
    ],
];

function renderResults($array)
{
    foreach ($array as $countries => $numberOfMedals) {
        $scores = [];

        foreach ($numberOfMedals as $medal => $number) {
            switch ($medal) {
                case "gold":
                    $medalScore = 7 * $number;
                    break;
                case "silver":
                    $medalScore = 6 * $number;
                    break;
                case  "bronze":
                    $medalScore = 5 * $number;
                    break;
            }

            array_push($scores, "$medalScore");
            $allScores = array_sum($scores);
            $allMedals = array_sum($numberOfMedals);
        }

        $array[$countries]['allMedals'] = $allMedals;
        $array[$countries]['allScores'] = $allScores;
    }

    $allScores = array_column($array, 'allScores');
    array_multisort($allScores, SORT_DESC, $array);

    $titleTable = 'Results of the Olympic Games';

    echo "<h1>$titleTable</h1>";
    echo "<table border = \"1\" >";
    echo "<tr><th></th><th>Country</th><th>Gold</th><th>Silver</th><th>Bronze</th><th>All</th><th>Scores</th></tr>";
    $i = 1;

    foreach ($array as $countries => $numberOfMedals) {
        echo "<tr><th>$i</th><th width = \"80px\">$countries</th>";
        foreach ($numberOfMedals as $medal => $number) {
            echo "<td width = \"50px\">$number</td>";
        }
        echo "</tr>";
        $i++;
    }

    echo "</table>";
}

renderResults($participants);

?>





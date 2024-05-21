<?php
if (isset($_GET["search"])) {
    $search = $_GET["search"];

    // TODO: Вставте ваш apiKey і cx
    $apiKey = "YOUR_API_KEY";
    $cx = "YOUR_CX";

    $url = "https://www.googleapis.com/customsearch/v1?key={$apiKey}&cx={$cx}&q={$search}";

    // Ініціалізація сеансу cURL
    $ch = curl_init();

    // Встановлюємо URL та інші необхідні параметри
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Виконання запиту та отримання відповіді
    $response = curl_exec($ch);

    // Закриття сеансу cURL
    curl_close($ch);

    // Декодування відповіді з формату JSON в асоціативний масив
    $results = json_decode($response, true);

    // Виведення вмісту масиву $results
    // var_dump($results);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Results</title>
</head>
<body>
<h2>Search Engine</h2>

<form method="GET" action="/index.php">
    <label for="search">Search:</label>
    <input type="text" id="search" name="search" value=""><br><br>
    <input type="submit" value="Submit">
</form>

<?php
if (isset($results) && is_array($results) && isset($results['items'])) {
    // Перебір елементів масиву $results['items']
    foreach ($results['items'] as $item) {
        // Відображення результатів
        echo "<h3>{$item['title']}</h3>";
        echo "<p>{$item['snippet']}</p>";
        echo "<a href='{$item['link']}'>{$item['link']}</a><br><br>";
    }
}
?>

</body>
</html>

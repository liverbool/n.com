## 1. Add new class map
    vendor\composer\autoload_classmap.php add:
        - 'Lib\\Kakkak\\Utils\\Str' => $baseDir . '/app/lib/Kakkak/Utils/Str.php',
        - 'Lib\\Kakkak\\Routing\\UriValidator' => $baseDir . '/app/lib/Kakkak/Routing/UriValidator.php',

## 2. to fix imdb_rating from scrap
    -lib\Services\Db\Writer.php L: 635

## 3. Add validate url to routing for support Thai word and match case insensitive
    - vendor\laravel\src\Illuminate\Routing\Route.php L: 488
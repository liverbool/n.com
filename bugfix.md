Fix bugs Kakkak!
--------------

### 1. Add new class map
    vendor\composer\autoload_classmap.php add:
        - 'Lib\\Kakkak\\Utils\\Str' => $baseDir . '/app/lib/Kakkak/Utils/Str.php',
        - 'Lib\\Kakkak\\Routing\\UriValidator' => $baseDir . '/app/lib/Kakkak/Routing/UriValidator.php',

### 2. to fix imdb_rating from scrap
    - L: 635 lib\Services\Db\Writer.php

### 3. Change nangkakkak.com-empty.png to:
    - L: 22 app/models/Actor.php
    - L: 50 app/models/Title.php return 'assets/images/nangkakkak.com-empty.png';
    - L: 14 app/views/Titles/Themes/Tabs/Similar.blade.php
    - L: 30 app/views/Users/Profile.blade.php

### 4. Change to support Thai route
    - L: 488 vendor\laravel\src\Illuminate\Routing\Route.php
      Add: `\Lib\Kakkak\Routing\UriValidator()`

    - L: 374 vendor\laravel\src\Illuminate\Routing\Route.php
      From:
        ```
        preg_match($this->compiled->getRegex(), '/'.$request->path(), $matches);
        ```
      To:
        ```
        $pattern = $this->compiled->getRegex() . 'i';
        $path = '/' . urldecode($request->path());
        preg_match($pattern, $path, $matches);
        ```
    - L: 342
      Change to:
      ```
      // To bypass route on compile regura (symfony compile route)
      $key = preg_match('/\w+/', $base) ? $base : $m;

      $this->{'addResource'.ucfirst($m)}($name, $key, $controller, $options);
      ```

### 5. Change lib/Helpers.php
    - Add $slug = true to Helpers::url parameter to make choise to slug & trans or not
      - Line: 2 add namespace Lib;
      - create Kakkak\Helpers.php
      - add kakkak helpers to class map
      - modifile all static class to \Class eg. \App::xx in Helpers.php

### 6. Add libraries
    - app/config/app/providers
        - 'Lib\Kakkak\Repository\Title\TitleServiceProvider',

### 7. Modify repository
    - L: 194 Lib\Repository\Title\DbTitle.php (method titleIndex) set paging = 20
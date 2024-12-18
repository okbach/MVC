
<?php

 function view($viewName, $data = []) {
        extract($data);
        require __DIR__ .'/../views/' . $viewName . '.php';
      }
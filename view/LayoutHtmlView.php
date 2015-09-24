<?php

class LayoutHtmlView{
    
    function render($container, $navigationView){
        
        
    
        echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Workshop 2</title>
          <link rel="stylesheet" type="text/css" href="css/style.css">
        </head>
        <body>
        <header id="header">
            <h1>Välkommen</h1>
          </header>
          <nav id="nav">
            '. 
              $navigationView->generateLinks()
            .'
          </div>
          <div class="container">
            '.
                $container->response()
                .'
          </div>
         </body>
      </html>';
      }
}
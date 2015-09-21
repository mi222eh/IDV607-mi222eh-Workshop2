<?php

class LayoutHtmlView{
    
    function render($container){
        
        
    
        echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Workshop 2</title>
        </head>
        <body>
          <h1>Välkommen</h1>
          <div class="container">
            '.
                $container->response()
                .'
          </div>
         </body>
      </html>';
      }
}
<?php


class LayoutView {
  
  public function render($LoggedIn, NavigationVIew $v, DateTimeView $dtv, $registerLink) {

    echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Login Example</title>
        </head>
        <body>
          <h1>Assignment 2</h1>
        '.$registerLink.'
          ' . $this->renderIsLoggedIn($LoggedIn). '
          
          <div class="container">
              ' . $v->response() . '
              
              ' . $dtv->show() . '
          </div>
         </body>
      </html>
    ';
  }
  
  private function renderIsLoggedIn($checker) {
    if ($checker) {
      return '<h2>Logged in</h2>';
    }
    else {
      return '<h2>Not logged in</h2>';
    }
  }
}

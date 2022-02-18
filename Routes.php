<?php

Route::set('login', function(){
    Login::createView('Login');
//   echo "Log In";
});
Route::set('home', function(){
    Home::createView('Home');
    // echo "Home";
  });

?>
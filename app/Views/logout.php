<?php
    //session_start();
    //session()->('isLoggedIn');
    session()->destroy();
    echo "déconnecté !";
    //echo session('name');
    echo session()->get('email');
    echo session()->get('isLoggedIn');
  // session('isLoggedIn')->set(0);
   
    //sleep(2);
   //return redirect()->route('signin');
?>
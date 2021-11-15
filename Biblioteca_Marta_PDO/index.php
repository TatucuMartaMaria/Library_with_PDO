<?php

require 'requires.php';

$pdo = connecttoDB();


$x = queryCustomer();
$y = queryBook();

Customer::displayCustomers($x);
Customer::theMostFaithfulReader($x);
Book::displayBooks($y);

$z = queryCustomer($pdo)[2];
var_dump($z);

$w = queryBook($pdo)[0];
var_dump($w);

//$z->borrowTheBook($w);

$z->hasPenalties();

$z->returnTheBook($w);

Book::displayBooksAvailable($y);
Book::searchTheBook('Inteligen',$y);

Book::filterBooksByGenre('Dezvoltare personala',$y);

//deleteCustomer(2);

//insertDBCustomer('Vasile Ion');

//insertDBBook('Fizica povestita','Cristian Presura','fizica','678');




?>
<?php

class Student extends Customer
{
    public $faculty, $year_of_study;

    public static function displayStudents($x)
    {
       (new Student(''))->display(get_class(), $x);
    }

}

?>
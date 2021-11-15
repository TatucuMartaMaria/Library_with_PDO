<?php



class Customer
{
    public $id, $name, $nr_of_books_borrowed, $return_date;

    use addANDdisplay;


    public static function displayCustomers($x)
    {
        echo "<br><b style='color: darkred'>Customers:</b><br>";

        (new Customer(''))->display(get_class(), $x);
    }

    public static function theMostFaithfulReader($x)
    {
        echo "<br><b style='color: darkred'>The most faithful reader is:</b><br>";

        $max = 0;
        foreach($x as $item) {
            foreach ($x as $customer) {
                $max = ($customer->nr_of_books_borrowed > $max) ? $customer->nr_of_books_borrowed : $max;;

            }
            if ($item->nr_of_books_borrowed == $max) {
                echo "<pre>";
                print_r($item);
                echo "</pre>";
            }
        }
    }

    public function borrowTheBook($book)
    {
        if($book->availability == false)
        {
            throw new Exception('BookUnavailableException');
        }

        try{
            if(empty($this->return_date))
            {
                echo "<br><b style='color: darkred'>The book was borrowed.</b><br>";
                $this->nr_of_books_borrowed++;
                $book->availability = false;
                date_default_timezone_set("Europe/Bucharest");
                $this->return_date = date("d/m/Y", strtotime("+2 weeks"));

                updateDBCustomer($this->id, $this->name, $this->nr_of_books_borrowed, $this->return_date);
                updateDBBook($book->id, $book->title, $book->author, $book->genre, $book->nr_of_pages, $book->availability);

            }else{
                echo "<br><b style='color: red'>Only one book can be borrowed!
                                     You will be able to borrow a new book when you return the first book.</b><br>";
            }

        }catch(Exception $e){
            echo $e->getMessage(), "\n";
        }
    }

    public function returnTheBook($book)
    {
        $book->availability = true;
        $this->return_date = null;
        updateDBCustomer($this->id, $this->name, $this->nr_of_books_borrowed, $this->return_date);
        updateDBBook($book->id, $book->title, $book->author, $book->genre, $book->nr_of_pages, $book->availability);
    }

    public function hasPenalties()
    {
        if(empty($this->return_date))
        {
            echo "<br><b style='color: green'>Hasn't penalties.</b><br>";
        }else{
            date_default_timezone_set("Europe/Bucharest");
            $a = convertDateInToNr($this->return_date);
            $b = convertDateInToNr(date('d/m/Y'));

            if($a < $b)
            {
                echo "<br><b style='color: red'>PENALTY!!!The customer must return the book.</b><br>";
            }
        }

    }



}



?>
<?php


function updateDBCustomer($id, $name, $nr_of_books_borrowed, $return_date)
{
    try {
        $sql = "UPDATE customers SET name=:name, nr_of_books_borrowed=:nr_of_books_borrowed, 
                   return_date=:return_date WHERE id=$id";
        $statement= connecttoDB()->prepare($sql);
        $statement->execute([
            ':name' => $name,
            ':nr_of_books_borrowed' => $nr_of_books_borrowed,
            ':return_date' => $return_date
        ]);

    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    return $sql;
}



function updateDBBook($id, $title, $author, $genre, $nr_of_pages, $availability)
{
    try {
        $sql = "UPDATE books SET title=:title, author=:author, genre=:genre, nr_of_pages=:nr_of_pages, 
                   availability=:availability WHERE id=$id";
        $statement = connecttoDB()->prepare($sql);
        $statement->execute([
            ':title' => $title,
            ':author' => $author,
            ':genre' => $genre,
            ':nr_of_pages' => $nr_of_pages,
            ':availability' => $availability
        ]);

    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    return $sql;
}



?>
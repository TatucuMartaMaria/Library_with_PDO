<?php

function insertDBCustomer($name, $nr_of_books_borrowed = 0, $return_date = null)
{
    try {
        $sql = "INSERT INTO customers (name,nr_of_books_borrowed,return_date)
  VALUES(:name, :nr_of_books_borrowed)";
        $statement = connecttoDB()->prepare($sql);
        $statement->execute([
                ':name' => $name,
                ':nr_of_books_borrowed' => $nr_of_books_borrowed,
                ':return_date' => $return_date
        ]);

    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    return $sql;
}

function insertDBBook($title, $author, $genre, $nr_of_pages)
{
    try {
        $sql = "INSERT INTO books (title, author, genre, nr_of_pages)
  VALUES (:title, :author, :genre, :nr_of_pages)";
        $statement = connecttoDB()->prepare($sql);
        $statement->execute([
            ':title' => $title,
        ':author' => $author,
        ':genre' => $genre,
        ':nr_of_pages' => $nr_of_pages
        ]);
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}


?>
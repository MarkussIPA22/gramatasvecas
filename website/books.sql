CREATE DATABASE books_list;
use books_list;

CREATE TABLE  books (
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    author VARCHAR(100) NOT NULL,
    reserved BOOLEAN NOT NULL ,
  
);

INSERT INTO books (title, author ) VALUES
    ('Anna Karenina', 'Leo Tolstoy' ),
    ('The Great Gatsby', 'F. Scott Fitzgerald'),
    ('To Kill a Mockingbird', 'Harper Lee'),
    ('1984', 'George Orwell'),
    ('Pride and Prejudice', 'Jane Austen'),
    ('The Catcher in the Rye', 'J.D. Salinger'),
    ('The Lord of the Rings', 'J.R.R. Tolkien');
    
    SELECT * FROM books;
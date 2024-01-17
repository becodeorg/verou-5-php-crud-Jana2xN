<?php

// This class is focussed on dealing with queries for one type of data
// That allows for easier re-using and it's rather easy to find all your queries
// This technique is called the repository pattern
class BookRepository
{
    private DatabaseManager $databaseManager;

    // This class needs a database connection to function
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }

    public function create(string $title, string $author, int $publicationYear, string $genre): void
    {
        try {
            $statement = $this->databaseManager->connection->prepare("INSERT INTO books (title, author, publication_year, genre) VALUES (?, ?, ?, ?)");
            $statement->execute([$title, $author, $publicationYear, $genre]);
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    // Get one (You may need to provide an ID or other criteria for finding a specific book)
    public function find(int $id): array
    {
        // Implement your find logic here
    }

    // Get all
    public function get(): array
    {
        try {
            $statement = $this->databaseManager->connection->query("SELECT title, author, publication_year, genre FROM books");
            $books = $statement->fetchAll(PDO::FETCH_ASSOC);
    
            return $books;
        } catch (PDOException $error) {
            echo $error->getMessage();
            return [];
        }
    }

    public function update(int $id, string $title, string $author, int $publicationYear, string $genre): void
    {
        // Implement your update logic here
    }

    public function delete(int $id): void
    {
        // Implement your delete logic here
    }
}

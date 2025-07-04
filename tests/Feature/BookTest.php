<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use PHPUnit\Framework\Attributes\Test;
use App\Models\Book;
use App\Models\Author;
use App\Helpers\LogHelper;

class BookTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_create_a_book()
    {
        $author = Author::factory()->create();
        $bookData = Book::factory()->make(['author_id' => $author->id])->toArray();

        $response = $this->post('/books', $bookData);

        $response->assertStatus(302);
        $response->assertRedirect('/books');

        $this->assertDatabaseHas('books', $bookData);
    }

    #[Test] 
    public function it_can_read_a_book_on_books()
    {
        $book = Book::factory()->create();

        $response = $this->get('/books');

        $response->assertStatus(200);
        $response->assertSee($book->title);
    }
    
    #[Test] 
    public function it_can_read_a_book_on_authors()
    {
        $book = Book::factory()->create();

        $response = $this->get('/authors');

        $response->assertStatus(200);
        $response->assertSee($book->title);
    }
    
    #[Test] 
    public function it_can_read_a_specific_book()
    {
        $books = Book::factory()->count(5)->create();

        $specificBook = $books->first();

        $response = $this->get('/books/' . $specificBook->id . '/edit');

        $response->assertStatus(200);
        $response->assertSee($specificBook->title);
    }
    
    #[Test] 
    public function it_can_update_a_book()
    {
        $book = Book::factory()->create();

        $updatedData = [
            'title' => 'TUMI TO BATU',
            'author_id' => $book->author_id,
        ];

        $response = $this->put("/books/{$book->id}", $updatedData);

        $response->assertStatus(302);
        $response->assertRedirect('/books');
        $this->assertDatabaseHas('books', $updatedData);
    }
    
    #[Test] 
    public function it_can_delete_a_book()
    {
        $book = Book::factory()->create();

        $response = $this->delete("/books/{$book->id}");

        $response->assertStatus(302);
        $response->assertRedirect('/books');

        $this->assertDatabaseMissing('books', [
            'id' => $book->id,
        ]);
    }

}

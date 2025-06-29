<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use PHPUnit\Framework\Attributes\Test;
use App\Models\Author;
use App\Models\Book;
use App\Helpers\LogHelper;

class AuthorTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_create_an_author()
    {
        $authorData = Author::factory()->create()->toArray();
        $response = $this->post('/authors', $authorData);

        $response->assertStatus(302);
        $response->assertRedirect('/authors');

        $this->assertDatabaseHas('authors', $authorData);
    }
    
    #[Test]
    public function it_can_read_authors_on_authors()
    {
        $author = Author::factory()->create();

        $response = $this->get('/authors');

        $response->assertStatus(200);
        $response->assertSee($author->name);
    }
    
    #[Test]
    public function it_can_read_authors_on_books()
    {
        $author = Author::factory()->create();

        $response = $this->get('/books');

        $response->assertStatus(200);
        $response->assertSee($author->name);
    }
    
    #[Test]
    public function it_can_read_authors_on_book_edit()
    {
        $author = Author::factory()->create();
        $book = Book::factory()->create();

        $response = $this->get('/books/' . $book->id . '/edit');

        $response->assertStatus(200);
        $response->assertSee($author->name);
    }
    
    #[Test]
    public function it_can_read_a_specific_author()
    {
        $authors = Author::factory()->count(5)->create();

        $specificAuthor = $authors->first();

        $response = $this->get('/authors/' . $specificAuthor->id . '/edit');

        $response->assertStatus(200);
        $response->assertSee($specificAuthor->name);
    }
    
    #[Test]
    public function it_can_update_an_authors()
    {
        $author = Author::factory()->create();

        $updatedData = [
            'name' => 'DAZAI OSAMU'
        ];

        $response = $this->put("/authors/{$author->id}", $updatedData);

        $response->assertStatus(302);
        $response->assertRedirect('/authors');

        $this->assertDatabaseHas('authors', $updatedData);
    }
    
    #[Test]
    public function it_can_delete_an_authors()
    {
        $author = Author::factory()->create();

        $response = $this->delete("/authors/{$author->id}");

        $response->assertStatus(302);
        $response->assertRedirect('/authors');

        $this->assertDatabaseMissing('authors', [
            'id' => $author->id,
        ]);
    }

}

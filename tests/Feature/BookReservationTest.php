<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Book;

class BookReservationTest extends TestCase
{
    /** @test*/
        public function a_book_can_be_added_to_the_library()
        {
            $this->withoutExceptionHandling();

            $response= $this->post('/books',[
               'title' =>'Cool Book Title',
               'author' => 'Victor'

            ]);

            $response->assertOk();
            $this->assertCount(1,Book::all());
        }

    /** @test*/
    public function a_title_is_required()
    {
        $this->withoutExceptionHandling();

        $response= $this->post('/books',[
            'title' =>'',
            'author' => 'Victor',
        ]);

        $response->assertSessionHasErrors('title');
    }
}

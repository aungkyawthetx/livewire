<?php

use Livewire\Component;
use App\Models\Book;

new class extends Component {
    public $name = 'Mario';
    public $books = [];

    public function mount()
    {
        $this->books = Book::all();
    }

    public function delete(Book $book)
    {
        $book->delete();
        $this->books = Book::all();
    }
};


?>

<div>
    <header>
        <div>
            <h2>Hi, {{ $name }} </h2>
            <p>Here's a list of your book reviews...</p>
        </div>
    </header>

    <ul class="mt-6 grid gap-4 md:grid-cols-2">
        @foreach ($books as $book)
            <li wire:key="{{ $book->id }}" class="rounded-lg border border-gray-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:border-indigo-200 hover:shadow-md">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">{{ $book->title }}</h3>
                        <h4 class="mt-1 text-sm font-medium text-gray-500">by {{ $book->author }}</h4>
                    </div>

                    <p class="shrink-0 rounded-full bg-indigo-50 px-3 py-1 text-sm font-semibold text-indigo-700">
                        {{ $book->rating }}/10
                    </p>
                </div>
                <button
                    wire:click="delete({{ $book->id }})"
                    class="mt-5 rounded-md bg-red-50 px-3 py-2 text-sm font-semibold text-red-700 transition hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 cursor-pointer"
                >
                    Delete
                </button>
            </li>
        @endforeach
    </ul>
</div>

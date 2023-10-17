<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'isbn' => 'required|size:13',
            'judul' => 'required|string|min:3|max:255',
            'halaman' => 'required|integer',
            'kategori' => 'nullable|string',
            'penerbit' => 'required|string',
        ]);

        $book = new Book();
        $book->isbn = $validated['isbn'];
        $book->judul = $validated['judul'];
        $book->halaman = $validated['halaman'];
        $book->kategori = $validated['kategori'] ?? 'uncategorized';
        $book->penerbit = $validated['penerbit'];
        $book->save();

        return redirect()->route('books.index')->with('success', 'Buku telah berhasil ditambahkan.');
        // return redirect()->route('books.index')->with('success', 'Buku telah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
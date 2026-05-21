<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComicRequest;
use App\Http\Requests\UpdateComicRequest;
use App\Models\Comic;
use App\Models\Magazine;
use App\Models\Category;


class ComicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    // solo gli utenti autenticati possono accedere a create, store, edit, update e destroy

    public function index()
    {

    $comics = Comic::with('user', 'categories ', 'magazine')->latest()->get() ;
    return view('comics.index', compact('comics')); 

    }

    //mostra i fumetti

    public function create()
    {
        $magazines = Magazine::all();
        $categories = Category::all();
        return view('comics.create', compact('magazines', 'categories'));
    }   

    //mostra il form per creare un nuovo fumetto

    public function store(StoreComicRequest $request)
    {
        $data = $request->only(['title', 'number', 'year', 'plot', 'magazine_id'] );
        $data['user_id'] = auth()->id();

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('comics', 'public');
        }   
        $comic = Comic::create($data);
        $comic->categories()->sync($request->input('categories', []));  
        return redirect()->route('comics.show', $comic)->with('success', 'Fumetto pubblicato correttamente.'  );
    }

    //salva il nuovo fumetto nel database

    public function show(Comic $comic)
    {   
        $comic->load('user', 'categories', 'magazine');
        return view('comics.show', compact('comic'));
               

    }
   
    //mostra i dettagli di un fumetto specifico

    public function edit(Comic $comic)
    {
        abort_if(auth()->id() !== $comic->user_id, 403);  // solo il creatore del fumetto può modificarlo   
        $magazines = Magazine::all();
        $categories = Category::all();
        return view('comics.edit', compact('comic', 'magazines', 'categories'));
    }   

    // mostra il form per modificare un fumetto esistente

    public function update(UpdateComicRequest $request, Comic $comic)
    {
        abort_if(auth()->id() !== $comic->user_id, 403);  // solo il creatore del fumetto può modificarlo   
        $data = $request->only(['title', 'number', 'year', 'plot', 'magazine_id'] );

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('comics', 'public');
        }   
        $comic->update($data);
        $comic->categories()->sync($request->input('categories', []));  
        return redirect()->route('comics.show', $comic)->with('success', 'Fumetto aggiornato correttamente.'  );
    }

    //aggiorna il fumetto esistente nel database
    

    public function destroy(Comic $comic)
    {
        abort_if(auth()->id() !== $comic->user_id, 403);  // solo il creatore del fumetto può eliminarlo   
        $comic->delete();
        return redirect()->route('comics.index')->with('success', 'Fumetto eliminato correttamente.'  );
    }       
    //elimina un fumetto dal database
}



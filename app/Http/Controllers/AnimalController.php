<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Comment;
use App\Gender;
use App\Species;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $animals = Animal::orderBy('created_at', 'desc')->where('expires_in', null)->orWhere('expires_in', '>=', date('Y-m-d'))->get();

        return view('animals.index', compact('animals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if (!$user->can_post)
            return redirect('/animals')->with('status', 'Unauthorized');

        $species = Species::all();
        $genders = Gender::all();


        return view('animals.create', compact('species', 'genders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        if (!$user->can_post)
            return redirect('/animals')->with('status', 'Unauthorized');

        $path = $request->file('photo')->store('animals', ['disk' => 'public']);

        $user_id = Auth::id();

        $animal = new Animal([
            'user_id' => $user_id,
            'photo' => $path,
            'species_id' => $request->get('species_id'),
            'age' => $request->get('age'),
            'gender_id' => $request->get('gender_id'),
            'location' => $request->get('location'),
            'status_id' => $request->get('status_id'),
            'expires_in' => $request->get('expires_in')
        ]);
        $animal->save();


        $animals = Animal::get();

        foreach ($animals as $storedAnimal) {

            if ($animal->id != $storedAnimal->id && $animal->species_id == $storedAnimal->species_id &&
                $animal->age == $storedAnimal->age &&
                $animal->gender_id == $storedAnimal->gender_id) {

                $comment1 = new Comment([
                    'animal_id' => $storedAnimal->id,
                    'author_id' => -1,
                    'user_id' => $animal->user_id,
                    'text' => "An animal you've posted was potentially lost/found",
                ]);
                $comment1->save();

                $comment2 = new Comment([
                    'animal_id' => $animal->id,
                    'author_id' => -1,
                    'user_id' => $storedAnimal->user_id,
                    'text' => "An animal you've posted was potentially lost/found",
                ]);
                $comment2->save();
            }
        }


        return redirect('/animals')->with('result', 'Success');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $animal = Animal::find($id);
        $animal->viewCount++;
        $animal->save();

        return view('animals.show', compact('animal'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animal = Animal::find($id);
        $animal->delete();

        return redirect('/animals')->with('success', 'Post deleted');
    }
}

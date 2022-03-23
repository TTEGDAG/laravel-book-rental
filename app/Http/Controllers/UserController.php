<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = User::find($id);
        $user = User::with('role')->findOrFail($id);

        return view('user.show', compact('user', 'book'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with('role')->find($id);

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
  
        $this->validate($request, [
            'photo' =>  'image|mimes:jpeg,jpg,gif'
        ]);

        /** is an image file is attached  */

        if( $request->hasFile('photo'))
        {
            $file   =   $request->file('photo');
            $photoFileName  =   time() . '.' . $file->getClientOriginalExtension();

            Image::make($file)->fit(300,300)->save('images/users/' . $photoFileName, 100);

        } else{

            $photoFileName = $user->photo;

        }

        /**  if the password has not been changed */

        if( $request->password == NULL)
        {
            $pass = $user->password;

        } else{

              $pass = Hash::make($request->password);

        }

        $user->firstname    =   $request->firstname;
        $user->lastname     =   $request->lasttname;
        $user->email        =   $request->email;
        $user->password     =   $pass;
        $user->photo        =   $photoFileName;

        $user->save();

        return  redirect()->back()
        ->with([
            'status'    =>  [
                'type'  => 'success',
                'content'   =>  'Poprawnie zaktualizowano Twoje dane'
            ]
        ]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function book($id)
    {
        $book = Book::findOrFail($id);

        return view('user.book', compact('book'));
    }

}

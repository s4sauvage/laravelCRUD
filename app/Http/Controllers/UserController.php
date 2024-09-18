<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request){
        return view('users-list', [
            'users' => User::paginate(1),
        ]);
    }
   
    public function edit($id){
        return view('update-user', [
            'user' => User::find($id),
        ]);
    }

    public function delete($id){

        $user = User::where('id', $id)->firstOrFail();
        $user->delete();

        return redirect()->route('users.list')->with('success', 'User deleted successfully!');
    }

    public function create(){
        return view('create-user');
    }

    public function store(CreateUserRequest $request){

        $validated = $request->validated();        
        
        if(request()->has('image')){
            $imagePath = request()->file('image')->store('profile', 'public');
            $validated['image'] = $imagePath;
        }else{
            $validated['image'] = null;
        }   

        $user = User::create([
            'name' => $validated['name'],
            'dob' => $validated['dob'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'image' => $validated['image'],
        ]);

        return redirect()->route('users.list')->with('success', 'user created successfully!');
    }
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
    
        $validated = $request->validated();
    
        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
    
            $imagePath = $request->file('image')->store('profile', 'public');
            $validated['image'] = $imagePath;
        }
    
        $user->update($validated);
    
        return redirect()->route('users.list');
    }
    

}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user(){
        $users = User::all();
        return view('admin.user', ['users' => $users]);
    }
    public function edit(User $user)
    {
        return view('admin.edit_user', ['user' => $user]); // Pass the user to the view
    }

    // Update a specific user in the database
    public function update(Request $request, User $user)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'usertype' => 'required|string|max:255',
        ]);

        // Update the user with validated data
        $user->update($validatedData);

        // Redirect back with a success message
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // Delete a specific user from the database
    public function destroy(User $user)
    {
        $user->delete(); // Delete the user

        // Redirect back with a success message
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}

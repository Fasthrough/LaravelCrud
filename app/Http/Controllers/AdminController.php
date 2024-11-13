<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Display the admin dashboard with the list of users
    public function index()
    {
        // Fetch all users to display in the admin dashboard
        $users = User::all();

        // Return the admin dashboard view with the users
        return view('admin.admindashboard', compact('users'));
    }

    // Show the form to edit a specific user
    public function edit($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Return the edit view with the user's information
        return view('admin.edit-user', compact('user'));
    }

    // Update the user in the database
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id, // Ensure the email is unique except for the current user
        ]);

        // Find the user by ID
        $user = User::findOrFail($id);

        // Update the user's details
        $user->username = $request->input('username');
        $user->email = $request->input('email');

        // Update password only if provided
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        // Save the changes
        $user->save();

        // Redirect back to the admin dashboard with a success message
        return redirect()->route('admin.dashboard')->with('success', 'User updated successfully.');
    }

    // Delete the user from the database
    public function destroy($id)
    {
        // Find the user by ID and delete them
        $user = User::findOrFail($id);
        $user->delete();

        // Redirect back to the admin dashboard with a success message
        return redirect()->route('admin.dashboard')->with('success', 'User deleted successfully.');
    }
}

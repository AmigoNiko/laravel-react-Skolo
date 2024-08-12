<?php

namespace App\Http\Controllers;

use App\Models\UserInformation;
use Illuminate\Http\Request;

class UserInformationController extends Controller
{
    public function index()
    {
        $userInformation = UserInformation::all();
        return view('userInformation.index', compact('userInformation'));
    }

    public function create()
    {
        return view('userInformation.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'path' => 'required|string|max:255',
            'color' => 'required|string|max:7',
        ]);

        UserInformation::create($request->all());
        return redirect()->route('userInformation.index');
    }

    public function show(UserInformation $userInformation)
    {
        return view('userInformation.show', compact('userInformation'));
    }

    public function edit(UserInformation $userInformation)
    {
        return view('userInformation.edit', compact('userInformation'));
    }

    public function update(Request $request, UserInformation $userInformation)
    {
        $request->validate([
            'name' => 'string|max:255',
            'path' => 'string|max:255',
            'color' => 'string|max:7',
        ]);

        $userInformation->update($request->all());
        return redirect()->route('userInformation.index');
    }

    public function destroy(UserInformation $userInformation)
    {
        $userInformation->delete();
        return redirect()->route('userInformation.index');
    }
}


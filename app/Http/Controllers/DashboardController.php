<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $resumes = Resume::all();

        return view('dashboard', compact('resumes'));
    }

    public function create(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                '_image' => 'required',
                'email' => 'required',
                'contact' => 'required',
                'address' => 'required',
            ]);

            if ($request->hasFile('_image')) {
                $imageName = time() . '.' . $request->_image->extension();
                $request->_image->move(public_path('images'), $imageName);
                $request->merge(['image' => './' . $imageName]);
            }

            $educations = [];
            foreach (['college', 'elementary', 'highschool'] as $key) {
                if (!empty($request->{$key . "_education"})) {
                    $educations[$key] = $request->{$key . "_education"};
                }
            }
            if (!empty($educations)) {
                $request->merge(['education' => $educations]);
            }


            Resume::create($request->all());

            return redirect()->route('dashboard.index')->with('success', 'Resume created successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => $th->getMessage()])->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'address' => 'required',
            'education' => 'required',
            'skills' => 'required',
        ]);

        $resume = Resume::find($id);
        $resume->update($request->all());

        return Resume::all();
    }

    public function show($id)
    {
        $resume = Resume::find($id);
        return view('resume', $resume);
    }

    public function delete($id)
    {
        $resume = Resume::find($id);

        if ($resume) {
            $imagePath = public_path('images') . '/' . basename($resume->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $resume->delete();
        }

        return;
    }
}

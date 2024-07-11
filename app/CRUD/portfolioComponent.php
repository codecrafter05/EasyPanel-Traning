<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\portfolio;

class portfolioComponent implements CRUDComponent
{
    // Manage actions in crud
    public $create = true;
    public $delete = true;
    public $update = true;

    // If you will set it true it will automatically
    // add `user_id` to create and update action
    public $with_user_id = true;

    public function getModel()
    {
        return portfolio::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return ['title', 'subtitle', 'image'];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return ['title', 'subtitle', 'image'];
    }

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "checkbox", "text", "select", "file", "textarea"
    // "password", "number", "email", "select", "date", "datetime", "time"
    public function inputs()
    {
        return [
            'title' => 'text',
            'subtitle' => 'text',
            'image' => 'file',
        ];
    }

    // Validation in update and create actions
    // It uses Laravel validation system
    public function validationRules()
    {
        return ['title' => 'required',];
    }

    // Where files will store for inputs
    public function storePaths()
    {
        return ['image' => 'uploads/portfolio',];
    }
    public function updateportfolio(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);

        $file = $request->file('image');
        $filename = $file->hashName();

        // Ensure the file is stored in 'uploads/portfolio'
        $path = $file->storeAs('uploads/portfolio', $filename, 'public');

        // Save or update the portfolio path in the database
        $portfolio = portfolio::firstOrNew();  // Assuming there's only one portfolio record
        $portfolio->image = 'uploads/portfolio/' . $filename;  // Save the path as 'uploads/portfolio/filename.png'
        $portfolio->save();

        return back()->with('success', 'portfolio updated successfully!');
    }
}

<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\home;

class homeComponent implements CRUDComponent
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
        return home::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return [
            'title',
            'subtitle',
            'file_path',

        ];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return [
            
            'title',
            'subtitle',
            'file_path',
        
        ];
    }

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "checkbox", "text", "select", "file", "textarea"
    // "password", "number", "email", "select", "date", "datetime", "time"
    public function inputs()
    {
        return [
            'title' => 'text',
            'subtitle' => 'text',
            'file_path' => 'file',

        ];
    }

    // Validation in update and create actions
    // It uses Laravel validation system
    public function validationRules()
    {
        return [
            'title' => 'required',
        ];
    }

    // Where files will store for inputs
    public function storePaths()
    {
        return [
            'file_path' => 'uploads/home',
        ];
    }



    public function updatehome(Request $request)
    {
        $request->validate([
            'file_path' => 'required|image|max:2048',
        ]);

        $file = $request->file('file_path');
        $filename = $file->hashName();

        // Ensure the file is stored in 'uploads/home'
        $path = $file->storeAs('uploads/home', $filename, 'public');

        // Save or update the home path in the database
        $home = home::firstOrNew();  // Assuming there's only one home record
        $home->file_path = 'uploads/home/' . $filename;  // Save the path as 'uploads/home/filename.png'
        $home->save();

        return back()->with('success', 'home updated successfully!');
    }
}

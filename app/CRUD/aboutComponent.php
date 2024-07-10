<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\about;

class aboutComponent implements CRUDComponent
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
        return about::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return ['text1', 'title', 'subtitle', 'file_path'];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return ['text1', 'title', 'subtitle', 'file_path'];
    }

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "checkbox", "text", "select", "file", "textarea"
    // "password", "number", "email", "select", "date", "datetime", "time"
    public function inputs()
    {
        return [
            'text1' => 'text',
            'title' => 'text',
            'subtitle' => 'text',
            'file_path' => 'file',
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
        return ['file_path' => 'uploads/about',];
    }

    public function updateabout(Request $request)
    {
        $request->validate([
            'file_path' => 'required|image|max:2048',
        ]);

        $file = $request->file('file_path');
        $filename = $file->hashName();

        // Ensure the file is stored in 'uploads/about'
        $path = $file->storeAs('uploads/about', $filename, 'public');

        // Save or update the about path in the database
        $about = about::firstOrNew();  // Assuming there's only one about record
        $about->file_path = 'uploads/about/' . $filename;  // Save the path as 'uploads/about/filename.png'
        $about->save();

        return back()->with('success', 'about updated successfully!');
    }
}

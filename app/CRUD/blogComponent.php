<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\blog;

class blogComponent implements CRUDComponent
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
        return blog::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return ['title', 'creator', 'like', 'comment', 'subtitle', 'image'];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return ['title', 'creator', 'like', 'comment', 'subtitle', 'image'];
    }

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "checkbox", "text", "select", "file", "textarea"
    // "password", "number", "email", "select", "date", "datetime", "time"
    public function inputs()
    {
        return [
                'title' => 'text', 
                'creator' => 'text', 
                'like' => 'number', 
                'comment' => 'number', 
                'subtitle' => 'text', 
                'image'=> 'file',
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
        return ['image' => 'uploads/blog',];
    }
    public function updatetestmonial(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);

        $file = $request->file('image');
        $filename = $file->hashName();

        // Ensure the file is stored in 'uploads/blog'
        $path = $file->storeAs('uploads/blog', $filename, 'public');

        // Save or update the blog path in the database
        $blog = blog::firstOrNew();  // Assuming there's only one blog record
        $blog->image = 'uploads/blog/' . $filename;  // Save the path as 'uploads/blog/filename.png'
        $blog->save();

        return back()->with('success', 'blog updated successfully!');
    }
}

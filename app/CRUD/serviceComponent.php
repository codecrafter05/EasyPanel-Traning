<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\service;

class serviceComponent implements CRUDComponent
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
        return service::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return ['title', 'subtitle', 'icon'];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return ['title', 'subtitle', 'icon'];
    }

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "checkbox", "text", "select", "file", "textarea"
    // "password", "number", "email", "select", "date", "datetime", "time"
    public function inputs()
    {
        return [
            'title' => 'text',
            'subtitle' => 'text',
            'icon' => 'file',
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
        return ['icon' => 'uploads/service',];
    }
    public function updateservice(Request $request)
    {
        $request->validate([
            'icon' => 'required|image|max:2048',
        ]);

        $file = $request->file('icon');
        $filename = $file->hashName();

        // Ensure the file is stored in 'uploads/service'
        $path = $file->storeAs('uploads/service', $filename, 'public');

        // Save or update the service path in the database
        $service = service::firstOrNew();  // Assuming there's only one service record
        $service->icon = 'uploads/service/' . $filename;  // Save the path as 'uploads/service/filename.png'
        $service->save();

        return back()->with('success', 'service updated successfully!');
    }
}

<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('UpdateTitle', ['name' => __('Home') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Home')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Update') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="update" enctype="multipart/form-data">

        <div class="card-body">

                        <!-- Title Input -->
            <div class='form-group'>
                <label for='input-title' class='col-sm-2 control-label '> {{ __('Title') }}</label>
                <input type='text' id='input-title' wire:model.lazy='title' class="form-control  @error('title') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('title') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Subtitle Input -->
            <div class='form-group'>
                <label for='input-subtitle' class='col-sm-2 control-label '> {{ __('Subtitle') }}</label>
                <input type='text' id='input-subtitle' wire:model.lazy='subtitle' class="form-control  @error('subtitle') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('subtitle') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- File_path Input -->
            <div class='form-group'>
                <label for='input-file_path' class='col-sm-2 control-label '> {{ __('File_path') }}</label>
                <input type='file' id='input-file_path' wire:model='file_path' class="form-control-file  @error('file_path') is-invalid @enderror">
                @if($file_path and !$errors->has('file_path') and $file_path instanceof Illuminate\Http\UploadedFile and $file_path->isPreviewable())
                    <a href="{{ $file_path->temporaryUrl() }}" target="_blank"><img width="200" height="200" class="mt-3 img-fluid shadow" src="{{ $file_path->temporaryUrl() }}" alt=""></a>
                @endif
                @error('file_path') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>


        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Update') }}</button>
            <a href="@route(getRouteName().'.home.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>

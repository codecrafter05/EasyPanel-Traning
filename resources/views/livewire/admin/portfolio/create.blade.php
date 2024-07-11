<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('CreateTitle', ['name' => __('Portfolio') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.portfolio.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Portfolio')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Create') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">

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
            <!-- Image Input -->
            <div class='form-group'>
                <label for='input-image' class='col-sm-2 control-label '> {{ __('Image') }}</label>
                <input type='file' id='input-image' wire:model='image' class="form-control-file  @error('image') is-invalid @enderror">
                @if($image and !$errors->has('image') and $image instanceof Illuminate\Http\UploadedFile and $image->isPreviewable())
                    <a href="{{ $image->temporaryUrl() }}" target="_blank"><img width="200" height="200" class="mt-3 img-fluid shadow" src="{{ $image->temporaryUrl() }}" alt=""></a>
                @endif
                @error('image') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Create') }}</button>
            <a href="@route(getRouteName().'.portfolio.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>

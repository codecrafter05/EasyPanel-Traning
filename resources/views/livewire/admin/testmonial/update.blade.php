<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('UpdateTitle', ['name' => __('Testmonial') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.testmonial.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Testmonial')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Update') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="update" enctype="multipart/form-data">

        <div class="card-body">

                        <!-- Name Input -->
            <div class='form-group'>
                <label for='input-name' class='col-sm-2 control-label '> {{ __('Name') }}</label>
                <input type='text' id='input-name' wire:model.lazy='name' class="form-control  @error('name') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('name') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Comment Input -->
            <div class='form-group'>
                <label for='input-comment' class='col-sm-2 control-label '> {{ __('Comment') }}</label>
                <input type='text' id='input-comment' wire:model.lazy='comment' class="form-control  @error('comment') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('comment') <div class='invalid-feedback'>{{ $message }}</div> @enderror
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
            <button type="submit" class="btn btn-info ml-4">{{ __('Update') }}</button>
            <a href="@route(getRouteName().'.testmonial.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>

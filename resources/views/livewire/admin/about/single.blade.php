<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $about->text1 }}</td>
    <td class="">{{ $about->title }}</td>
    <td class="">{{ $about->subtitle }}</td>
    <td class="">{{ $about->file_path }}</td>
    
    @if(getCrudConfig('About')->delete or getCrudConfig('About')->update)
        <td>

            @if(getCrudConfig('About')->update && hasPermission(getRouteName().'.about.update', 1, 1, $about))
                <a href="@route(getRouteName().'.about.update', $about->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('About')->delete && hasPermission(getRouteName().'.about.delete', 1, 1, $about))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('About') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('About') ]) }}</p>
                        <div class="mt-5 d-flex justify-content-between">
                            <a wire:click.prevent="delete" class="text-white btn btn-success shadow">{{ __('Yes, Delete it.') }}</a>
                            <a @click.prevent="modalIsOpen = false" class="text-white btn btn-danger shadow">{{ __('No, Cancel it.') }}</a>
                        </div>
                    </div>
                </div>
            @endif
        </td>
    @endif
</tr>

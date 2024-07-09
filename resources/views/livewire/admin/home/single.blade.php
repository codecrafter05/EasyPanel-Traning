<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $home->title }}</td>
    <td class="">{{ $home->subtitle }}</td>
    <td class="">{{ $home->file_path }}</td>
    
    @if(getCrudConfig('Home')->delete or getCrudConfig('Home')->update)
        <td>

            @if(getCrudConfig('Home')->update && hasPermission(getRouteName().'.home.update', 1, 1, $home))
                <a href="@route(getRouteName().'.home.update', $home->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Home')->delete && hasPermission(getRouteName().'.home.delete', 1, 1, $home))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Home') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Home') ]) }}</p>
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

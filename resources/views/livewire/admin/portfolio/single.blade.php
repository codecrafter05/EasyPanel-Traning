<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $portfolio->title }}</td>
    <td class="">{{ $portfolio->subtitle }}</td>
    <td class="">{{ $portfolio->image }}</td>
    
    @if(getCrudConfig('Portfolio')->delete or getCrudConfig('Portfolio')->update)
        <td>

            @if(getCrudConfig('Portfolio')->update && hasPermission(getRouteName().'.portfolio.update', 1, 1, $portfolio))
                <a href="@route(getRouteName().'.portfolio.update', $portfolio->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Portfolio')->delete && hasPermission(getRouteName().'.portfolio.delete', 1, 1, $portfolio))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Portfolio') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Portfolio') ]) }}</p>
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

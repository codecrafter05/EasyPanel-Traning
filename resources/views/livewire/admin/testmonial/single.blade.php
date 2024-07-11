<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $testmonial->name }}</td>
    <td class="">{{ $testmonial->comment }}</td>
    <td class="">{{ $testmonial->image }}</td>
    
    @if(getCrudConfig('Testmonial')->delete or getCrudConfig('Testmonial')->update)
        <td>

            @if(getCrudConfig('Testmonial')->update && hasPermission(getRouteName().'.testmonial.update', 1, 1, $testmonial))
                <a href="@route(getRouteName().'.testmonial.update', $testmonial->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Testmonial')->delete && hasPermission(getRouteName().'.testmonial.delete', 1, 1, $testmonial))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Testmonial') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Testmonial') ]) }}</p>
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

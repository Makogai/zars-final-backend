<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('location_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Location" format="csv" />
                <livewire:excel-export model="Location" format="xlsx" />
                <livewire:excel-export model="Location" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.location.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.location.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.location.fields.description') }}
                            @include('components.table.sort', ['field' => 'description'])
                        </th>
                        <th>
                            {{ trans('cruds.location.fields.rating') }}
                            @include('components.table.sort', ['field' => 'rating'])
                        </th>
                        <th>
                            {{ trans('cruds.location.fields.price') }}
                            @include('components.table.sort', ['field' => 'price'])
                        </th>
                        <th>
                            {{ trans('cruds.location.fields.images') }}
                        </th>
                        <th>
                            {{ trans('cruds.location.fields.cetagory') }}
                            @include('components.table.sort', ['field' => 'cetagory.name'])
                        </th>
                        <th>
                            {{ trans('cruds.location.fields.lat') }}
                            @include('components.table.sort', ['field' => 'lat'])
                        </th>
                        <th>
                            {{ trans('cruds.location.fields.lng') }}
                            @include('components.table.sort', ['field' => 'lng'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($locations as $location)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $location->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $location->id }}
                            </td>
                            <td>
                                {{ $location->name }}
                            </td>
                            <td>
                                {{ $location->description }}
                            </td>
                            <td>
                                {{ $location->rating }}
                            </td>
                            <td>
                                {{ $location->price }}
                            </td>
                            <td>
                                @foreach($location->images as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @if($location->cetagory)
                                    <span class="badge badge-relationship">{{ $location->cetagory->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $location->lat }}
                            </td>
                            <td>
                                {{ $location->lng }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('location_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.locations.show', $location) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('location_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.locations.edit', $location) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('location_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $location->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $locations->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush
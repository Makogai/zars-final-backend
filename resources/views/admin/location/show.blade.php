@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.location.title_singular') }}:
                    {{ trans('cruds.location.fields.id') }}
                    {{ $location->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.location.fields.id') }}
                            </th>
                            <td>
                                {{ $location->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.location.fields.name') }}
                            </th>
                            <td>
                                {{ $location->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.location.fields.description') }}
                            </th>
                            <td>
                                {{ $location->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.location.fields.rating') }}
                            </th>
                            <td>
                                {{ $location->rating }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.location.fields.price') }}
                            </th>
                            <td>
                                {{ $location->price }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.location.fields.images') }}
                            </th>
                            <td>
                                @foreach($location->images as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.location.fields.cetagory') }}
                            </th>
                            <td>
                                @if($location->cetagory)
                                    <span class="badge badge-relationship">{{ $location->cetagory->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('location_edit')
                    <a href="{{ route('admin.locations.edit', $location) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.locations.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
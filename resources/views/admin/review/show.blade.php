@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.review.title_singular') }}:
                    {{ trans('cruds.review.fields.id') }}
                    {{ $review->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.review.fields.id') }}
                            </th>
                            <td>
                                {{ $review->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.review.fields.title') }}
                            </th>
                            <td>
                                {{ $review->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.review.fields.description') }}
                            </th>
                            <td>
                                {{ $review->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.review.fields.rating') }}
                            </th>
                            <td>
                                {{ $review->rating }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.review.fields.location') }}
                            </th>
                            <td>
                                @if($review->location)
                                    <span class="badge badge-relationship">{{ $review->location->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('review_edit')
                    <a href="{{ route('admin.reviews.edit', $review) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.reviews.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
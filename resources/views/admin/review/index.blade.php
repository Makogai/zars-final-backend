@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.review.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('review_create')
                    <a class="btn btn-indigo" href="{{ route('admin.reviews.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.review.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('review.index')

    </div>
</div>
@endsection
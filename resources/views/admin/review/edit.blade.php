@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.review.title_singular') }}:
                    {{ trans('cruds.review.fields.id') }}
                    {{ $review->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('review.edit', [$review])
        </div>
    </div>
</div>
@endsection
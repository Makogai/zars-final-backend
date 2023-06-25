<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('review.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.review.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="review.title">
        <div class="validation-message">
            {{ $errors->first('review.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.review.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('review.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.review.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="review.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('review.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.review.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('review.rating') ? 'invalid' : '' }}">
        <label class="form-label required" for="rating">{{ trans('cruds.review.fields.rating') }}</label>
        <input class="form-control" type="number" name="rating" id="rating" required wire:model.defer="review.rating" step="0.1" min="1" max="5">
        <div class="validation-message">
            {{ $errors->first('review.rating') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.review.fields.rating_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('review.location_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="location">{{ trans('cruds.review.fields.location') }}</label>
        <x-select-list class="form-control" required id="location" name="location" :options="$this->listsForFields['location']" wire:model="review.location_id" />
        <div class="validation-message">
            {{ $errors->first('review.location_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.review.fields.location_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.reviews.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('location.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.location.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="location.name">
        <div class="validation-message">
            {{ $errors->first('location.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.location.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('location.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.location.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="location.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('location.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.location.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('location.rating') ? 'invalid' : '' }}">
        <label class="form-label" for="rating">{{ trans('cruds.location.fields.rating') }}</label>
        <input class="form-control" type="number" name="rating" id="rating" wire:model.defer="location.rating" step="0.1" min="1" max="5">
        <div class="validation-message">
            {{ $errors->first('location.rating') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.location.fields.rating_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('location.price') ? 'invalid' : '' }}">
        <label class="form-label" for="price">{{ trans('cruds.location.fields.price') }}</label>
        <input class="form-control" type="number" name="price" id="price" wire:model.defer="location.price" step="0.01">
        <div class="validation-message">
            {{ $errors->first('location.price') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.location.fields.price_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.location_images') ? 'invalid' : '' }}">
        <label class="form-label" for="images">{{ trans('cruds.location.fields.images') }}</label>
        <x-dropzone id="images" name="images" action="{{ route('admin.locations.storeMedia') }}" collection-name="location_images" max-file-size="2" max-width="4096" max-height="4096" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.location_images') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.location.fields.images_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('location.cetagory_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="cetagory">{{ trans('cruds.location.fields.cetagory') }}</label>
        <x-select-list class="form-control" required id="cetagory" name="cetagory" :options="$this->listsForFields['cetagory']" wire:model="location.cetagory_id" />
        <div class="validation-message">
            {{ $errors->first('location.cetagory_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.location.fields.cetagory_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.locations.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
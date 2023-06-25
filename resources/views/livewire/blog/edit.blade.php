<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('blog.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.blog.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="blog.title">
        <div class="validation-message">
            {{ $errors->first('blog.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.blog.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('blog.content') ? 'invalid' : '' }}">
        <label class="form-label required" for="content">{{ trans('cruds.blog.fields.content') }}</label>
        <textarea class="form-control" name="content" id="content" required wire:model.defer="blog.content" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('blog.content') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.blog.fields.content_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.blog_image') ? 'invalid' : '' }}">
        <label class="form-label" for="image">{{ trans('cruds.blog.fields.image') }}</label>
        <x-dropzone id="image" name="image" action="{{ route('admin.blogs.storeMedia') }}" collection-name="blog_image" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.blog_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.blog.fields.image_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('blog.user_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="user">{{ trans('cruds.blog.fields.user') }}</label>
        <x-select-list class="form-control" required id="user" name="user" :options="$this->listsForFields['user']" wire:model="blog.user_id" />
        <div class="validation-message">
            {{ $errors->first('blog.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.blog.fields.user_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
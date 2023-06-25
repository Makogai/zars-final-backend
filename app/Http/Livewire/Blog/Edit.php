<?php

namespace App\Http\Livewire\Blog;

use App\Models\Blog;
use App\Models\User;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Blog $blog;

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
                ->update(['model_id' => $this->blog->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(Blog $blog)
    {
        $this->blog = $blog;
        $this->initListsForFields();
        $this->mediaCollections = [

            'blog_image' => $blog->image,

        ];
    }

    public function render()
    {
        return view('livewire.blog.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->blog->save();
        $this->syncMedia();

        return redirect()->route('admin.blogs.index');
    }

    protected function rules(): array
    {
        return [
            'blog.title' => [
                'string',
                'required',
            ],
            'blog.content' => [
                'string',
                'required',
            ],
            'mediaCollections.blog_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.blog_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'blog.user_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user'] = User::pluck('name', 'id')->toArray();
    }
}

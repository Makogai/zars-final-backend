<?php

namespace App\Http\Livewire\Location;

use App\Models\Category;
use App\Models\Location;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Location $location;

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
                ->update(['model_id' => $this->location->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(Location $location)
    {
        $this->location = $location;
        $this->initListsForFields();
        $this->mediaCollections = [

            'location_images' => $location->images,

        ];
    }

    public function render()
    {
        return view('livewire.location.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->location->save();
        $this->syncMedia();

        return redirect()->route('admin.locations.index');
    }

    protected function rules(): array
    {
        return [
            'location.name' => [
                'string',
                'required',
            ],
            'location.description' => [
                'string',
                'nullable',
            ],
            'location.rating' => [
                'numeric',
                'min:1',
                'max:5',
                'nullable',
            ],
            'location.price' => [
                'numeric',
                'nullable',
            ],
            'mediaCollections.location_images' => [
                'array',
                'nullable',
            ],
            'mediaCollections.location_images.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'location.cetagory_id' => [
                'integer',
                'exists:categories,id',
                'required',
            ],
            'location.lat' => [
                'numeric',
                'nullable',
            ],
            'location.lng' => [
                'numeric',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['cetagory'] = Category::pluck('name', 'id')->toArray();
    }
}

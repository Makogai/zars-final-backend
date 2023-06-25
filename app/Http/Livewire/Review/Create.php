<?php

namespace App\Http\Livewire\Review;

use App\Models\Location;
use App\Models\Review;
use Livewire\Component;

class Create extends Component
{
    public Review $review;

    public array $listsForFields = [];

    public function mount(Review $review)
    {
        $this->review         = $review;
        $this->review->rating = '1';
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.review.create');
    }

    public function submit()
    {
        $this->validate();

        $this->review->save();

        return redirect()->route('admin.reviews.index');
    }

    protected function rules(): array
    {
        return [
            'review.title' => [
                'string',
                'required',
            ],
            'review.description' => [
                'string',
                'nullable',
            ],
            'review.rating' => [
                'numeric',
                'min:1',
                'max:5',
                'required',
            ],
            'review.location_id' => [
                'integer',
                'exists:locations,id',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['location'] = Location::pluck('name', 'id')->toArray();
    }
}

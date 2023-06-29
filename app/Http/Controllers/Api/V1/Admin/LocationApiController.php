<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;
use App\Http\Resources\Admin\LocationResource;
use App\Models\Location;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LocationApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
//        abort_if(Gate::denies('location_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LocationResource(Location::with(['cetagory'])->orderBy('id', 'desc')->get());
    }

    public function homePlaces()
    {
//        abort_if(Gate::denies('location_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LocationResource(Location::with(['cetagory'])->orderBy('id', 'desc')->take(9)->get());
    }

    public function store(StoreLocationRequest $request)
    {
        $location = Location::create($request->validated());

        foreach ($request->input('location_images', []) as $file) {
            $location->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('location_images');
        }

        return (new LocationResource($location))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Location $location)
    {
//        abort_if(Gate::denies('location_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LocationResource($location->load(['cetagory', 'reviews']));
    }

    public function addReview(){
        $data = request()->validate([
            'location_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'rating' => 'required',
        ]);
        $review = \App\Models\Review::create($data);
        return response()->json($review);
    }

    public function update(UpdateLocationRequest $request, Location $location)
    {
        $location->update($request->validated());

        if (count($location->location_images) > 0) {
            foreach ($location->location_images as $media) {
                if (! in_array($media->file_name, $request->input('location_images', []))) {
                    $media->delete();
                }
            }
        }
        $media = $location->location_images->pluck('file_name')->toArray();
        foreach ($request->input('location_images', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $location->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('location_images');
            }
        }

        return (new LocationResource($location))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Location $location)
    {
        abort_if(Gate::denies('location_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $location->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

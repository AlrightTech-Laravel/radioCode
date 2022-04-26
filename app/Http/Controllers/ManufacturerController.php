<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use App\Models\ManufacturerCategory;
use App\Models\RadioSerialNumber;
use App\Models\Serials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ManufacturerController extends Controller {
    public function index() {
        $data = [
            'manufacturers' => Manufacturer::with('brand')->with('serials')->orderByDesc('title')->get(),
        ];

        return view('manufacturer.index', $data);
    }

    public function create() {
        $data = [
            'brands' => ManufacturerCategory::all(),
        ];
        return view('manufacturer.create', $data);
    }

    public function store(Request $request) {
        $request->validate([
            'title' => ['required', 'min:2', 'max:125'],
            'brand_id' => ['required'],
            'uri' => ['required', 'min:2', 'max:125', 'alpha_dash'],
            'price' => ['required', 'numeric', 'min:0.00'],
            // 'delivery_time' => ['required', 'string', 'max:125'],
            'required_fields' => ['nullable', 'array', 'min:1', Rule::in(array_keys(Manufacturer::$requiredFields))],
            'description' => ['required', 'string', 'min:10', 'max:30000'],
            'logo' => ['sometimes', 'image', 'mimes:png,jpg,jpeg', 'min:1', 'max:1024'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg', 'min:1', 'max:1024'],
        ]);
        $brand = ManufacturerCategory::where('id', $request->brand_id)->first();
        $model_data = [
            'title' => $request->title,
            'slug' => $request->uri,
            'price' => $request->price,
            'delivery_time' => $request->delivery_time,
            'hours' => $request->hours,
            'required_fields' => $request->required_fields ?? [],
            'description' => $request->description,
            'how_it_works' => $request->how_it_works,
            'status' => 2,
            'category_id' => $request->brand_id,
            'is_free_radio' => $request->is_free ? 1 : 0,
            'popular' => $request->popular ? 1 : 0,
            'linked' => $request->linked ? 1 : 0,
            'target' => $brand->target,
            'sample_serials' => $request->sample_serials,
        ];

        if ($request->logo) {
            $extension = $request->file('logo')->extension();
            $filename = pathinfo($request->file('logo')->getClientOriginalName(), PATHINFO_FILENAME);
            $logos_path = $request->file('logo')->storePublicly('manufacturer/logos/', ['disk' => 'public']);

            $model_data['logo'] = [
                'ext' => $extension,
                'name' => $filename,
                'path' => $logos_path,
            ];
        }

        if ($request->image) {
            $extension = $request->file('image')->extension();
            $filename = pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME);
            $images_path = $request->file('image')->storePublicly('manufacturer/images/', ['disk' => 'public']);

            $model_data['image'] = [
                'ext' => $extension,
                'name' => $filename,
                'path' => $images_path,
            ];
        }

        $manufacturer = Manufacturer::create($model_data);

        if ($manufacturer) {
            return redirect()->route('admin.manufacturer.index')->withSuccessMessage('Your manufacturer has been created.');
        }

        return redirect()->route('admin.manufacturer.index')->withErrorMessage('Your manufacturer cannot be created at the moment.<br>Please try again.');
    }

    public function edit(Manufacturer $manufacturer) {
        $data = [
            'manufacturer' => Manufacturer::where('id', $manufacturer->id)->with('brand')->first(),
            'brands' => ManufacturerCategory::all(),
        ];
        return view('manufacturer.edit', $data);
    }

    public function update(Request $request, Manufacturer $manufacturer) {
        $request->validate([
            'title' => ['required', 'min:2', 'max:125'],
            'brand_id' => ['required'],
            'uri' => ['required', 'min:2', 'max:125', 'alpha_dash'],
            'price' => ['required', 'numeric', 'min:0.00'],
            // 'delivery_time' => ['required', 'string', 'max:125'],
            'required_fields' => ['nullable', 'array', 'min:1', Rule::in(array_keys(Manufacturer::$requiredFields))],
            'description' => ['required', 'string', 'min:10', 'max:30000'],
            'logo' => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'min:1', 'max:1024'],
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'min:1', 'max:1024'],
        ]);

        $model_data = [
            'title' => $request->title,
            'slug' => $request->uri,
            'price' => $request->price,
            'delivery_time' => $request->delivery_time,
            'hours' => $request->hours,
            'required_fields' => $request->required_fields ?? [],
            'description' => $request->description,
            'how_it_works' => $request->how_it_works,
            'status' => 2,
            'category_id' => $request->brand_id,
            'popular' => $request->popular ? 1 : 0,
            'is_free_radio' => $request->is_free ? 1 : 0,
            'linked' => $request->linked ? 1 : 0,
            'sample_serials' => $request->sample_serials,
        ];

        if ($request->logo) {
            $extension = $request->file('logo')->extension();
            $filename = pathinfo($request->file('logo')->getClientOriginalName(), PATHINFO_FILENAME);
            $logos_path = $request->file('logo')->storePublicly('manufacturer/logos/', ['disk' => 'public']);

            $model_data['logo'] = [
                'ext' => $extension,
                'name' => $filename,
                'path' => $logos_path,
            ];
        }

        if ($request->image) {
            $extension = $request->file('image')->extension();
            $filename = pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME);
            $images_path = $request->file('image')->storePublicly('manufacturer/images/', ['disk' => 'public']);

            $model_data['image'] = [
                'ext' => $extension,
                'name' => $filename,
                'path' => $images_path,
            ];
        }

        $updated = $manufacturer->update($model_data);

        if ($updated) {
            if (isset($model_data['logo'])) {
                Storage::disk('public')->delete($manufacturer->logo['path']);
            }

            if (isset($model_data['image'])) {
                Storage::disk('public')->delete($manufacturer->image['path']);
            }

            return redirect()->route('admin.manufacturer.index')->withSuccessMessage('Your manufacturer has been updated.');
        }

        return redirect()->route('admin.manufacturer.index')->withErrorMessage('Your manufacturer cannot be updated at the moment.<br>Please try again.');
    }

    public function destroy(Manufacturer $manufacturer) {
        $deleted = $manufacturer->delete();

        $deletedSerials = Serials::where('manufacturer_id', $manufacturer->id)->delete();
        if ($deleted) {
            return redirect()->route('admin.manufacturer.index')->withSuccessMessage('Manufacturer has been deleted successfully!');
        }
        return redirect()->route('admin.manufacturer.index')->withErrorMessage('Couldn\'t delete the manufacturer. Please try again.');
    }
    public function manufacturerBrands() {
        $brands = ManufacturerCategory::all();
        $targets = RadioSerialNumber::groupBy('target')->get();
        // dd($brands);
        return view('brands.index', compact('brands', 'targets'));
    }
    public function manufacturerBrandCreate(Request $request) {
        $request->validate([
            'name' => ['required', 'min:2', 'max:125'],
            'logo' => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'min:1', 'max:1024'],
            'target' => ['required'],
        ]);

        $model_data = [
            'name' => $request->name,
            'target' => $request->target,
        ];
        if ($request->logo) {
            $extension = $request->file('logo')->extension();
            $filename = pathinfo($request->file('logo')->getClientOriginalName(), PATHINFO_FILENAME);
            $logos_path = $request->file('logo')->storePublicly('manufacturer/logos/', ['disk' => 'public']);

            $model_data['logo'] = [
                'ext' => $extension,
                'name' => $filename,
                'path' => $logos_path,
            ];
        }
        $manufacturer = ManufacturerCategory::create($model_data);

        if ($manufacturer) {
            return redirect()->route('admin.manufacturer.ManufacturerBrands')->withSuccessMessage('Your brand has been created.');
        }

        return redirect()->route('admin.manufacturer.ManufacturerBrands')->withErrorMessage('Your manufacturer cannot be created at the moment.<br>Please try again.');
    }
    public function manufacturerBrandUpdate(Request $request, $id) {
        $request->validate([
            'name' => ['required', 'min:2', 'max:125'],
            'logo' => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'min:1', 'max:1024'],
            'target' => ['required'],
        ]);

        $brand = ManufacturerCategory::where('id', $id)->first();
        $brand->name = $request->name;
        $brand->target = $request->target;

        if ($request->logo) {
            $extension = $request->file('logo')->extension();
            $filename = pathinfo($request->file('logo')->getClientOriginalName(), PATHINFO_FILENAME);
            $logos_path = $request->file('logo')->storePublicly('manufacturer/logos/', ['disk' => 'public']);

            $model_data['logo'] = [
                'ext' => $extension,
                'name' => $filename,
                'path' => $logos_path,
            ];
            $brand->logo = $model_data['logo'];
        }
        $brand->update();

        if ($brand) {
            return redirect()->route('admin.manufacturer.ManufacturerBrands')->withSuccessMessage('Your brand has been Updated.');
        }

        return redirect()->route('admin.manufacturer.ManufacturerBrands')->withErrorMessage('Your manufacturer cannot be created at the moment.<br>Please try again.');
    }
    public function manufacturerBrandEdit($id) {
        $brand = ManufacturerCategory::where('id', $id)->first();
        $targets = RadioSerialNumber::groupBy('target')->get();
        return view('brands.edit', compact('brand', 'targets'));
    }
    public function manufacturerBrandDelete(ManufacturerCategory $brand) {
        $manufacturer = Manufacturer::where('category_id', $brand->id)->first();
        if ($manufacturer) {
            return redirect()->route('admin.manufacturer.ManufacturerBrands')->withErrorMessage('Couldn\'t delete the brand. Manufacturers are Assigned to this Brand.');
        } else {
            $deleted = $brand->delete();
            if ($deleted) {
                return redirect()->route('admin.manufacturer.ManufacturerBrands')->withSuccessMessage('Brand has been deleted successfully!');
            }
        }

        return redirect()->route('admin.manufacturer.ManufacturerBrands')->withErrorMessage('Couldn\'t delete the brand. Please try again.');
    }
    public function manufacturerSerials($manufacturer_id) {
        $serials = Serials::where('manufacturer_id', $manufacturer_id)->get();
        return view('serials.index', compact('serials', 'manufacturer_id'));
    }
    public function manufacturerSerialDelete($serial_id, Request $request) {
        $serials = Serials::where('id', $serial_id)->delete();
        return redirect()->back()->withSuccessMessage('Serial Deleted Successfully');
    }
    public function ManufacturerSerialCreate(Request $request) {
        $request->validate([
            'regex' => 'required',
            'regex_partial' => 'required',
            'serial_number' => 'required',
            'time' => 'required',
            'timing_msg' => 'required',
            'price' => 'required',
            // 'required_fields' => ['nullable', 'array', 'min:1', Rule::in(array_keys(Manufacturer::$requiredFields))],
            'manufacturer_id' => 'required',
        ]);

        $brand =
        $model_data = [
            'regex' => $request->regex,
            'regex_partial' => $request->regex_partial,
            'serial_number' => $request->serial_number,
            'time' => $request->time,
            'timing_msg' => $request->timing_msg,
            'price' => $request->price,
            // 'required_fields' => $request->required_fields ?? [],
            'manufacturer_id' => $request->manufacturer_id,
        ];
        $serial = Serials::create($model_data);
        $serials = Serials::where('manufacturer_id', $request->manufacturer_id)->get();
        $manufacturer_id = $request->manufacturer_id;
        return redirect()->back()->withSuccessMessage('Serial Created Successfully');
        // return view('serials.index', compact('serials', 'manufacturer_id'));
    }
}

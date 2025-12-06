<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Hooks;
use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeStoreRequest;
use App\Http\Requests\AttributeUpdateRequest;
use App\Models\Attribute;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    protected string $hook = '';

    public function __construct()
    {
        $this->hook = Str::of(
            string: request()->route('type')
        )->snake()->ucfirst();
    }

    public function index(Request $request, string $type)
    {
        $attributes = Attribute::where('type', $type)->latest()->get();

        return view('admin.pages.attributes.index', compact('type', 'attributes'));
    }

    public function store(AttributeStoreRequest $request, $type)
    {





        $attribute                  = new Attribute;
        $attribute->type            = $type;
        $attribute->name            = $request->name;
        $attribute->slug            = Str::slug($request->name);
        $attribute->image           = uploadFile($request->file('image'));
        $attribute->created_at      = now();
        $attribute->save();


        flash()->success($attribute->name . ' created successfully');
        return redirect()->route('admin.attribute.index', ['type' => $type]);
    }

    public function edit(string $type, $id)
    {
        $attribute = Attribute::findOrFail($id);
        return view('admin.pages.attributes.edit', compact('type', 'attribute'));
    }

    public function update(AttributeUpdateRequest $request, $type, $id)
    {
        $attribute  = Attribute::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($attribute->avimageatar && file_exists(public_path($attribute->image))) {
                @unlink(public_path($attribute->image));
            }

            $attribute->image   = uploadFile($request->file('image'));
        }

        $attribute->name            = $request->name;
        $attribute->slug            = Str::slug($request->name);
        $attribute->created_at      = now();
        $attribute->save();


        flash()->success($attribute->name . ' updated successfully');

        return redirect()->route('admin.attribute.index', ['type' => $type]);
    }

    public function destroy($type, $id)
    {

        $attribute =  Attribute::findOrFail($id);
        $attribute->image && file_exists(public_path($attribute->image)) && unlink(public_path($attribute->image));
        $attribute->delete();
        flash()->success( $attribute->name . ' deleted successfully.');
        return redirect()->route('admin.attribute.index', ['type' => $attribute->type]);
    }
}

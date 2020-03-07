<?php

namespace App\Traits;

use File;
use Illuminate\Support\Str;

trait ImageTrait
{
    public function storeImage($model, $request)
    {
        if ($request->has('image')) {
            $this->deleteImage($model);

            $file = $request->file('image');
            $filename = time() . Str::slug($model->name) . '.' . $file->getClientOriginalExtension();
            $file->move('uploads', $filename);

            $model->update([
                'image' => $filename
            ]);
        }
    }

    public function deleteImage($model)
    {
        File::delete('uploads/' . $model->image);
    }
}

<?php

namespace App\Http\Services;

class UploadService
{
    public function store($request)
    {
        if ($request->hasFile('file')) {
            try {
                $name = time() . '-' . $request->file('file')->getClientOriginalName() . '.' . $request->file('file')->getClientOriginalExtension();
                $pathFull = 'uploads/' . date('Y/m/d');
                $path = $request->file('file')->storeAs('public/' . $pathFull, $name);

                return '/storage/' . $pathFull . '/' . $name;
            } catch (\Throwable $th) {
                return false;
            }
        }
    }
}

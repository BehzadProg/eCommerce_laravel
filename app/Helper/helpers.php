<?php

use Carbon\Carbon;

function generateFileName($name)
{
    $year = Carbon::now()->year;
    $month = Carbon::now()->month;
    $day = Carbon::now()->day;
    $hour = Carbon::now()->hour;
    $minute = Carbon::now()->minute;
    $second = Carbon::now()->second;
    $microsecond = Carbon::now()->microsecond;

    return $year . '_' . $month . '_' . $day . '_' . $hour . '_' . $minute . '_' . $second . '_' . $microsecond . '_' . $name;
}

function handleUpload($inputName, $model = null, $pathFile = null)
{
    try {
        if (request()->hasFile($inputName)) {

            if ($model && $model->exists(public_path($model->{$inputName}))) {
                \File::delete(public_path($pathFile) . $model->{$inputName});
            }

            $file = request()->file($inputName);

            $fileName = generateFileName($file->getClientOriginalName());

            $file->move(public_path($pathFile), $fileName);

            return $fileName;
        }
    } catch (\Exception $e) {
        throw $e;
    }
}

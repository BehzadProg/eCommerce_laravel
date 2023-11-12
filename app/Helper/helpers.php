<?php

use Carbon\Carbon;

function generateFileName($name , $privateName)
{
    $year = Carbon::now()->year;
    $month = Carbon::now()->month;
    $day = Carbon::now()->day;
    $hour = Carbon::now()->hour;
    $minute = Carbon::now()->minute;
    $second = Carbon::now()->second;
    $microsecond = Carbon::now()->microsecond;

    return $year . '_' . $month . '_' . $day . '_' . $hour . '_' . $minute . '_' . $second . '_' . $microsecond . '_' . $privateName .'.' . $name;
}

function handleUpload($inputName, $model = null, $pathFile = null , $privateName = null)
{
    try {
        if (request()->hasFile($inputName)) {

            if ($model && $model->exists(public_path($model->{$inputName}))) {
                \File::delete(public_path($pathFile) . $model->{$inputName});
            }

            $file = request()->file($inputName);

            $fileName = generateFileName($file->getClientOriginalExtension() , $privateName);

            $file->move(public_path($pathFile), $fileName);

            return $fileName;
        }
    } catch (\Exception $e) {
        throw $e;
    }
}

function handleMultiUpload($inputName, $pathFile, $privateName)
{
    try {
        $imagePaths = [];
        if (request()->hasFile($inputName)) {

            $files = request()->file($inputName);

            foreach ($files as $file) {

                $fileName = generateFileName($file->getClientOriginalExtension() , $privateName);

                $file->move(public_path($pathFile), $fileName);

                array_push($imagePaths , $fileName);
            }

            return $imagePaths;
        }
    } catch (\Exception $e) {
        throw $e;
    }
}

function deleteFileIfExist($filePath)
{
    try{

        if(\File::exists(public_path($filePath))){
            \File::delete(public_path($filePath));
        }
    }catch(\Exception $e){
        throw $e;
    }
}

function setActive(array $route){
    if(is_array($route)){
        foreach($route as $r){
            if(request()->routeIs($r)){
                return 'active';
            }
        }
    }
}

/** check if the product has discount */
function checkDiscount($product){
    $currentDate = date('Y-m-d');
    if($product->offer_price > 0 && $currentDate >= $product->offer_start_date && $currentDate <= $product->offer_end_date){
        return true;
    }
    return false;
}

/** calculate discount percent */

function calculateDiscountPercend($originalPrice,$discountPrice){
    $discountAmount = $originalPrice - $discountPrice;
    $discountPercent = ($discountAmount / $originalPrice) * 100;

    return round($discountPercent);
}

function productType(string $type){
    switch ($type) {
        case 'new_arrival':
            return 'New';
            break;
        case 'featured_product':
            return 'Featured';
            break;
        case 'best_product':
            return 'Best</i>';
            break;
        case 'top_product':
            return 'Top';
            break;

        default:
            return '';
            break;
    }
}

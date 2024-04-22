<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function createSlug($string)
    {
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
        $slug = preg_replace('/-+/', '-', $slug);
        return strtolower($slug);
    }

    public function formatImage($originalName)
    {
        // Loại bỏ các ký tự đặc biệt và khoảng trắng từ tên tệp 
        $cleaned_filename = preg_replace('/[\s\+\&\?\\\(\)=*"\']/', '_', $originalName);
        // Thay thế khoảng trắng bằng dấu gạch dưới
        $formattedName = str_replace(' ', '_', $cleaned_filename);

        // Trả về tên tệp đã định dạng
        return $formattedName;
    }
}

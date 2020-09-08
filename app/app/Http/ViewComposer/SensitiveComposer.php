<?php


namespace App\Http\ViewComposer;

use Illuminate\View\View;
use App\Models\SensitiveData;
use App\Models\ProductCategory;
use App\Models\PrimaryCategory;
use App\Models\Page;

class SensitiveComposer
{
    public function compose(View $view){
        $sensitive_data = SensitiveData::first();
        $header_menu = Page::where('location', 'header')->Orwhere('location', 'both')->orderBy('priority', 'asc')->get();
        $footer_menu = Page::where('location', 'footer')->Orwhere('location', 'both')->orderBy('priority', 'asc')->get();
        $primary_categories = PrimaryCategory::with('secondaryCategories')->get(); //dd($primary_categories);
        $category = ProductCategory::get();
        $view
        ->with('sensitive_data', $sensitive_data)
        ->with('header_menu', $header_menu)
        ->with('footer_menu', $footer_menu)
        ->with('primary_categories', $primary_categories)
        ->with('category', $category);
    }
}

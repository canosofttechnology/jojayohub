<?php

namespace App\Service;
use App\Models\Product;

class ProductService{

    public static function getProduct()
    {
        $name="Women's Fashion";
        $products=Product::whereHas('productCategory',function($query) use($name){
            $query->whereHas('secondaryCategory',function($query) use($name){
                $query->whereHas('primaryCategory',function($query)use($name){
                    $query->where('name',$name);
                });
            });
        })
        ->with(['productCategory'=>function($query)use($name){
            $query->whereHas('secondaryCategory',function($query)use($name){
                $query->whereHas('primaryCategory',function($query)use($name){
                    $query->where('name',$name);
                });
            });
        },
        'productCategory.secondaryCategory'=>function($query)use($name){
            $query->whereHas('primaryCategory',function($query)use ($name){
                $query->where('name',$name);
            });
        },
        'productCategory.secondaryCategory.primaryCategory'=>function($query)use($name){
            $query->where('name',$name);
        }
        ])->take(10)->get();
        return $products;
    }
}

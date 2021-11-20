<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Traits\GeneralTrait;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    use GeneralTrait;
    public function index()
    {
        $categories = Category::Selection()->get();
//        return response()->json($categories);
        return $this -> returnData('categories',$categories);

    }

    public function getCategoryById(Request $request)
    {
        $category = Category::Selection()->find($request->id);
        if (!$category)
            return $this->returnError('001', 'هذا القسم غير موجد');

        return $this->returnData('categroy', $category);
    }

    public function changeStatus(Request $request)
    {
        //validation
        Category::where('id',$request -> id) -> update(['active' =>$request ->  active]);

        return $this -> returnSuccessMessage('تم تغيير الحاله بنجاح');

    }
}

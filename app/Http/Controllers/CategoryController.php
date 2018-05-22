<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use Response;
use App\Category;
use App\Product;

class CategoryController extends Controller
{

    protected $rules =
    [
        'name' => 'required',
        'description' => 'required'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view('admin.categories.index',[
            'categories' => $categories,
        ]);
    }

    public function anyData()
    {
        return Datatables::of(Category::query())
        ->addColumn('action', function ($categories) {
          
            return '<a href="" class="show-modal btn btn-success btn-detail" data-id="'.$categories->id.'" data-title="'.$categories->name.'"    data-content="{{$categories->description}}">
                                        <span class="glyphicon glyphicon-eye-open"></span> </a>
                                        <a href="" class="edit-modal btn btn-info" data-id="'.$categories->id.'" data-title="'.$categories->name.'" data-content="{{$categories->description}}">
                                        <span class="glyphicon glyphicon-edit"></span> </a>
                                        <a href="" class="delete btn btn-danger" data-id="'.$categories->id.'">
                                        <span class="glyphicon glyphicon-trash"></span> </a>';
        })
        ->rawColumns(['description','action'])
        ->make(true);
    }


    public function changeStatus() 
    {
        $id = Category::get('id');

        $categories = Category::findOrFail($id);
        $categories->status = !$categories->status;
        $categories->save();

        return response()->json($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $categories = new Category();
            $categories->name = $request->name;
            $categories->status = $request->status;
            $categories->description = $request->description;
            $categories->save();

            // var_dump($categories);
            // die;
            return response()->json($categories);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories=Category::all();
        $products=Product::all();
        return view('admin.categories.listProduct',[
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    public function anydataListProduct($id_category){

        return Datatables::of(Product::where('category_id', '=', $id_category))->rawColumns(['description'])->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Category::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
    {   

        $validator = Validator::make($request->all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $categories = Category::findOrFail($id);
            $update = $categories->update($request->all());
            return response()->json($update);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $id = $request->all()['category_id'];
        
        Category::destroy($id);

        return \Response::json([
            'error' => false,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Yajra\Datatables\Datatables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return view('admin.products.index',[
            'products' => $products,
        ]);
        // return view('admin.layouts.master');
    }

    public function anyData()
    {
        return Datatables::of(Product::query())
        ->addColumn('action', function ($product) {
            return '<a href="" class="btn btn-xs btn-warning">
                        <span class="glyphicon glyphicon-eye-open"></span>
                    </a>
                    <a href="" class="btn btn-xs btn-primary">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <a href="" class="btn btn-xs btn-danger">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>';
        })
        ->make(true);
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
    public function addMorePost(Request $request)
    {
        $rules = [];


        foreach($request->input('name') as $key => $value) {
            $rules["name.{$key}"] = 'required';
        }


        $validator = Validator::make($request->all(), $rules);


        if ($validator->passes()) {


            foreach($request->input('name') as $key => $value) {
                TagList::create(['name'=>$value]);
            }


            return response()->json(['success'=>'done']);
        }


        return response()->json(['error'=>$validator->errors()->all()]);
    }
    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(), $this->rules);
        // if ($validator->fails()) {
        //     return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        // } else {
        //     $products = new Product();
        //     $products->name = $request->name;
        //     $products->status = $request->status;
        //     $products->description = $request->description;
        //     $products->save();

        //     // var_dump($categories);
        //     // die;
        //     return response()->json($products);

        date_default_timezone_set("Asia/Ho_Chi_Minh");

        $date = date("YmdHis", time());

        $data = $request->all(); //Để lấy dữ liệu từ phía người dùng nhập vào

        $rules = [
            'name' => 'required',
            'description' => 'required',
            'content' => 'required',
            'status' => 'required',
            'category_id' => 'required',
            'manufacture_id' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg',
        ];

        $messages = [
            'name.required' => 'Tên không được bỏ trống!',
            'description.required' => 'Mô tả không được bỏ trống!',
            'content.required' => 'Nội dung không được bỏ trống!',
            'status.required' => 'Trạng thái không được bỏ trống!',
            'category_id.required' => 'Danh mục không được bỏ trống!',
            'manufacture_id.required' => 'Tên nhà cung cấp không được bỏ trống!',
            'image.required' => 'Ảnh không được bỏ trống!',
            'image.mimes' => 'Ảnh phải là ảnh (jpg, jpeg, png)!',
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator);
        }

        $data['categories_id'] = \Auth::category()->id;
        $data['manufacture_id'] = \Auth::manufacture()->id;

        $data['slug'] = str_slug($data['name']);

        if ($request->hasFile('image')) {

            $extension = '.'.$data['image']->getClientOriginalExtension(); // Lấy ra đuôi ảnh của người dùng

            // $file_name = md5($data['slug']).'_'. $date . $extension; // MD5 mã hóa theo slug của bài viết

            $data['image']->storeAs('upload/thumbnails',$file_name); 

            $data['image'] = 'upload/thumbnails/'.$file_name;
        }

        $flag = Product::create($data);

        // session()->flash('msg', '<script type="text/javascript">toastr.success("Thêm mới bài viết thành công! Vui lòng chờ bài viết được kiểm duyệt.")</script>');

        return response()->json($data);
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

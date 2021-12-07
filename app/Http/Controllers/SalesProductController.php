<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\SalesProduct;
use Illuminate\Support\Facades\Validator;
use App\Jobs\SendEmployerEmail;


class SalesProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_employer');
    }
    public function index()
    {
        $salesproducts = SalesProduct::latest()->with('product')->get();
        return view('salesproduct.index', compact('salesproducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('salesproduct.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->except('_token','category_id');
        $rules = [
            'product_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ];

        $validation = Validator::make($inputs, $rules);
        if ($validation->fails())
        {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $product = new SalesProduct();
        $product->product_id = $request->input('product_id');
        $product->quantity = $request->input('quantity');
        $product->code = (SalesProduct::max('id'))+1;
        $product->price = $request->input('price');
        $product->total_amount = $request->input('total_amount');
        $product->status = 1;
        $product->save();

        $details = ['to_email' => 'ruban@sparkouttech.com','product' => $product, 'status' => 1];

        //$tomail = 'murugan.bizsoft@gmail.com';
        //\Mail::to($tomail)->send(new \App\Mail\EmployerEmail($details));


       // $details = ['to_email' => 'muruganaccetcse@gmail.com','product' => $product];
        //dispatch(SendEmployerEmail($details));


     	SendEmployerEmail::dispatch($details);

     	//return view('mails.employer_email', compact('details'));

        return redirect()->route('salesproduct.index')->with('success','Entry added Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('salesproduct.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, SalesProduct $sales,$autoid)
    {
    	$sales = SalesProduct::find($autoid);
    	//dd($sales->product->category_id);
        $categories = Category::all();
        $products = Product::where('category_id',$sales->product->category_id)->get();

        return view('salesproduct.edit', compact('sales', 'categories','products'));
    }


    public function update(Request $request,$autoid)
    {
        $product = SalesProduct::find($autoid);
        $inputs = $request->except('_token');
        $rules = [
            'product_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ];

        $validation = Validator::make($inputs, $rules);
        if ($validation->fails())
        {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $product->product_id = $request->input('product_id');
        $product->quantity = $request->input('quantity');

        $product->price = $request->input('price');
        $product->total_amount = $request->input('total_amount');
        $product->status = 1;

        $product->save();

         $details = ['to_email' => 'ruban@sparkouttech.com','product' => $product, 'status' => 2];
         SendEmployerEmail::dispatch($details);

        return redirect()->route('salesproduct.index')->with('success','Entry updated Succesfully');
    }

    public function GetProducts(Request $request){
    	$cat_id = $request->input('cat_id');
    	$products = Product::where('category_id',$cat_id)->get();
    	$data['status'] = 1;
    	$data['products'] = $products;
    	echo json_encode($data);
    }
}

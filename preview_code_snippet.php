//A code snippet in the Products Controller using ProductsController.
public function addaproduct(Request $request){
  $validator = Validator::make($request->all(),[
    'product_name' => 'required',
    'product_features' => 'required',
    'product_cost' => 'required',
  ]);
  
  if($validator->fails()){
    return redirect()->back()->withErrors($validator)->withInput();
  }
  
  $product = new Products;
  $product->product_name = $request->product_name;
  $product->product_features = $request->product_features;
  $product->product_cost = $request->product_cost;
  $product->user_id = Auth::user()->user_id;
  $product->save();
  return redirect()->route('dashboard')->with('product_added', 'The product has been added.');
}

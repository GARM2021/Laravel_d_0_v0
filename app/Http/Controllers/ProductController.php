<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use App\Models\Product;
//use Illuminate\Http\Request;

//use App\Models\Product;//! Se incluyo esta linea para usar los modelos Aqui no estaba poniendo Models
//use Illuminate\Routing\Controller as RoutingController; //! esta desgraciada se incluyo ?? y me marcaba error que no existia el controlador
use Illuminate\Support\Facades\DB; //!SE INCLUYO ESTA LINEA PARA USAR QUERY BUILDER



class ProductController extends Controller
{ //! Se me borroeste {  y me marcaba error Controller subrayado

    public function __construct()
    {
        $this->middleware('auth'); //! todas las rutas estan protegidas
        //$this->middleware('auth')->only('index'); //! todas las rutas estan desprotegidas sono index esta protegida
        //$this->middleware('auth')->except(['index', 'create']);//!todas las rutas estan protegidas expepto index y create
    }
    public function index()
    {
        $products = Product::all(); //! Esta es usando eloquent con los modelos
        // $products = DB::table('products')->get();//!Esta consulta es con QueryBuilder
        //  dd($products);
        return view('products.index')->with([
            'products' => $products,
        ]);
    }

    public function create()
    {
        //return 'This is the to create a  product from CONTROLLER';
        return  view('products.create');
    }
    public function store()
    {
        // $product = product::create([
        // 'title' => request()->title, 
        // 'description' => request()->description,
        // 'price' => request()->price, 
        // 'stock' => request()->stock,
        // 'status' => request()->status, 
        // ]);

        $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'status' => ['required', 'in:available, unabailable'],
        ];

        request()->validate($rules);

        if (request()->status == 'available' && request()->stock == 0) {  //! Manera de atrapar un error en la captura es una opcion
            //session()->put('error', 'If available must have stock'); //! valor error permance
            //session()->flash('error', 'If available must have stock'); //! valor error NO permance si tu refrescas das un nuevo producto si vas a otra direccion flash crea y elimina  Esta deja de funcionar con withErrors 

            return redirect()
                ->back()
                ->withInput(request()->all())
                ->withErrors('If available must have stock create');
        }

        session()->forget('error');

        $product = product::create(request()->all());
        //return $product;
        // return redirect()->back(); //anterior// ! Este puede servir para que siga capturando

        // return redirect()->action('ProductController@index'); //action //! Lista de nuevo todos los productos
        // session()->flash('success', "The new product with id {$product->id} was created succes"); //! C41  se elimina porque usamos withSuccess
        return redirect()
        ->route('products.index') //! route Este es el recomendado es mas dificil que cambie el nombre de la route 
        ->withSuccess("The new product with id {$product->id} was created succesx");  // ! C41 
    }
    public function show($product)
    {

        // $product = DB::table('products')->where('id', $product)->get();// ! Esta es con QueryBuilder aqui batalle conesta porque puse 'product' y get 


        //return "Showing product with id {$product} from CONTROLLER"; //! este esta entre comillas dobles 

        $product = Product::find($product); //! Se puede poner findOrFail  para atrapar un error cuando no se encuentre 
        //dd($products);
        return view('products.show')->with([
            'element' => $product,
            'html' => '<h2> Subtitulo </h2>',

        ]);
    }
    public function edit($product)
    {


        return view('products.edit')->with([
            'product' => Product::findOrFail($product),
        ]);
    }

    public function update($product)
    {
        $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'status' => ['required', 'in:available, unabailable'],
        ];

        request()->validate($rules);

        $product = Product::findOrFail($product);

        $product->update(request()->all());

        if (request()->status == 'available' && request()->stock == 0) { 
            return redirect()
                ->back()
                ->withInput(request()->all())
                ->withErrors('If available must have stock edit');
        }

        return redirect()
            ->route('products.index')
            ->withSucces("The new product with id {$product->id} was editada"); // ! C42
    }

    public function destroy($product)
    {

        $product = Product::findOrFail($product);

        $product->delete();

        return redirect()
            ->route('products.index')
            ->withSuccess("The product with id {$product->id} was Eliminado"); // ! C42 la tenia escrita como withSucces con una s por eso no me aparecia 
    }
}

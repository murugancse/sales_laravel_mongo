<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Spatie\Crypto\Rsa\KeyPair;
use Spatie\Crypto\Rsa\PrivateKey;
use Spatie\Crypto\Rsa\PublicKey;
use AshAllenDesign\LaravelExchangeRates\Classes\ExchangeRate;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;


use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {


		/*$array = ['products' => [
							'desk' => [
								'price' => [
									'priceone' => 100,
									'qty' => 2,
								],
								'prodcut' => [
									'title' => 'Mango'
								]
							]
					]
				];

		$flattened = Arr::dot($array);
		print_r($flattened);
		//print_r($flattened['products.desk.price.priceone']);
		dd(1);*/


//        $slice = Str::afterLast('App\Http\Controllers\Controller', '\\');
//        dd($slice);
		// ['foo.bar' => 'baz'];
		$exchangeRates = new ExchangeRate();
		//$result = $exchangeRates->exchangeRate('GBP', 'EUR');
		//dd($result);
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

		try {
            $users = User::toBase()->get();


            //dd($users);
//            return URL::temporarySignedRoute(
//                'unsubscribe', now()->addMinutes(1), ['user' => 1]
//            );
			//$users = DB::table('categories')->where('id',2)->delete();
			//dd($users);

			// Some Eloquent/SQL statement
		} catch (\Illuminate\Database\QueryException $e) {
			//dd($e->getCode());
			if ($e->getCode() === '23000') { // integrity constraint violation
				return back()->withError('Invalid data');
			}
		}
		// generating an RSA key pair
		//[$privateKey, $publicKey] = (new KeyPair())->generate();

		// when passing paths, the generated keys will be written those paths
		//(new KeyPair())->generate($pathToPrivateKey, $pathToPublicKey);

		//$data = 'my secret data';

		//$privateKey = PrivateKey::fromFile($pathToPrivateKey);
		//$encryptedData = $privateKey->encrypt($data); // returns something unreadable

		//$publicKey = PublicKey::fromFile($pathToPublicKey);
		//$decryptedData = $publicKey->decrypt($encryptedData);
		//dd($decryptedData);
        return view('home');
    }

    public function adminHome()
    {
        return view('admin.dashboard');
    }

    public function unsubscribe(Request $request){
        dd($request->all());
        dd(request()->hasValidSignature());
    }
}

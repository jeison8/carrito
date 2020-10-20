<?php

namespace App\Http\Controllers;

use App\City;
use App\User;
use App\Order;
use App\Department;
use Illuminate\Http\Request;
use Dnetix\Redirection\PlacetoPay;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\InsertShippingInfoRequest;

class PasarellaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function connection()
    {
        return new PlacetoPay([
            'login' => env('PLACETOPAY_LOGIN'),
            'tranKey' => env('PLACETOPAY_TRANKEY'),
            'url' => env('PLACETOPAY_BASE_URI'),
        ]);
    }


    public function InsertshippingInfo(InsertShippingInfoRequest $request, User $user)
    {
        $city = City::where('id', $request->city)->first();
        $department = Department::where('id', $request->department)->first();

        $total = str_replace(array('.', ','), '', $request->total);

        $placetopay = $this->connection();

        $returnUrl = config('app.url');
        $reference = 'REFERENCE_'.time();

        $items = [];
        foreach ($request->products as $key => $value) {
            $items[$key] =
            [
                'sku' => $value[0],
                'name' => $value[1],
                'qty' => 1,
                'price' => $value[2],
            ];
        }

        $data = [
            'locale' => 'es_CO',
            'payer' => [
                'name' => $request->name,
                'surname' => 'payer',
                'email' => $request->email,
                'documentType' => 'CC',
                'document' => $request->document,
                'mobile' => $request->phone,
                'address' => [
                    'street' => $request->address,
                    'city' => $city->name,
                    'state' => $department->name,
                    'country' => 'CO',
                ],
            ],
            'buyer' => [
                'name' => 'prueba',
                'surname' => 'buyer',
                'email' => 'flowe@anderson.com',
                'documentType' => 'CC',
                'document' => '1111111111',
                'mobile' => '3211111111',
                'address' => [
                    'street' => 'calle 49 # 40-50',
                    'city' => 'Medellin',
                    'state' => 'Antioquia',
                    'country' => 'CO',
                ],
            ],
            'payment' => [
                'reference' => $reference,
                'description' => 'Transaccion',
                'amount' => [
                    'currency' => 'COP',
                    'total' => $total,
                ],
                'items' => $items,
            ],
            'expiration' => date('c', strtotime('+2 days')),
            'ipAddress' =>  request()->server('SERVER_ADDR'),
            'userAgent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36',
            'returnUrl' => $returnUrl.'/shipping-response?reference='.$reference.'&user='.$user->id,
            'cancelUrl' => $returnUrl.'/shipping-response?reference='.$reference.'&user='.$user->id,
        ];

        $response = $placetopay->request($data);

        if ($response->isSuccessful()) {
            $request->insertShippingInfo($user, $response->requestId(), $items, $total, $response->status()->status());

            header('Location:'.$response->processUrl());

            exit;
        } else {
            $response->status()->message();
        }
    }



    public function ShippingResponse(Request $request)
    {
        $order = Order::where('users_id', $request->user)->get()->last();

        $placetopay = $this->connection();

        $response = $placetopay->query($order->requestId);

        if ($response->isSuccessful()) {
            if ($response->status()->isApproved()) {
                return $this->responseMessagges($order, $response->status()->status(), 'messageApproved', 'Su pago ha sido satisfactorió, su pedido llegara en 6 días hábiles');
            }

            if ($response->status()->isRejected()) {
                return $this->responseMessagges($order, $response->status()->status(), 'messageRejected', 'Ha ocurrido un error con su pago, inténtelo  nuevamente');
            }
        } else {
            print_r($response->status()->message() . "\n");
        }
    }


    public function responseMessagges($order, $statusOrder, $messagesStatus, $messages)
    {
        $order->status = $statusOrder;
        $order->save();

        Session::flash($messagesStatus, $messages);
        return redirect()->route('store.index');
    }
}

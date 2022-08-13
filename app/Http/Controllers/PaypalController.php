<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\PayPal as PaypalClient;


class PaypalController extends Controller

{

    /**
     * crear_pago.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear_pago()
    {
        return view('templates.paypal.paypal');
    }


    /**
     * proceso del pago
     *
     * @return \Illuminate\Http\Response
     */
    public function proceso_pago(Request $request)
    {
        $provider = new PaypalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('iniciar_pago'),
                "cancel_url" => route('cancelar_pago'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "MXN",
                        "value" => "500.00"
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('crear_pago')
                ->with('error', 'Lo sentimos algo salió mal!');

        } else {
            return redirect()
                ->route('crear_pago')
                ->with('error', $response['message'] ?? 'Lo sentimos algo salió mal!');
        }
    }

    /**
     * iniciar el pago.
     *
     * @return \Illuminate\Http\Response
     */
    public function iniciar_pago(Request $request)
    {
        $provider = new PaypalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETADO') {
            return redirect()
                ->route('crear_pago')
                ->with('success', 'Pago Completado Correctamente!');
        } else {
            return redirect()
                ->route('crear_pago')
                ->with('error', $response['message'] ?? 'Lo sentimos algo salió mal!');
        }
    }

    /**
     * cancelar el pago.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelar_pago(Request $request)
    {
        return redirect()
            ->route('crear_pago')
            ->with('error', $response['message'] ?? 'Se ha cancelado correctamente el pago!');
    }
}

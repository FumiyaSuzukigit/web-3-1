<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use Laravel\Cashier\Http\Controllers\WebhookController as CashierController;
use \Carbon\Carbon;
use App\Mail\DepositedMail;
use Illuminate\Contracts\Mail\Mailer;

class WebhookController extends CashierController
{

public function handlePayment(Request $request,Mailer $mailer){
    //Purchase::find(4)->update(['send' => $request->data['object']['id']]);
    //Purchase::find(1)->update(['deposited' => $request->data['object']['id']]);
    if($request['type']=='payment_intent.succeeded'){
        $purchase=Purchase::where('payment_intent_id',$request->data['object']['id'])->first();
        $purchase->update(['deposited' => Carbon::now()]);
        $purchase_data=Purchase::with('item.user')->findOrFail($purchase->id);
        $mailer->to($purchase_data->item->user->email)->send(new DepositedMail($purchase_data));
    }
}
}

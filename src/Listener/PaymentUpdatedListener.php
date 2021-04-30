<?php

namespace Rennokki\Plans\Listener;

use Vtlabs\Core\Models\User\User;
use Rennokki\Plans\Models\PlanModel;
use Vtlabs\Payment\Events\PaymentUpdated;

class PaymentUpdatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Registered $event
     * @return void
     */
    public function handle(PaymentUpdated $event)
    {
        $payment = $event->payment;
        
        // we need to subscribe plan according to payment status
        if ($payment->payable_type == 'Rennokki\Plans\Models\PlanModel') {
            if($payment->status == 'paid') {
                $plan = PlanModel::find($payment->payable_id);
                $user = User::find($payment->payer_id);
                if($user->hasActiveSubscription()) {
                    $user->cancelCurrentSubscription();
                }
                $user->subscribeTo($plan, $plan->duration);
            }
        }
        return true;
    }
}

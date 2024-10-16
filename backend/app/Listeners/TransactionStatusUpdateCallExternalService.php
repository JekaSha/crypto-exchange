<?php

namespace App\Listeners;

use App\Events\IncomingTransactionStatusUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Http;

class TransactionStatusUpdateCallExternalService implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(IncomingTransactionStatusUpdated $event)
    {

        $this->updateTransactionStatus($event);

    }

    protected function updateTransactionStatus(IncomingTransactionStatusUpdated $event)
    {
        $transaction = $event->transaction;
        print_r('updateTransactionStatus');
        $r = Http::post("https://".env("OBMIN_HOST")."/api/update-status", [
            'transaction_id' => $transaction->id,
            'status' => $transaction->status,
        ]);
    }

}

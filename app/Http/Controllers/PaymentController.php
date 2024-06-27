<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Set your Merchant Server Key
        Config::$serverKey = 'SB-Mid-server-4sGL4pKyxTeHoRA6uInNh8AH';
        Config::$isProduction = false; // Set true for production
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function pay(Transaction $transaction)
    {
        $params = [
            'transaction_details' => [
                'order_id' => $transaction->id,
                'gross_amount' => $transaction->total_harga,
            ],
            'customer_details' => [
                'first_name' => $transaction->nama_lengkap,
                'email' => $transaction->user->email,
                'phone' => $transaction->nomor_telepon,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('payment', compact('snapToken', 'transaction'));
    }

    public function handleNotification(Request $request)
    {
        $json = $request->input('json');
        $notification = json_decode($json, true);

        if (isset($notification['order_id'])) {
            $transaction = Transaction::find($notification['order_id']);

            if ($notification['transaction_status'] == 'settlement') {
                $transaction->status = 'selesai';
                $transaction->save();
            }
        }

        return redirect()->route('filament.admin.resources.transactions.index');
    }

    public function print(Transaction $transaction)
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('print', compact('transaction'));
        return $pdf->download('nota-transaksi.pdf');
    }
}

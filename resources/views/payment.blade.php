<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-client-YourClientKey"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Detail Pemesanan Tiket
            </div>
            <div class="card-body">
                <h5 class="card-title">Nama: {{ $transaction->nama_lengkap }}</h5>
                <p class="card-text">Email: {{ $transaction->user->email }}</p>
                <p class="card-text">Nomor Telepon: {{ $transaction->nomor_telepon }}</p>
                <p class="card-text">Jumlah Orang: {{ $transaction->jumlah_orang }}</p>
                <p class="card-text">Total Harga: Rp {{ number_format($transaction->total_harga, 2) }}</p>
                <button id="pay-button" class="btn btn-primary">Bayar</button>
            </div>
        </div>
    </div>

    <form id="payment-form" method="post" action="{{ route('payment.notification') }}" style="display: none;">
        @csrf
        <input type="hidden" name="json" id="json_callback">
    </form>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result){
                    sendResponseToForm(result);
                },
                onPending: function(result){
                    sendResponseToForm(result);
                },
                onError: function(result){
                    sendResponseToForm(result);
                },
                onClose: function(){
                    alert('You closed the popup without finishing the payment');
                }
            });
        });

        function sendResponseToForm(result){
            document.getElementById('json_callback').value = JSON.stringify(result);
            $('#payment-form').submit();
        }
    </script>
</body>
</html>


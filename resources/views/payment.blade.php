@extends('layouts.app')

@section('content')

    {{--    Start Jobs Details --}}
    <section class="singleJob second-bg">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 mx-auto border">
                    <h4 class="primary-text text-center my-5">Make Payment</h4>
                    <div class="row">
                        <div class="col-6">
                            <label class="d-flex align-items-center">
                                <input type="checkbox" value="paypal" name="payWith" style="display: none" checked>
                                <h5 class="mb-0">Pyapal</h5>
                            </label>
                        </div>
                        <div class="col-6">
                            <div id="paypal-button-container"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--    End Jobs Details --}}
    <!-- Render the radio buttons and marks -->
@endsection
@section('script')
    <script src="https://www.paypal.com/sdk/js?client-id=test&components=buttons"></script>
    <script>

        paypal.Buttons({
            style: {
                color: 'blue',
                shape: 'pill',
                label: 'buynow',
                layout: 'vertical',

            },
            // Sets up the transaction when a payment button is clicked
            createOrder: function (data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '{{ $job->budget }}', // Can reference variables or functions. Example: `value: document.getElementById('...').value`
                            currency_code: "USD",
                        }
                    }]
                });
            },

            // Finalize the transaction after payer approval
            onApprove: function (data, actions) {
                return actions.order.capture().then(function (orderData) {
                    // Successful capture! For dev/demo purposes:
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    var transaction = orderData.purchase_units[0].payments.captures[0];
                    alert('Transaction ' + transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                    // When ready to go live, remove the alert and show a success message within this page. For example:
                    // var element = document.getElementById('paypal-button-container');
                    // element.innerHTML = '';
                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                    // Or go to another URL:  actions.redirect('thank_you.html');
                });
            },
            onCancel: function (data) {
                console.log('canceled');
                var user = '{{ $job->user_id}}';
                var job_id = '{{ $job->job_id}}';
                var job_id = '{{ $job->job_id}}';
            }
        }).render('#paypal-button-container');


    </script>
@endsection
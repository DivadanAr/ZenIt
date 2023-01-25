@extends('layout/app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/tutorial.css')}}">
@endsection

@section('content')

{!! $data = preg_replace('/[^0-9]/' ,' ', $pay->steps[2]) !!}


{{ $data2 =   preg_replace('/[^0-9]/' ,' ', $pay->steps[3]) }}

@if(strlen($data2) < 61) {{ $data = $data2 }} @endif <div class="containere">

    {{-- <div class="titles">
            <a href="{{ url('/') }}"><iconify-icon class="back-btn" icon="material-symbols:arrow-back-rounded">
    </iconify-icon></a>
    <h1>Payment</h1>
    </div> --}}
    <div class="pm-deadline-status">
        {{-- <h2>Payment Deadline</h2>
            <p>Sunday, 14 May 2022</p> --}}
        <h2>Payment Status</h2>
        {{ $detail->status }}
    </div>

    <div class="bcasvirt">
        <div class="bca-virt">
            <div class="row1">
                <p>{{ $detail->payment_name }}</p>
                <img src="{{ asset('storage/bank/' . $detail->payment_method . '.png') }}" alt="">
            </div>
            <div class="row2">
                <div class="left">
                    <p>{{ $detail->payment_name }}</p>
                    <p id="sample">{!! $data !!}</p>
                </div>
                <div class="right">
                    <button onclick="CopyToClipboard('sample');return false;">
                        <iconify-icon icon="material-symbols:content-copy-outline"></iconify-icon>
                        Copy
                    </button>
                </div>
                <div class="row3">
                    <div class="left">
                        <p>Total Payment</p>
                        <p id="simple">Rp. {{ number_format( $detail->amount ) }}
                            <button onclick="CopyToClipboards('simple');return false;">
                                <iconify-icon icon="material-symbols:content-copy-outline" style="font-size:18px;">
                                </iconify-icon>
                            </button>
                    </div>
                    <div class="right">
                        <button id="myBtn">Details</button>
                    </div>


                    <!-- The Modal -->
                    <div id="myModal" class="modal">

                        <!-- Modal content -->
                        <div class="modal-content">
      <span class="close">&times;</span>
                            <h1>Detail Payment</h1>
                            <div class="totaal">
                                <div class="total-row1">
                                    <p> Total Price ( 1 product )</p>
                                    <p>Rp.brp</p>
                                </div>
                                <div class="total-row2">
                                    <p>Total Delivery Fee</p>
                                    <p>Rp. 20.000</p>
                                </div>
                                <div class="total-row3">
                                    <p>Total Payment</p>
                                    <p>Rp. {{ number_format( $detail->amount ) }}</p>
                                </div>
                            </div>
                            <div class="payment-m">
                                <h5>Payment Method</h5>
                                <div class="payMRow1">
                                    <p>{{ $detail->payment_name }}</p>
                                    <p>Rp. {{ number_format( $detail->amount ) }}</p>
                                </div>
                            </div>
                            <div class="p-item">
                                <h5>Purchased Items</h5>
                                <div class="product-det">
                                    <p>Ibe Sejahtera</p>
                                    <p>Web Design Paling kece di dunia</p>
                                    <p>2 X 25.000</p>
                                </div>
                            </div>
                            <div class="shipping">
                                <h5>Shipping</h5>
                                <div class="ship-det">
                                    <p>JNE</p>
                                    <p>Rp.2000000</p>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>

        <div class="pib">
            @foreach ($detail->instructions as $pay )
            <div class="contents">
                <div class="label">Payment {{ $pay->title }}</div>
                <div class="conteen">
                    @foreach($pay->steps as $step)
                    <ul>
                        <li>
                            {{ $loop->iteration }} . {!! $step !!}
                        </li>
                    </ul>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>

        <script>
            function CopyToClipboard(id) {
                var r = document.createRange();
                r.selectNode(document.getElementById(id));
                window.getSelection().removeAllRanges();
                window.getSelection().addRange(r);
                document.execCommand('copy');
                window.getSelection().removeAllRanges();
            }

            function CopyToClipboards(id) {
                var r = document.createRange();
                r.selectNode(document.getElementById(id));
                window.getSelection().removeAllRanges();
                window.getSelection().addRange(r);
                document.execCommand('copy');
                window.getSelection().removeAllRanges();
            }

            //pib

            const pib = document.getElementsByClassName('contents');

            for (i = 0; i < pib.length; i++) {
                pib[i].addEventListener('click', function () {
                    this.classList.toggle('active')
                })
            }


            
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

        </script>

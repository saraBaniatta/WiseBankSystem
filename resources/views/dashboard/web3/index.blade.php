@extends("layouts.app")
@section("content")

<div class="iq-card">
    <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title">
            <h4 class="card-title">Connect Web3</h4>
        </div>
    </div>
    <div class="iq-card-body">
        <button type="button" class="btn btn-primary position-right enableEthereumButton" data-toggle="modal" data-target="#addAccount">
           <i class="ri-database-2-line"></i>
            Connect
        </button>
    </div>
    <div class="col-12 mb-2">
        <div id="log"></div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Account" aria-label="Account" id="Account">
            <span class="input-group-text">@</span>
            <input type="number" class="form-control" placeholder="Token" aria-label="Token" id="token">
        </div>
        <a href="#" role="button" class="btn btn-primary" onclick="sendCoinBackEnd()">Send</a>
    </div>



</div>
<script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>
<script src="{{asset("js/web3.js")}}"></script>
@endsection
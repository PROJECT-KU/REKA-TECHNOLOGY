@section('title')
Newsletter | Reka Technology
@endsection


<div class="col-lg-3">
    <div class="subscribe-newsletters footer-item">
        <h4>Daftar Newsletter</h4>
        <p>Jangan lewatkan promo, info penting, dan tips teknologi terbaru dari kami</p>
        <form wire:submit.prevent="submitNewsletter">
            <input type="text" name="email_newsletter" wire:model="email_newsletter" id="email_newsletter" pattern="[^ @]*@[^ @]*" placeholder="Masukan Email Anda" required="">
            <button type="submit" id="form-submit" class="main-button "><i class="fa fa-paper-plane-o"></i></button>
        </form>
    </div>
</div>
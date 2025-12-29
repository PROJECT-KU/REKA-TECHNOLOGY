@section('title')
Kontak | Reka Technology
@endsection


<!--================== CONTACT US ==================-->
<div id="contact" class="contact-us section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="section-heading">
                    <h2>Jangan Ragu untuk <em>Menghubungi</em> Kami Melalui <span>Formulir Kontak</span></h2>
                    <div id="map">
                        <iframe src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="360px" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                    </div>
                    <div class="info">
                        <span class="d-inline-flex align-items-center gap-2">
                            <i class="fa fa-phone"></i>
                            <a href="tel:+62895428686796">+62 895-4286-86796</a>
                        </span>
                        <span style="display: inline-flex; align-items: center; gap: 6px;">
                            <i class="fa fa-envelope"></i>
                            <a href="mailto:help@rekatechnology.id">help@rekatechnology.id</a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 align-self-center">
                <form id="contact" wire:submit.prevent="submitContact">
                    <div class="row">
                        <div class="col-lg-12">
                            <fieldset>
                                <input type="nama" wire:model="nama" name="nama" id="nama" placeholder="Masukan nama anda" autocomplete="on" required>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <input type="telp" wire:model="telp" name="telp" id="telp" placeholder="Masukan nomor telepon anda" autocomplete="on" required>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <input type="text" name="email" wire:model="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Masukan email anda" autocomplete="onrequired="">
                </fieldset>
              </div>
              <div class=" col-lg-12">
                                <fieldset>
                                    <input type="text" name="pesan" wire:model="pesan" id="pesan" placeholder="Masukan pesan anda" autocomplete="on" required="">
                                </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <button type="submit" id="form-submit" class="main-button">Submit Request</button>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="contact-dec">
        <img src="{{ asset('onix/assets/images/contact-dec.png') }}" alt="">
    </div>
    <div class="contact-left-dec">
        <img src="{{ asset('onix/assets/images/contact-left-dec.png') }}" alt="">
    </div>
</div>
<!--================== END ==================-->

<!--================== SWEETALERT2 UNTUK NOTIFIKASI ==================-->
<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('contact-success', () => {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Pesan Anda berhasil dikirim.',
                confirmButtonText: 'OK'
            })
        })
    })
</script>
<!--================== END ==================-->
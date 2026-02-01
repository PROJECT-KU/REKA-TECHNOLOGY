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
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5471.715691506612!2d110.36458027628882!3d-7.766000277030293!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a59c7566ff703%3A0x88b95517b9a941b8!2shomebase%20ACM!5e1!3m2!1sid!2sid!4v1767489718304!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="info">
                        <span class="d-inline-flex align-items-center gap-2">
                            <i class="fa fa-phone"></i>
                            <a href="https://wa.me/62895630279695?text=Halo%20Reka%20Technology,%20saya%20ingin%20konsultasi" target="_blank">+62 895-6302-79695</a>
                        </span>
                        <span style="display: inline-flex; align-items: center; gap: 6px;">
                            <i class="fa fa-envelope"></i>
                            <a href="mailto:help@rekatechnology.id" target="_blank">help@rekatechnology.id</a>
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
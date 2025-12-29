@section('title')
Newsletter | Reka Technology
@endsection

<style>
    .newsletter-btn {
        width: 100%;
        height: 40px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        background-color: #498d32 !important;
        color: #ffffff !important;
        font-weight: 500;
        font-size: 14px;
        border: none !important;
        border-radius: 9999px !important;
        padding: 0 32px;
        cursor: pointer;
        transition: background-color 0.2s ease, opacity 0.2s ease;
    }

    .newsletter-btn:hover {
        background-color: #3f7c2c !important;
    }

    .newsletter-btn:disabled {
        opacity: 0.8;
        cursor: not-allowed;
    }
</style>

<div class="col-lg-3">
    <div class="subscribe-newsletters footer-item">
        <h4>Daftar Newsletter</h4>
        <p>Jangan lewatkan promo, info penting, dan tips teknologi terbaru dari kami</p>

        <!-- Honeypot (ANTI BOT) -->
        <input type="text" wire:model="website" style="display:none">

        <button
            type="button"
            id="newsletter-btn"
            class="newsletter-btn"
            wire:loading.attr="disabled">
            <i class="fa fa-paper-plane-o"></i>
            <span wire:loading.remove>Daftar</span>
            <span wire:loading>Memproses...</span>
        </button>
    </div>
</div>

<script>
    document.addEventListener('livewire:init', () => {
        const btn = document.getElementById('newsletter-btn');

        btn.addEventListener('click', function() {
            Swal.fire({
                title: 'Daftar Newsletter',
                html: `
                <input id="swal-nama" class="swal2-input" placeholder="Nama Lengkap">
                <input id="swal-email" class="swal2-input" placeholder="Email" type="email">
            `,
                confirmButtonText: 'Daftar',
                showCancelButton: true,
                cancelButtonText: 'Batal',
                focusConfirm: false,
                preConfirm: () => {
                    const nama = document.getElementById('swal-nama').value;
                    const email = document.getElementById('swal-email').value;

                    if (!nama || !email) {
                        Swal.showValidationMessage('Nama dan Email wajib diisi');
                        return false;
                    }

                    return {
                        nama,
                        email
                    };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.set('nama', result.value.nama);
                    @this.set('email_newsletter', result.value.email);
                    @this.call('submitNewsletter');
                }
            });
        });
    });
</script>
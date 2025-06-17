@include('layouts.public.contacts.header')

<link rel="stylesheet" href="{{ asset('design/kontak.css') }}">

<section class="contact-section">
    <div class="container">
        <h2 class="contact-title">KONTAK KAMI</h2>

        @if(session('success'))
            <div class="custom-toast success-toast" id="successToast">
                <div class="toast-icon">&#10003;</div>
                <div class="toast-message">{{ session('success') }}</div>
                <button class="toast-close"
                    onclick="document.getElementById('successToast').style.display='none'">&times;</button>
            </div>
        @endif
        <script>
            setTimeout(() => {
                const toast = document.getElementById('successToast');
                if (toast) toast.style.display = 'none';
            }, 3000);
        </script>
        <form action="{{ route('public.contacts.store') }}" method="POST" class="contact-form">
            @csrf
            <div class="row gap">
                <div class="col-half">
                    <input type="text" name="subject" placeholder="Subject" value="{{ old('subject') }}" required>
                    <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required>
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                </div>
                <div class="col-half">
                    <textarea name="message" placeholder="Message" required>{{ old('message') }}</textarea>
                </div>
            </div>

            <div class="form-footer">
                <button type="submit">KIRIM</button>
            </div>
        </form>

        <div class="contact-info">
            <div class="info-box">
                <img src="{{ asset('images/email.png') }}" alt="Email Icon" class="contact-icon">
                <h4>EMAIL</h4>
                <p>tastyfood@gmail.com</p>
            </div>
            <div class="info-box">
                <img src="{{ asset('images/phone.png') }}" alt="Phone Icon" class="contact-icon">
                <h4>PHONE</h4>
                <p>+62 812 3456 7890</p>
            </div>
            <div class="info-box">
                <img src="{{ asset('images/location.png') }}" alt="Location Icon" class="contact-icon">
                <h4>LOCATION</h4>
                <p>Kota Bandung, Jawa Barat</p>
            </div>
        </div>
    </div>
</section>

<div class="map-full-bg">
    <div class="container">
        <div class="map-wrapper">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2322.540871896073!2d107.66398319429398!3d-6.943212285871821!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7c381e3c323%3A0x5f5160f6c9796e4b!2sCYBERLABS%20-%20Jasa%20Digital%20Marketing%20%7C%20Jasa%20Pembuatan%20Website%20%7C%20Jasa%20Pembuatan%20Aplikasi!5e0!3m2!1sid!2sid!4v1750174012493!5m2!1sid!2sid"
                width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>

@include('layouts.public.contacts.footer')
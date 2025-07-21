<div class="contact-us section" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-6  align-self-center">
                <div class="section-heading">
                    <h6></h6>
                    <h2>Ada keluhan? Atau pertanyaan seputar produk-produk toko kami? Hubungi tim kami segera.</h2>
                    <p></p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-us-content">
                    <form wire:submit.prevent="submit">
                        @if (session()->has('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <input type="text" wire:model="name" placeholder="Your Name..." class="form-control">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-12 mb-3">
                                <input type="email" wire:model="email" placeholder="Your Email..."
                                    class="form-control">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-12 mb-3">
                                <textarea wire:model="message" placeholder="Your Message" class="form-control"></textarea>
                                @error('message')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="orange-button">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

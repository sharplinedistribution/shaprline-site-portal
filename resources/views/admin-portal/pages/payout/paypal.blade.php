<p class="mb-2">Email - {{ isset(bankAccount($bank,'paypal')->email) ? bankAccount($bank,'paypal')->email : null }} </p>
<p class="mb-2">Sharpline Distro Password - {{ isset(bankAccount($bank,'paypal')->password) ? bankAccount($bank,'paypal')->password : null }} </p>

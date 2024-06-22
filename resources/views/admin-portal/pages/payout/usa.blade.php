<p class="mb-2">Name on Account - {{ isset(bankAccount($bank,'usa')->name) ? bankAccount($bank,'usa')->name : null }} </p>
<p class="mb-2">Address of Account Holder - {{ isset(bankAccount($bank,'usa')->address) ? bankAccount($bank,'usa')->address : null }} </p>
<p class="mb-2">Account Number - {{ isset(bankAccount($bank,'usa')->account_number) ? bankAccount($bank,'usa')->account_number : null }} </p>
<p class="mb-2">Routing Number - {{ isset(bankAccount($bank,'usa')->routing_number) ? bankAccount($bank,'usa')->routing_number : null }} </p>
<p class="mb-2">Bank Name - {{ isset(bankAccount($bank,'usa')->bank_name) ? bankAccount($bank,'usa')->bank_name : null }} </p>
<p class="mb-2">Bank Address - {{ isset(bankAccount($bank,'usa')->bank_address) ? bankAccount($bank,'usa')->bank_address : null }} </p>
<p class="mb-2">Postal Code - {{ isset(bankAccount($bank,'usa')->postal_code) ? bankAccount($bank,'usa')->postal_code : null }} </p>
<p class="mb-2">Sharpline Distro Password - {{ isset(bankAccount($bank,'usa')->password) ? bankAccount($bank,'usa')->password : null }} </p>

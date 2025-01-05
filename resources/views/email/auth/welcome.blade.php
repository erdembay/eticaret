{{-- mail şablonu örneği --}}
Merhaba {{ $user->name }},
<br>
<br>
Hesabınız başarıyla oluşturuldu. Hesabınızı aktifleştirmek için aşağıdaki linke tıklayınız.
<br>
<br>
<hr>
<center>
    <a href="{{ route('activation', [$token]) }}">
        Maili Doğrula
    </a>
</center>
<hr>

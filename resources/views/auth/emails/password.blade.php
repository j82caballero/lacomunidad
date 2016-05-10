{{-- resources/views/emails/password.blade.php --}}

<h1>Has solicitado restablecer la contraseña</h1>

<p>Para poder restablecer tu contraseña, simplemente haz click en el siguiente enlace: <a href="{{ url('password/reset/'.$token) }}">{{ url('password/reset/'.$token) }}</a></p>

<p>Si no has solicitado restablecer tu contraseña, no te preocupes, puedes ignorar este correo, no realizaremos ningún cambio en tu cuenta.</p>
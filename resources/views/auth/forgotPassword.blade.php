
<x-guest-layout title="Forgot Password" bodyClass="page-signup">

    <h1 class="auth-page-title">Forgot Password</h1>

    <form action="{{route('auth.forgotPasswordAction')}}" method="post">
    @csrf

      <div class="form-group">
        <input type="email" placeholder="Your Email" name="email"/>
      </div>

      <button class="btn btn-primary btn-login w-full">Send Reset Link</button>
    </form>
    <x-slot:footerLink>
        Back to Login? -
        <a href="{{route('auth.login')}}"> Click here </a>
    </x-slot:footerLink>

</x-guest-layout>

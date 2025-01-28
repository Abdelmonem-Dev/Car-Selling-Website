
<x-guest-layout title="Forgot Password" bodyClass="page-signup">

    <h1 class="auth-page-title">Forgot Password</h1>

    <form action="" method="post">
      <div class="form-group">
        <input type="email" placeholder="Your Email" />
      </div>

      <button class="btn btn-primary btn-login w-full">Send Reset Link</button>
    </form>
    <x-slot:footerLink>
        Back to Login? -
        <a href="/login.html"> Click here </a>
    </x-slot:footerLink>

</x-guest-layout>

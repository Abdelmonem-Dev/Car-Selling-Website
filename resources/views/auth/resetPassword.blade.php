
<x-guest-layout title="Reset Password" bodyClass="page-signup">

    <h1 class="auth-page-title">Reset Password</h1>

    <form action="" method="post">

    <input type="hidden" name="email" value="{{}}">

      <div class="form-group">
        <input type="password" placeholder="Your Password" />
      </div>
      <div class="form-group">
        <input type="password" placeholder="Repeat Password" />
      </div>

      <button class="btn btn-primary btn-login w-full">Reset Password</button>
    </form>
    <x-slot:footerLink>
        Back to Login? -
        <a href="/login.html"> Click here </a>
    </x-slot:footerLink>

</x-guest-layout>

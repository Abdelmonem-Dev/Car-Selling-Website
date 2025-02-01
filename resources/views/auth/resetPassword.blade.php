
<x-guest-layout title="Reset Password" bodyClass="page-signup">

    <h1 class="auth-page-title">Reset Password</h1>

    <form action="{{route('auth.ResetPasswordAction')}}" method="post">
    @csrf
    
    <input type="hidden" name="email" value="{{ $email }}">

      <div class="form-group">
        <input type="password" name="password" placeholder="Your Password" required/>
      </div>
      <div class="form-group">
        <input type="password" name="password_confirmation" placeholder="Repeat Password" required/>
      </div>

      <button class="btn btn-primary btn-login w-full">Reset Password</button>
    </form>
    <x-slot:footerLink>
        Back to Login? -
        <a href="{{route('auth.login')}}"> Click here </a>
    </x-slot:footerLink>

</x-guest-layout>

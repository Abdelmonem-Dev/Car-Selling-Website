<x-guest-layout title="Signup" bodyClass="page-signup">

    <h1 class="auth-page-title">Signup</h1>

    <form id="signupForm" action="{{route('auth.signupAction')}}" method="post">
    @csrf

      <div class="form-group">
        <input type="email" id="email" name="email" placeholder="Your Email" required />
      </div>
      <div class="form-group">
        <input type="password" id="password" name="password" placeholder="Your Password" minlength="8" required />
      </div>
      <div class="form-group">
        <input type="password" id="repeatPassword" name="password_confirmation" placeholder="Repeat Password" minlength="8" required />
      </div>
      <hr />
      <div class="form-group">
        <input type="text" id="firstName" name="first_name" placeholder="First Name" required />
      </div>
      <div class="form-group">
        <input type="text" id="lastName" name="last_name" placeholder="Last Name" required />
      </div>
      <div class="form-group">
        <input type="text" id="phone" name="phone" placeholder="Phone" pattern="\d{10}" title="Please enter a 10-digit phone number" required />
      </div>
      <button class="btn btn-primary btn-login w-full">Register</button>
    </form>
    <x-slot:footerLink>
        Already have an account? -
        <a href="{{route('auth.login')}}"> Click here to login </a>
    </x-slot:footerLink>

</x-guest-layout>



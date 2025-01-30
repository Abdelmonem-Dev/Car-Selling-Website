<x-guest-layout title="Verify Email" bodyClass="page-signup">
    <h1 class="auth-page-title">Verify Your Email</h1>
<div class="default-container">
    <p class="default-text">
        We have sent a verification link to your email address. Please check your inbox and click the link to verify your email.
    </p>
    <form class="default-form" action="{{ route('auth.resendTokenAction') }}" method="post">
        @csrf
        <input type="hidden" name="email" value="{{ $email }}">
        <p class="default-text">
            Didn't receive the email? Click the button below to resend the verification link.
        </p>
        <button type="submit" class="btn btn-primary btn-login w-full">Resend Verification Link</button>
    </form>
    <x-slot:footerLink>
        Do it later ? -
        <a href="{{route('home')}}"> Click here </a>
    </x-slot:footerLink>
</div>

</x-guest-layout>

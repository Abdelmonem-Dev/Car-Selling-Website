<x-guest-layout title="Login" bodyClass="page-login">
    <h1 class="auth-page-title">Login</h1>

            <form action="{{route('auth.loginAction')}}" method="post">
            @csrf

                <div class="form-group">
                    <input type="email" name="email" placeholder="Your Email" />
                    <x-message-error message="email" />
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Your Password" />
                    <x-message-error message="email" />
                    <x-message-error message="password" />

                </div>
                <div class="text-right mb-medium">
                    <a href="{{route('auth.forgotPassword')}}" class="auth-page-password-reset"
                    >Reset Password</a>
                </div>

                <button class="btn btn-primary btn-login w-full">Login</button>
            </form>
            <x-slot:footerLink>
                  Don't have an account? -
                  <a href="{{route('auth.signup')}}"> Click here to create one</a>
            </x-slot:footerLink>
</x-guest-layout>







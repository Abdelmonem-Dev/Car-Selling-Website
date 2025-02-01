<x-guest-layout title="Add Token" bodyClass="page-login">
    <h1 class="auth-page-title">Add Token</h1>

            <form action="{{route('auth.addTokenAction')}}" method="post">
            @csrf
            
                <input type="hidden" name="email" value="{{ $email }}">
                <div class="form-group">
                    <input type="text" name="token" placeholder="Enter your token" required />
                </div>
                <button class="btn btn-primary btn-login w-full">Verify Token</button>
            </form>
            <x-slot:footerLink>
                Back to Forgot Password? -
                <a href="{{route('auth.forgotPassword')}}"> Click here </a>
            </x-slot:footerLink>
</x-guest-layout>

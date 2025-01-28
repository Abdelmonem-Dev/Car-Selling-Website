<x-guest-layout title="Add Token" bodyClass="page-login">
    <h1 class="auth-page-title">Add Token</h1>

            <form action="" method="post">

                <input type="hidden" name="email" value="{{}}">
                <div class="form-group">
                    <input type="text" placeholder="Your Token" />
                </div>
                <button class="btn btn-primary btn-login w-full">Verify Token</button>
            </form>
            <x-slot:footerLink>
                Back to Forgot Password? -
                <a href="/forgotPassword.html"> Click here </a>
            </x-slot:footerLink>
</x-guest-layout>

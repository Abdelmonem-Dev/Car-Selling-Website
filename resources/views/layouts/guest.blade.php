@props(['title' => '', 'bodyClass' => ''])
<x-base-layout :$title :$bodyClass>

    <main>
    <div class="container-small page-login">
      <div class="flex" style="gap: 5rem">
        <div class="auth-page-form">
          <div class="text-center">
            <a href="/">
              <img src="/img/logoipsum-265.svg" alt="" />
            </a>
          </div>
          {{$slot}}
          <x-social />

      <div class="login-text-dont-have-account">
        {{$footerLink}}
      </div>
        </div>
        <div class="auth-page-image">
          <img src="/img/car-png-39071.png" alt="" class="img-responsive" />
        </div>
      </div>
    </div>
    </main>
</x-base-layout>



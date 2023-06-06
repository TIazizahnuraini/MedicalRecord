@if (session()->has('success'))

    <div class="flash-success" data-flashsuccess="{{ session()->get('success') }}"></div>

@endif

@if (session()->has('error'))

    <div class="flash-error" data-flasherror="{{ session()->get('error') }}"></div>

@endif

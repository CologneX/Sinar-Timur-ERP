@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3500)" x-show="show"
        class="alert alert-primary border rounded alert-dismissible animate__animated animate__fadeIn" role="alert"
        style="position: fixed;top: 90%;left: 1%;width: 40%;z-index: 9999; "><button type="button" class="btn-close"
            data-bs-dismiss="alert" aria-label="Close"></button>
        <span>
            {{ session('message') }}
        </span>
    </div>
@endif

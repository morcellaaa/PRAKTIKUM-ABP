<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background-color:#f8f9fa;
        }

        .card{
            border:none;
            border-radius:12px;
        }

        .card-header{
            background:#212529;
            color:white;
            padding:18px 24px;
        }

        .form-control{
            border-radius:8px;
        }

        .btn-primary{
            background:#0d6efd;
            border-color:#0d6efd;
        }

        .btn-outline-secondary{
            border-radius:8px;
            padding:8px 20px;
        }
    </style>

</head>

<body>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow-sm">

                <div class="card-header">
                    <h5 class="mb-0">
                        {{ isset($product) ? 'Edit Product' : 'Tambah Product' }}
                    </h5>
                </div>

                <div class="card-body">

                    @if(isset($product))
                        <form action="{{ route('products.update',$product->id) }}" method="POST">
                            @method('PUT')
                    @else
                        <form action="{{ route('products.store') }}" method="POST">
                    @endif

                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nama Product</label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ $product->name ?? '' }}"
                                required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Harga Product</label>
                            <input
                                type="number"
                                name="price"
                                class="form-control"
                                value="{{ $product->price ?? '' }}"
                                required>
                        </div>

                        <!-- ONLY BUTTON CHANGED -->
                        <button type="submit" class="btn btn-primary">
                            Simpan
                        </button>

                        <a href="{{ route('products.index') }}"
                           class="btn btn-outline-secondary">
                            Kembali
                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>
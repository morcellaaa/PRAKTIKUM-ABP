<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Product</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f8f9fa;
        }

        .card{
            border:none;
            border-radius:12px;
        }

        .table th{
            background:#212529;
            color:white;
        }
    </style>

</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Data Product</h3>

        <!-- ONLY BUTTON CHANGED -->
        <a href="{{ route('products.create') }}"
           class="btn btn-primary">
            Tambah Product
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-bordered align-middle">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Product</th>
                        <th>Harga</th>
                        <th>Variant</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($products as $product)

                    <tr>

                        <td>{{ $product->id }}</td>

                        <td>{{ $product->name }}</td>

                        <td>
                            Rp {{ number_format($product->price,0,',','.') }}
                        </td>

                        <td>

                            @forelse($product->variants as $variant)

                                <span class="badge bg-dark">
                                    {{ $variant->name }}
                                </span>

                            @empty

                                -

                            @endforelse

                        </td>

                        <td>

                            <a href="{{ route('products.edit',$product->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('products.destroy',$product->id) }}"
                                  method="POST"
                                  style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">
                                    Hapus
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="5" class="text-center">
                            Belum ada data
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>
    </div>

</div>

</body>
</html>
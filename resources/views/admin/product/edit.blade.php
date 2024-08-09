@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Product Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.product.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="code" value="{{ $product->code }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Product Category</label>
                                    <select name="category_code" class="form-control" id="">
                                        @foreach($category as $j)
                                            <option value="{{ $j->code }}" <?= $product->cateogry_code == $j->code ? 'selected' : '' ?>>{{ $j->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Product Photo</label>
                                    <div>
                                        <img id="photoPreview" src="{{ asset($product->photo ? 'image/photo-product/' . $product->photo : '') }}" alt="Your image" style="width: 200px; height: auto; margin-bottom: 10px;"/>
                                        <input type="file" name="photo" class="form-control" id="photoInput" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" value="{{ $product->name }}" name="name" class="form-control" placeholder="Product Name" required>
                                </div>
                                <div class="form-group">
                                    <label>Product Price</label>
                                    <input type="number" value="{{ $product->price }}" name="price" class="form-control" placeholder="Product Price" required>
                                </div>
                                <div class="form-group">
                                    <label>Product Weight</label>
                                    <input type="number" value="{{ $product->weight }}" name="weight" class="form-control" placeholder="Product Weight" required>
                                </div>
                                <div class="form-group">
                                    <label>Product Stock</label>
                                    <input type="number" value="{{ $product->weight }}" name="stock" class="form-control" placeholder="Product Stock" required>
                                </div>
                                <div class="form-group">
                                    <label>Product Description</label>
                                    <textarea name="description" class="form-control" id="" cols="30" rows="10" required>{{ $product->description }}</textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.product.index') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript untuk menampilkan pratinjau gambar -->
    <script>
        document.getElementById('photoInput').addEventListener('change', function(event) {
            const [file] = event.target.files;
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.getElementById('photoPreview');
                    img.src = e.target.result;
                    img.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection

@extends('layouts.app')
@section('main')

            <div class="container">
                <div class="row justify-content-center mt-3">
                    <div class="col-sm-8">
                    <div class="card shadow p-4">
                        <h3 class="text-muted"> Edit Product : {{ $product->name }}</h3>
                            <form action="/products/{{ $product->id }}/update" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="mb-3">
                                    <label for="Name" class="form-label">Name</label>
                                    <input type="text" name="name" 
                                        class="form-control @if($errors->has('name')) is-invalid @endif" 
                                        value="{{ old('name', $product->name) }}" 
                                        placeholder="Product Name">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                  </div>
                                  <div class="mb-3">
                                    <label for="Description" class="form-label">Description</label>
                                    <textarea class="form-control @if($errors->has('description')) is-invalid @endif" name="description" rows="4" placeholder="Description">{{ old('description', $product->description) }}</textarea>
                                         @if ($errors->has('description'))
                                            <span class="text-danger">{{ $errors->first('description') }}</span>
                                         @endif
                                  </div>
                                  <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Image</label>
                                    <input type="file" 
                                            name="image" 
                                            class="form-control @if($errors->has('image')) is-invalid @endif" name="image"/>
                                        @if ($errors->has('image'))
                                            <span class="text-danger">{{ $errors->first('image') }}</span>
                                        @endif
                                  </div>
                                  <div class="mb-3">
                                    <button type="submit" name="submit" value="submit" class="btn btn-dark ">Submit</button>
                                  </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @endsection

@extends('layouts.app')
@section('main')

            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-sm-8">
                        <a href="products/create" class="btn btn-dark my-2">Add New Product</a>
                        <div class="card  p-3">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Name</th>
                                      <th scope="col">Description</th>
                                      <th scope="col">Image</th>
                                      <th scope="col">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <th scope="row">{{ $loop->index+1 }}</th>
                                        <td><a class="text-dark" href="products/{{ $product->id }}/show">{{ $product->name }}</a></td>
                                        <td>{{ $product->description }}</td>
                                        <td>
                                            <img src="products/{{ $product->image }}" class="rounded-circle" width="30" height="30" alt="">
                                        </td>
                                        <td><a href="products/{{ $product->id }}/edit" class="btn btn-primary btn-sm">Edit</a> 
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Delete
                                              </button>
                                      </tr>
                                    @endforeach
                                  </tbody>
                              </table>
                              {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are sure You want to delete?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</buttdon>
                    <button type="button" class="btn btn-danger"><a class="text-white text-decoration-none" href="products/{{ $product ->id }}/delete">Delete</a></button>
                    </div>
                </div>
                </div>
            </div>

            @endsection

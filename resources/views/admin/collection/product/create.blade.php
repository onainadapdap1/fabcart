@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-5">
        <!-- Heading -->
        <div class="card mb-4 wow fadeIn">
            <!--Card content-->
            <div class="card-body d-sm-flex justify-content-between">
                <h6 class="mb-2 mb-sm-0 pt-1">
                    <a href="#">Collections</a>
                    <span>/</span>
                    <span>Products</span>
                    <span>/</span>
                    <span>Add Product</span>
                </h6>
            </div>
        </div>
        <!-- Heading -->

        {{-- body --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ url('store-product') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- navs tabs bootstrap --}}
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a href="#product" class="nav-link active" id="product-tab" data-bs-toggle="tab"
                                        data-bs-target="#product" role="tab" >Product</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="#descriptions" class="nav-link" id="descriptions-tab" data-bs-toggle="tab"
                                        data-bs-target="#descriptions" role="tab" >Description</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="#seo" class="nav-link" id="seo-tab" data-bs-toggle="tab"
                                        data-bs-target="#seo" role="tab" >SEO</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="#status" class="nav-link" id="status-tab" data-bs-toggle="tab"
                                        data-bs-target="#status" role="tab" >Product Status</a>
                                </li>
                            </ul>
                            <div class="tab-content border p-3" id="myTabContent">
                                {{-- product --}}
                                <div class="tab-pane fade show active" id="product" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Product name</label>
                                                <input type="text" name="product_name" class="form-control" placeholder="product name"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Select sub-category(Eg: brands)</label>
                                                <select name="sub_category_id" class="form-control" required>
                                                    <option value="">Select Subcategory</option>
                                                    @foreach ($subcategory as $subcatitem)
                                                        <option value="{{ $subcatitem->id }}">{{ $subcatitem->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Custom url(Slug)</label>
                                                <input type="text" name="url" placeholder="Custom url"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Small Description</label>
                                                <textarea name="small_description" class="form-control" placeholder="small description about product" rows="4"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Product Image</label>
                                                <input type="file" name="prod_image" placeholder="Product image"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Sale Tag</label>
                                                <input type="number" name="saletag" placeholder="original price"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Original Price</label>
                                                <input type="number" name="original_price" placeholder="original price"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Offer office</label>
                                                <input type="number" name="offer_office" placeholder="offer office"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Quantity</label>
                                                <input type="number" name="quantity" placeholder="quantity"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Priority</label>
                                                <input type="number" name="priority" placeholder="priority"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end product --}}

                                {{-- description --}}
                                <div class="tab-pane fade" id="descriptions" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="row-mt-3">
                                        <div class="col-md-12">
                                            <label for="">High Lights</label>
                                            <input type="text" name="p_highlight_heading"
                                                placeholder="High-Light Heading" class="form-control">
                                            <textarea name="p_highlights" placeholder="High-Light description" rows="4" class="form-control"></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">Product Description</label>
                                            <input type="text" name="p_description_heading"
                                                placeholder="Product description" class="form-control">
                                            <textarea name="p_description" placeholder="product description" rows="4" class="form-control"></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">Product Detail/Specification</label>
                                            <input type="text" name="p_details_heading"
                                                placeholder="Product details/ specification" class="form-control">
                                            <textarea name="p_details" placeholder="Product details/specification" rows="4" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                {{-- end description --}}

                                {{-- seo --}}
                                <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Meta title</label>
                                                <textarea name="meta_title" placeholder="High-Light description" rows="4" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Meta description</label>
                                                <textarea name="meta_description" placeholder="Product description" rows="4" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Meta keywords</label>
                                                <textarea name="meta_keyword" placeholder="Product detail/specification" rows="4" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end-seo --}}

                                {{-- product status --}}
                                <div class="tab-pane fade" id="status" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">New Arrival</label>
                                                <input type="checkbox" name="new_arrival_products" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Featured Products</label>
                                                <input type="checkbox" name="featured_products" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Popular Products</label>
                                                <input type="checkbox" name="popular_products" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Offer products</label>
                                                <input type="checkbox" name="offers_products" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Show / Hide</label>
                                                <input type="checkbox" name="status" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end product status --}}
                            </div>

                            <div class="form-group mt-3 text-right">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            {{-- end navs tabs bootstrap --}}

                            {{-- <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Group Id (Name)</label>
                                        <select name="group_id" class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($subcategory as $sub_item)
                                                <option value="{{ $sub_item->id }}">{{ $sub_item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="enter name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea rows="4" name="description" type="text" class="form-control" placeholder="enter description"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Image</label>
                                        <input type="file" name="category_img" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">ICON</label>
                                        <input type="file" name="category_icon" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Show / Hide</label>
                                        <input type="checkbox" name="status" class="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

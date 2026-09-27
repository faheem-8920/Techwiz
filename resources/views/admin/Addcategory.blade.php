@extends('admin.layouts.app')

@section('title', 'Add Category')

@section('page-title', 'Add Category')

@section('page-description', 'Create a new income or expense category')

@section('content')

    <div class="row">

        <div class="col-lg-6">

            <div class="admin-card">

                <div class="admin-card-header">

                    <h5>
                        <i class="fa-solid fa-layer-group"></i>
                        New Category
                    </h5>

                </div>

                <div class="admin-card-body">

                    <form action="{{ url('/Addcategorylogic') }}" method="POST">

                        @csrf

                        {{-- CATEGORY NAME --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Category Name
                            </label>

                            <input
                                type="text"
                                name="Name"
                                class="form-control @error('Name') is-invalid @enderror"
                                placeholder="e.g. Allowance, Groceries"
                                value="{{ old('Name') }}"
                                required
                            >

                            @error('Name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- CATEGORY TYPE --}}
                        <div class="mb-4">

                            <label class="form-label">
                                Category Type
                            </label>

                            <select
                                name="type"
                                class="form-select @error('type') is-invalid @enderror"
                                required
                            >

                                <option value="" selected disabled>
                                    Select Category Type
                                </option>

                                <option
                                    value="Income"
                                    {{ old('type') == 'Income' ? 'selected' : '' }}
                                >
                                    Income
                                </option>

                                <option
                                    value="Expense"
                                    {{ old('type') == 'Expense' ? 'selected' : '' }}
                                >
                                    Expense
                                </option>

                            </select>

                            @error('type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- BUTTONS --}}
                        <div class="d-flex gap-2">

                            <button type="submit" class="btn btn-primary">
                                <i class="fa-solid fa-plus"></i>
                                Add Category
                            </button>

                            <a href="{{ url('/allcategories') }}" class="btn btn-light">
                                Cancel
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection
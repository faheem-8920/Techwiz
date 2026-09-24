@extends('layouts.user')

@section('content')

<div class="page-heading">

    <div class="row">

        <div class="col-12 col-md-6">

            <h3>Categories</h3>

            <p class="text-subtitle text-muted">
                Manage your income and expense categories
            </p>

        </div>

        <div class="col-12 col-md-6 text-md-end">

            <button type="button"
                    class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#addCategoryModal">

                <i class="bi bi-plus-circle me-1"></i>
                Add Category

            </button>

        </div>

    </div>

</div>


<div class="page-content">

    <div class="row">

        {{-- ================= INCOME CATEGORIES ================= --}}

        <div class="col-12 col-lg-6">

            <div class="card">

                <div class="card-header">

                    <h4 class="card-title">
                        <i class="bi bi-arrow-down-circle text-success me-2"></i>
                        Income Categories
                    </h4>

                </div>

                <div class="card-body">

                    <div class="list-group">

                        {{-- Allowance --}}
                        <div class="list-group-item d-flex justify-content-between align-items-center">

                            <div>
                                <i class="bi bi-wallet2 text-success me-2"></i>
                                Allowance
                            </div>

                            <div>

                                <button type="button"
                                        class="btn btn-sm btn-outline-primary me-1">

                                    <i class="bi bi-pencil"></i>

                                </button>

                                <button type="button"
                                        class="btn btn-sm btn-outline-danger">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </div>

                        </div>


                        {{-- Part-time Job --}}
                        <div class="list-group-item d-flex justify-content-between align-items-center">

                            <div>
                                <i class="bi bi-briefcase text-success me-2"></i>
                                Part-time Job
                            </div>

                            <div>

                                <button type="button"
                                        class="btn btn-sm btn-outline-primary me-1">

                                    <i class="bi bi-pencil"></i>

                                </button>

                                <button type="button"
                                        class="btn btn-sm btn-outline-danger">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </div>

                        </div>


                        {{-- Scholarship --}}
                        <div class="list-group-item d-flex justify-content-between align-items-center">

                            <div>
                                <i class="bi bi-mortarboard text-success me-2"></i>
                                Scholarship
                            </div>

                            <div>

                                <button type="button"
                                        class="btn btn-sm btn-outline-primary me-1">

                                    <i class="bi bi-pencil"></i>

                                </button>

                                <button type="button"
                                        class="btn btn-sm btn-outline-danger">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </div>

                        </div>


                        {{-- Gift --}}
                        <div class="list-group-item d-flex justify-content-between align-items-center">

                            <div>
                                <i class="bi bi-gift text-success me-2"></i>
                                Gift
                            </div>

                            <div>

                                <button type="button"
                                        class="btn btn-sm btn-outline-primary me-1">

                                    <i class="bi bi-pencil"></i>

                                </button>

                                <button type="button"
                                        class="btn btn-sm btn-outline-danger">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </div>

                        </div>


                        {{-- Other Income --}}
                        <div class="list-group-item d-flex justify-content-between align-items-center">

                            <div>
                                <i class="bi bi-cash-stack text-success me-2"></i>
                                Other Income
                            </div>

                            <div>

                                <button type="button"
                                        class="btn btn-sm btn-outline-primary me-1">

                                    <i class="bi bi-pencil"></i>

                                </button>

                                <button type="button"
                                        class="btn btn-sm btn-outline-danger">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- ================= EXPENSE CATEGORIES ================= --}}

        <div class="col-12 col-lg-6">

            <div class="card">

                <div class="card-header">

                    <h4 class="card-title">
                        <i class="bi bi-arrow-up-circle text-danger me-2"></i>
                        Expense Categories
                    </h4>

                </div>

                <div class="card-body">

                    <div class="list-group">

                        {{-- Food --}}
                        <div class="list-group-item d-flex justify-content-between align-items-center">

                            <div>
                                <i class="bi bi-cup-hot text-danger me-2"></i>
                                Food
                            </div>

                            <div>

                                <button type="button"
                                        class="btn btn-sm btn-outline-primary me-1">

                                    <i class="bi bi-pencil"></i>

                                </button>

                                <button type="button"
                                        class="btn btn-sm btn-outline-danger">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </div>

                        </div>


                        {{-- Transport --}}
                        <div class="list-group-item d-flex justify-content-between align-items-center">

                            <div>
                                <i class="bi bi-bus-front text-danger me-2"></i>
                                Transport
                            </div>

                            <div>

                                <button type="button"
                                        class="btn btn-sm btn-outline-primary me-1">

                                    <i class="bi bi-pencil"></i>

                                </button>

                                <button type="button"
                                        class="btn btn-sm btn-outline-danger">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </div>

                        </div>


                        {{-- Hostel/Rent --}}
                        <div class="list-group-item d-flex justify-content-between align-items-center">

                            <div>
                                <i class="bi bi-house text-danger me-2"></i>
                                Hostel/Rent
                            </div>

                            <div>

                                <button type="button"
                                        class="btn btn-sm btn-outline-primary me-1">

                                    <i class="bi bi-pencil"></i>

                                </button>

                                <button type="button"
                                        class="btn btn-sm btn-outline-danger">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </div>

                        </div>


                        {{-- Academics --}}
                        <div class="list-group-item d-flex justify-content-between align-items-center">

                            <div>
                                <i class="bi bi-book text-danger me-2"></i>
                                Academics
                            </div>

                            <div>

                                <button type="button"
                                        class="btn btn-sm btn-outline-primary me-1">

                                    <i class="bi bi-pencil"></i>

                                </button>

                                <button type="button"
                                        class="btn btn-sm btn-outline-danger">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </div>

                        </div>


                        {{-- Subscriptions --}}
                        <div class="list-group-item d-flex justify-content-between align-items-center">

                            <div>
                                <i class="bi bi-play-circle text-danger me-2"></i>
                                Subscriptions
                            </div>

                            <div>

                                <button type="button"
                                        class="btn btn-sm btn-outline-primary me-1">

                                    <i class="bi bi-pencil"></i>

                                </button>

                                <button type="button"
                                        class="btn btn-sm btn-outline-danger">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </div>

                        </div>


                        {{-- Entertainment --}}
                        <div class="list-group-item d-flex justify-content-between align-items-center">

                            <div>
                                <i class="bi bi-controller text-danger me-2"></i>
                                Entertainment
                            </div>

                            <div>

                                <button type="button"
                                        class="btn btn-sm btn-outline-primary me-1">

                                    <i class="bi bi-pencil"></i>

                                </button>

                                <button type="button"
                                        class="btn btn-sm btn-outline-danger">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </div>

                        </div>


                        {{-- Miscellaneous --}}
                        <div class="list-group-item d-flex justify-content-between align-items-center">

                            <div>
                                <i class="bi bi-three-dots text-danger me-2"></i>
                                Miscellaneous
                            </div>

                            <div>

                                <button type="button"
                                        class="btn btn-sm btn-outline-primary me-1">

                                    <i class="bi bi-pencil"></i>

                                </button>

                                <button type="button"
                                        class="btn btn-sm btn-outline-danger">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- ================= ADD CATEGORY MODAL ================= --}}

<div class="modal fade"
     id="addCategoryModal"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">


            <div class="modal-header">

                <h5 class="modal-title">
                    Add Category
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>


            <div class="modal-body">

                <form>

                    {{-- CATEGORY NAME --}}

                    <div class="mb-3">

                        <label class="form-label">
                            Category Name
                        </label>

                        <input type="text"
                               class="form-control"
                               placeholder="Enter category name">

                    </div>


                    {{-- CATEGORY TYPE --}}

                    <div class="mb-3">

                        <label class="form-label">
                            Category Type
                        </label>

                        <select class="form-select">

                            <option selected>
                                Select Type
                            </option>

                            <option value="income">
                                Income
                            </option>

                            <option value="expense">
                                Expense
                            </option>

                        </select>

                    </div>


                    {{-- BUTTONS --}}

                    <div class="text-end">

                        <button type="button"
                                class="btn btn-light-secondary"
                                data-bs-dismiss="modal">

                            Cancel

                        </button>

                        <button type="button"
                                class="btn btn-primary">

                            <i class="bi bi-check-circle me-1"></i>

                            Save Category

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection
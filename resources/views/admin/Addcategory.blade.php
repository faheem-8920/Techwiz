@extends('admin.layouts.app')

@section('title', 'Add Category')

@section('page-title', 'Add Category')

@section('page-description', 'Create a new income or expense category')

@section('content')

    <div style="min-height:80vh; display:flex; align-items:center; justify-content:center; padding:40px 20px; background:linear-gradient(135deg, #f5f7ff 0%, #eef1f8 100%);">

        <div style="width:100%; max-width:520px;">

            <div style="background:#ffffff; border:1px solid #e9eaf0; border-radius:16px; box-shadow:0 10px 30px rgba(17,24,39,0.08), 0 2px 8px rgba(17,24,39,0.04); overflow:hidden; animation:fadeInUp .35s ease;">

                {{-- HEADER --}}
                <div style="padding:26px 32px; background:linear-gradient(135deg, #4f46e5 0%, #6366f1 100%); position:relative;">

                    <div style="display:flex; align-items:center; gap:14px;">

                        <div style="width:44px; height:44px; border-radius:12px; background:rgba(255,255,255,0.18); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <i class="fa-solid fa-layer-group" style="color:#ffffff; font-size:18px;"></i>
                        </div>

                        <div>
                            <h5 style="margin:0; font-size:18px; font-weight:700; color:#ffffff; letter-spacing:-0.01em;">
                                New Category
                            </h5>
                            <p style="margin:2px 0 0; font-size:13px; color:rgba(255,255,255,0.8);">
                                Organize your income & expenses
                            </p>
                        </div>

                    </div>

                </div>

                {{-- BODY --}}
                <div style="padding:32px;">

                    <form action="{{ url('/Addcategorylogic') }}" method="POST">

                        @csrf

                        {{-- CATEGORY NAME --}}
                        <div style="margin-bottom:22px;">

                            <label style="display:block; margin-bottom:7px; font-size:13px; font-weight:600; color:#374151; letter-spacing:0.01em;">
                                Category Name
                            </label>

                            <input
                                type="text"
                                name="Name"
                                class="@error('Name') is-invalid @enderror"
                                placeholder="e.g. Allowance, Groceries"
                                value="{{ old('Name') }}"
                                required
                                style="width:100%; padding:12px 16px; font-size:14px; color:#111827; background:#f9fafb; border:1.5px solid @error('Name') #dc2626 @else #e5e7eb @enderror; border-radius:10px; outline:none; box-sizing:border-box; transition:all .18s ease;"
                                onfocus="this.style.borderColor='#4f46e5'; this.style.background='#ffffff'; this.style.boxShadow='0 0 0 4px rgba(79,70,229,0.12)';"
                                onblur="this.style.borderColor='@error('Name') #dc2626 @else #e5e7eb @enderror'; this.style.background='#f9fafb'; this.style.boxShadow='none';"
                            >

                            @error('Name')
                                <div style="margin-top:6px; font-size:13px; color:#dc2626; display:flex; align-items:center; gap:5px;">
                                    <i class="fa-solid fa-circle-exclamation" style="font-size:11px;"></i>
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        {{-- CATEGORY TYPE --}}
                        <div style="margin-bottom:30px;">

                            <label style="display:block; margin-bottom:7px; font-size:13px; font-weight:600; color:#374151; letter-spacing:0.01em;">
                                Category Type
                            </label>

                            <select
                                name="type"
                                class="@error('type') is-invalid @enderror"
                                required
                                style="width:100%; padding:12px 16px; font-size:14px; color:#111827; background:#f9fafb; border:1.5px solid @error('type') #dc2626 @else #e5e7eb @enderror; border-radius:10px; outline:none; cursor:pointer; box-sizing:border-box; transition:all .18s ease;"
                                onfocus="this.style.borderColor='#4f46e5'; this.style.background='#ffffff'; this.style.boxShadow='0 0 0 4px rgba(79,70,229,0.12)';"
                                onblur="this.style.borderColor='@error('type') #dc2626 @else #e5e7eb @enderror'; this.style.background='#f9fafb'; this.style.boxShadow='none';"
                            >

                                <option value="" selected disabled>Select Category Type</option>
                                <option value="Income" {{ old('type') == 'Income' ? 'selected' : '' }}>Income</option>
                                <option value="Expense" {{ old('type') == 'Expense' ? 'selected' : '' }}>Expense</option>

                            </select>

                            @error('type')
                                <div style="margin-top:6px; font-size:13px; color:#dc2626; display:flex; align-items:center; gap:5px;">
                                    <i class="fa-solid fa-circle-exclamation" style="font-size:11px;"></i>
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        {{-- BUTTONS --}}
                        <div style="display:flex; gap:12px;">

                            <button
                                type="submit"
                                style="flex:1; display:inline-flex; align-items:center; justify-content:center; gap:8px; padding:13px 20px; font-size:14px; font-weight:600; color:#fff; background:linear-gradient(135deg, #4f46e5, #6366f1); border:none; border-radius:10px; cursor:pointer; box-shadow:0 4px 12px rgba(79,70,229,0.25); transition:all .18s ease;"
                                onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 16px rgba(79,70,229,0.32)';"
                                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(79,70,229,0.25)';"
                            >
                                <i class="fa-solid fa-plus"></i>
                                Add Category
                            </button>

                          

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <style>
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(12px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

@endsection
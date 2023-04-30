@extends('base')
@section('content')
    <!-- main Start -->
    <div class="container mt-5">
        <h5>Personal Information</h5>
        <div id="info_form">
            <!-- personal-info start -->
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="form-outline">
                        <input type="text" name="fname" class="form-control" id="validationCustom01" required />
                        <label for="validationCustom01" class="form-label">First name</label>
                        <!-- <div class="valid-feedback">Looks good!</div> -->
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="form-outline">
                        <input type="text" name="lname" class="form-control" id="validationCustom02" required />
                        <label for="validationCustom02" class="form-label">Last name</label>
                        <!-- <div class="valid-feedback">Looks good!</div> -->
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="input-group form-outline">
                        <input type="tel" name="phone" class="form-control" id="validationCustomUsername"
                            aria-describedby="inputGroupPrepend" required />
                        <label for="validationCustomUsername" class="form-label">Phone Number</label>
                        <!-- <div class="invalid-feedback">Please choose a username.</div> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-outline">
                        <input type="text" name="address" class="form-control" id="validationCustom03" required />
                        <label for="validationCustom03" class="form-label">Address</label>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-outline">
                        <input type="date" name="delivery_date" id="date-time" class="form-control" id="validationCustom05" required />
                        <label for="validationCustom05" class="form-label">Delivery Date</label>
                        <!-- <div class="invalid-feedback">Please provide a valid zip.</div> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- personal-info end -->
        <!-- measurement start  -->

        <legend>Measurements</legend>
        <div class="row mb-3" id="stiching_type">
            <h6>Stitching</h6>
            <div class="col">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Stitching" value="suit" checked />
                    <label class="form-check-label">Suit</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Stitching" value="shirt" />
                    <label class="form-check-label">Shirt</label>
                </div>
                {{-- <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Stitching" value="pant" />
                    <label class="form-check-label">Pant</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Stitching" value="skirt" />
                    <label class="form-check-label">Skirt</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Stitching" value="coat" />
                    <label class="form-check-label">Coat</label>
                </div> --}}
            </div>
        </div>

        <section id="measurement">
            <!-- suit start  -->
            <div id="suit">
                <form id="suit_form" action="{{route('placeorder')}}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-2 mb-3">
                            <div class="form-outline">
                                <input type="number" class="form-control" required name="chest" min="1" />
                                <label class="form-label">Chest</label>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="input-group form-outline">
                                <input type="number" class="form-control" required name="waist" min="1" />
                                <label class="form-label">Waist</label>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="input-group form-outline">
                                <input type="number" class="form-control" required name="hips" min="1" />
                                <label class="form-label">Hips</label>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="input-group form-outline">
                                <input type="number" class="form-control" required name="shoulder length" min="1" />
                                <label class="form-label">Shoulder</label>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="input-group form-outline">
                                <input type="number" class="form-control" required name="sleeve length"
                                    min="1" />
                                <label class="form-label">Length Sleeve</label>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="input-group form-outline">
                                <input type="number" class="form-control" required name="jacket length"
                                    min="1" />
                                <label class="form-label">Jacket Length</label>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="input-group form-outline">
                                <input type="number" class="form-control" required name="pant waist" min="1" />
                                <label class="form-label">Pant Waist</label>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="input-group form-outline">
                                <input type="number" class="form-control" required name="pant inseam" min="1" />
                                <label class="form-label">Pant Inseam</label>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="input-group form-outline">
                                <input type="number" class="form-control" required name="pant outseam"
                                    min="1" />
                                <label class="form-label">Pant Outseam</label>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="input-group form-outline">
                                <input type="number" class="form-control" required name="pant rise" min="1" />
                                <label class="form-label">Pant Rise</label>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <input type="hidden" name="price" value="2500">
                            <button class="btn btn-primary" type="submit">Order</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- suit end  -->
            <!-- shirt start  -->
            <div id="shirt" style="display: none">
                <form id="shirt_form" action="{{route('placeorder')}}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-2 mb-3">
                            <div class="form-outline">
                                <input type="number" class="form-control" required name="chest" min="1" />
                                <label class="form-label">Chest</label>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="input-group form-outline">
                                <input type="number" class="form-control" required name="waist" min="1" />
                                <label class="form-label">Waist</label>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="input-group form-outline">
                                <input type="number" class="form-control" required name="hips" min="1" />
                                <label class="form-label">Hips</label>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="input-group form-outline">
                                <input type="number" class="form-control" required name="shoulder length"
                                    min="1" />
                                <label class="form-label">Shoulder</label>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="input-group form-outline">
                                <input type="number" class="form-control" required name="sleeve length"
                                    min="1" />
                                <label class="form-label">Sleeve Length</label>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="input-group form-outline">
                                <input type="number" class="form-control" required name="shirt length"
                                    min="1" />
                                <label class="form-label">Shirt Length</label>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <input type="hidden" name="price" value="1000">
                            <button class="btn btn-primary" type="submit">Order</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- shirt end  -->
        </section>

        <!-- measurement end  -->
    </div>
    <!-- main end -->
@endsection
@section('scripts')
    <script>
        $(document).ready(() => {

            $('#date-time').attr('min', new Date().toISOString().split('T')[0]) //setting up date
            $('#info_form input').attr('form', 'suit_form') //binding personal info form to order form
            $('#stiching_type input').change(function() {
                switch (this.value) {
                    case 'suit':
                        $('#info_form input').attr('form', 'suit_form')
                        $('#measurement > div').hide()
                        $('#suit').show()
                        break;
                    case 'shirt':
                        $('#info_form input').attr('form', 'shirt_form')
                        $('#measurement > div').hide()
                        $('#shirt').show()
                        break;
                    default:
                        $('#measurement > div').hide()
                        break
                }
            })
        })
    </script>
@endsection

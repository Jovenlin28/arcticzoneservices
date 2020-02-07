@extends('layouts.client-master')



@section('content')


<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Account Settings</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 


            <div class="row">
                <div class="col-lg-4 col-xl-4">
                    <div class="card-box text-center">
                        <img src="{{ asset('assets/images/default.png')}}" class="rounded-circle avatar-lg img-thumbnail"
                            alt="profile-image">
                        <div class="upload">
                            <label for="avatar">Update Photo</label>
                            <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">
                        </div>

                        <h4 class="mb-0">
                            {{ $user->client->firstname . ' ' . $user->client->lastname }}
                        </h4>
                        <p class="text-muted">Client</p>

                        <div class="text-left mt-3">
                          
                            <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> 
                                <span id="firstname" class="ml-2">
                                    {{ $user->client->firstname . ' ' . $user->client->lastname }}
                                </span>
                            </p>

                            <p class="text-muted mb-2 font-13"><strong>Mobile :</strong>
                                <span id="contact-number" class="ml-2">
                                    {{ $user->client->contact_number }}
                                </span>
                            </p>

                            <p class="text-muted mb-2 font-13"><strong>Email Address :</strong> 
                                <span id="email" class="ml-2 ">
                                    {{ $user->email }}
                                </span>
                            </p>

                            <p  class="text-muted mb-1 font-13"><strong>Address :</strong> 
                                <span id="address" class="ml-2">
                                    {{ $user->client->address }}
                                </span>
                            </p>
                        </div>

                       
                    </div> <!-- end card-box -->

                    
                </div> <!-- end col-->

                <div class="col-lg-8 col-xl-8">
                    <div class="card-box">

                       

                            <div class="tab-pane" id="settings">
                                <form id="update-user">
                                    <input type="hidden" 
                                    name="user_id"
                                    value="{{ $user->id }}">
                                    <input type="hidden" name="_method" value="PUT">
                                    <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle mr-1"></i> Personal Info</h5>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="firstname">First Name</label>
                                                <input required type="text"
                                                name="firstname" 
                                                value="{{$user->client->firstname}}"
                                                class="form-control" 
                                                id="firstname" 
                                                placeholder="Enter first name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lastname">Last Name</label>
                                                <input required type="text" 
                                                name="lastname"
                                                value="{{$user->client->lastname}}"
                                                class="form-control" 
                                                id="lastname" 
                                                placeholder="Enter last name">
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input required type="text" 
                                                name="address"
                                                value="{{$user->client->address}}"
                                                class="form-control" 
                                                id="address" 
                                                placeholder="Enter email"></textarea>
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email Address</label>
                                                <input required type="email"
                                                name="email"
                                                value="{{$user->email}}" 
                                                class="form-control" 
                                                id="email" 
                                                placeholder="Enter email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="contact">Contact Number</label>
                                                <input required type="text" 
                                                name="contact"
                                                value="{{$user->client->contact_number}}"
                                                class="form-control" 
                                                id="contact" 
                                                placeholder="Enter Contact Number">
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input required type="password" 
                                                name="password"
                                                class="form-control" 
                                                id="password" 
                                                placeholder="Enter Password">
                                                <small>Must be at least 6 characters long.</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="confirm-password">Confirm Password</label>
                                                <input required type="password" 
                                                class="form-control" 
                                                id="confirm-password" 
                                                placeholder="Enters password">
                                            </div>

                                            <small id="not-match-password" class="text-danger">
                                                Confirm Password does not match
                                            </small>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                   
                                    
                                    <div class="text-left">
                                        <button type="submit" class="btn btn-success"><i class="mdi mdi-content-save"></i> Save</button>
                                    </div>
                                </form>
                            </div>
                            <!-- end settings content-->

                        </div> <!-- end tab-content -->
                    </div> <!-- end card-box-->

                </div> <!-- end col -->
            </div>
            <!-- end row-->
        </div> <!-- container -->
    </div> <!-- content -->
</main>

<script type="text/javascript">
    $(document).ready(function(){
        $('form#update-user').submit(function(evt){
            evt.preventDefault();
            $('#not-match-password').hide();
            
            const data = $(this).serialize();
            const pass = $('input#password').val();
            const confirmPass = $('input#confirm-password').val();
            if (pass !== confirmPass) {
                $('#not-match-password').fadeIn(500);
                return;
            }
            updateUser($(this));
        });

        $('input#avatar').on('change', function(evt){
            console.log(evt);
        });
    });

    function transformData(data) {
        return data.reduce((acc, item) => {
            acc[item.name] = item.value;
            return acc;
        }, {})
    }

    function renderNewData(user) {
        $("span#firstname").text(user.firstname);
        $("span#lastname").text(user.lastname);
        $("span#email").text(user.email);
        $("span#address").text(user.address);
        $("span#contact-number").text(user.contact);
    }


    function updateUser(form) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: ' {{ url("client/update") }} ',
            type: 'PUT',
            data: form.serialize(),
            success: function(res) {
                const userInfoObject = transformData(form.serializeArray());
                renderNewData(userInfoObject);
            },

            error: function(err) {
                console.log(err);
            }
        })
    }
</script>




@endsection
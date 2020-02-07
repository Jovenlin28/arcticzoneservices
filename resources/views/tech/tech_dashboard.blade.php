@extends('layouts.tech-master')


@section('content')
                       
    <div class="row mt-5">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Service Job</h4>
            </div>
        </div>
    </div>     
    
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-danger py-3 text-white">
                    <div class="card-widgets">                
                        <a data-toggle="collapse" href="#cardCollpase4" role="button" aria-expanded="false" aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                    </div>
                    
                    <h5 class="card-title mb-0 text-white">SR01 - Cleaning</h5>
                </div>
                                    
                <div id="cardCollpase4" class="collapse show">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <p> <b> CL01 - Sofia Valerio</b> <br>
                                        Quezon City ; Company <br>
                                        1720 Dahlia St. Purok 17 Brgy. Commonwealth Quezon City <br>
                                        09357288473
                                </p>

                                <p class="mt-4"> <b> Appliances:</b> <br>
                                                    Window (1) - Samsung/Non-inverter <br>
                                </p>

                                <p class="mt-4"> <b> Problems Encountered:</b> <br>
                                                    - 
                                </p>

                            </div>

                            <div class="col-md-5">
                                <p> <b> Service Time and Date:</b> <br>
                                        Jan 21 2020 /
                                        12PM - 3PM
                                </p>
                            </div>
                        </div>

                                         
                        <div class="row">
                            <div class="col-md-6">
                                <p class="text-muted">less than 1 minute ago</p>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-danger btn-md float-right" data-toggle="modal" data-target="#FinishService">Finish Service</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                                
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-success mb-0">Completed Lane</h5>

                        <div class="collapse pt-3 show">
                            This lane shows the service is finished. You may want to see all your progress.
                        </div>
                </div>
            </div>


                <div class="card">
                    <div class="card-header bg-success py-3 text-white">
                        <div class="card-widgets">        
                            <a data-toggle="collapse" href="#cardCollpase1" role="button" aria-expanded="false" aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>  
                        </div>
                            
                            <h5 class="card-title mb-0 text-white">SR01 - Cleaning</h5>
                    </div>
                                    
                    <div id="cardCollpase1" class="collapse show">
                        <div class="card-body">
                            <p> Work Done: <br>
                                -
                            </p>

                            <p class="mt-4"> Remarks: <br>
                                            -
                            </p>

                            <p class="text-muted">less than 1 minute ago</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>


                <!-- Modal Content -->
                    <div id="FinishService" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-danger" id="myModalLabel">Finish Service</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">



                                     <label>Work Done:</label>
                                        <select class="form-control">
                                          <option class="text-muted">-- Please select here --</option>
                                          <option>2</option>
                                          <option>3</option>
                                          <option>4</option>
                                          <option>5</option>
                                        </select>

                                    <br>

                                    <label>Please enter your remarks:</label>
                                    <textarea class="form-control" rows="5"></textarea>
                                                                                                        
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger waves-effect waves-light">Finish Service</button>
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- End of Modal Content -->


@endsection
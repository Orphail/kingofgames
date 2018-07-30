@extends('member.base')

@section('content')
    <div class="bg-light pb-5" id="dashboard">
        <div class="container">
            <div class="pt-4 pb-3">
                <h2 class="title-text">Hola {{$member->name}}</h2>
                <p>Bienvenido a tu resumen de derrotas y rageadas varias</p>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card-deck mb-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h4 class="card-title text-success"><img src="{{ asset('img/device_icon.svg') }}"
                                                                         class="mr-4"/>My Devices</h4>
                                <hr/>
                                <div class="row">
                                    <div class="col text-center">
                                        <div class="text-success display-3">3</div>
                                        <div class="text-black-50">ACTIVE</div>
                                    </div>
                                    <div class="col text-center">
                                        <div class="text-success display-3">4</div>
                                        <div class="text-black-50">TOTAL</div>

                                    </div>
                                </div>
                                <hr/>
                                <p class="card-text"><b>Actually working</b><br/><span
                                            class="text-black-50">LB0001</span></p>
                            </div>
                            <div class="card-footer bg-white text-center border-0">
                                <a href="#" class="btn btn-primary">Request a device</a>
                            </div>
                        </div>
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h4 class="card-title text-warning"><img src="{{ asset('img/media_icon.svg') }}"
                                                                         class="mr-4"/>My Medias</h4>
                                <hr/>
                                <div class="row">
                                    <div class="col text-center">
                                        <div class="text-warning display-3">25</div>
                                        <div class="text-black-50">IMAGES</div>
                                    </div>
                                    <div class="col text-center">
                                        <div class="text-warning display-3">4</div>
                                        <div class="text-black-50">VIDEOS</div>

                                    </div>
                                </div>
                                <hr/>
                                <p class="card-text"><b>Private media templates: </b><span
                                            class="text-black-50">LB0001</span></p>
                                <hr/>
                                <p class="card-text"><b>Private media templates: </b><span
                                            class="text-black-50">LB0001</span></p>
                                <hr/>
                            </div>
                            <div class="card-footer bg-white text-center border-0">
                                <a href="#" class="btn btn-primary">Manage</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-deck">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h4 class="card-title text-campaign"><img src="{{ asset('img/campaign_icon.svg') }}"
                                                                          class="mr-4"/>My Campaigns</h4>
                                <hr/>
                                <div class="row">
                                    <div class="col text-center">
                                        <div class="text-campaign display-3">12</div>
                                        <div class="text-black-50">ACTIVE</div>
                                    </div>
                                    <div class="col text-center">
                                        <div class="text-campaign display-3">40</div>
                                        <div class="text-black-50">TOTAL</div>
                                    </div>
                                </div>
                                <hr/>
                                <p class="card-text"><b>Active campaign since 31 days:</b><br/><span
                                            class="text-black-50">Nespresso</span></p>
                            </div>
                            <div class="card-footer bg-white text-center border-0">
                                <a href="#" class="btn btn-primary">View all campaigns</a>
                            </div>
                        </div>
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h4 class="card-title text-statistic"><img src="{{ asset('img/statis_icon.svg') }}"
                                                                           class="mr-4"/>Statistics</h4>
                                <hr/>
                                <div class="row">
                                    <div class="col text-center">
                                        <div class="text-statistic display-4">3453</div>
                                        <div class="text-black-50">TOTAL CLICKS</div>
                                    </div>
                                    <div class="col text-center">
                                        <div class="text-statistic display-4">424</div>
                                        <div class="text-black-50">TOUCHES TODAY</div>

                                    </div>
                                </div>
                                <hr/>
                                <p class="card-text"><b>Nespresso campaign </b><br/><span
                                            class="text-black-50">Touches per day Active and Inactive POS</span></p>
                            </div>
                            <div class="card-footer bg-white text-center border-0">
                                <a href="#" class="btn btn-primary">View all</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm" id="notifications">
                        <div class="card-body">
                            <h4 class="card-title text-primary"><img src="{{ asset('img/notis_icon.svg') }}"
                                                                     class="mr-4"/>Notifications</h4>
                            <hr/>
                            <div class="d-block mb-2 pb-2 bordered">
                                <span class="small text-black-50">
                                    20/07/2019 - From laboite
                                </span>
                                <span class="text-truncate d-block font-weight-bold">2 new medias approved</span>
                            </div>

                            <div class="d-block mb-2 pb-2 bordered">
                                <span class="small text-black-50">
                                    20/07/2019 - From laboite
                                </span>
                                <span class="text-truncate d-block font-weight-bold">New media uploaded</span>
                            </div>

                            <div class="d-block mb-2 pb-2 bordered">
                                <span class="small text-black-50">
                                    20/07/2019 - From laboite
                                </span>
                                <span class="text-truncate d-block font-weight-bold">You have a new message</span>
                            </div>

                            <div class="d-block mb-2 pb-2 bordered">
                                <span class="small text-black-50">
                                    20/07/2019 - From laboite
                                </span>
                                <span class="text-truncate d-block font-weight-bold">2 new medias approved</span>
                            </div>

                            <div class="mt-5 text-center">
                                <a href="#" class="btn btn-primary">See more messages</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
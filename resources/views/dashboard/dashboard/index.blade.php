@extends('layouts.main')

@section('content')
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">

    <div class="row">
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
                <div class="box bg-cyan text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                    <h6 class="text-white">Dashboard</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
                <div class="box bg-success text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                    <h6 class="text-white">Charts</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
                <div class="box bg-warning text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
                    <h6 class="text-white">Widgets</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
                <div class="box bg-danger text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
                    <h6 class="text-white">Tables</h6>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- Recent comment and chats -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Latest Posts</h4>
                </div>
                <div class="comment-widgets scrollable">
                    <!-- Comment Row -->
                    <div class="d-flex flex-row comment-row mt-0">
                        <div class="p-2"><img src="{{ asset('assets/images/users/1.jpg') }}" alt="user" width="50"
                                class="rounded-circle"></div>
                        <div class="comment-text w-100">
                            <h6 class="font-medium">James Anderson</h6>
                            <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing
                                and type setting industry. </span>
                            <div class="comment-footer">
                                <span class="text-muted float-end">April 14, 2021</span>
                                <button type="button" class="btn btn-cyan btn-sm text-white">Edit</button>
                                <button type="button" class="btn btn-success btn-sm text-white">Publish</button>
                                <button type="button" class="btn btn-danger btn-sm text-white">Delete</button>
                            </div>
                        </div>
                    </div>
                    <!-- Comment Row -->
                    <div class="d-flex flex-row comment-row">
                        <div class="p-2"><img src="{{ asset('assets/images/users/4.jpg') }}" alt="user" width="50"
                                class="rounded-circle"></div>
                        <div class="comment-text active w-100">
                            <h6 class="font-medium">Michael Jorden</h6>
                            <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing
                                and type setting industry. </span>
                            <div class="comment-footer">
                                <span class="text-muted float-end">May 10, 2021</span>
                                <button type="button" class="btn btn-cyan btn-sm text-white">Edit</button>
                                <button type="button" class="btn btn-success btn-sm text-white">Publish</button>
                                <button type="button" class="btn btn-danger btn-sm text-white">Delete</button>
                            </div>
                        </div>
                    </div>
                    <!-- Comment Row -->
                    <div class="d-flex flex-row comment-row">
                        <div class="p-2"><img src="{{ asset('assets/images/users/5.jpg') }}" alt="user" width="50"
                                class="rounded-circle"></div>
                        <div class="comment-text w-100">
                            <h6 class="font-medium">Johnathan Doeting</h6>
                            <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing
                                and type setting industry. </span>
                            <div class="comment-footer">
                                <span class="text-muted float-end">August 1, 2021</span>
                                <button type="button" class="btn btn-cyan btn-sm text-white">Edit</button>
                                <button type="button" class="btn btn-success btn-sm text-white">Publish</button>
                                <button type="button" class="btn btn-danger btn-sm text-white">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">To Do List</h4>
                    <div class="todo-widget scrollable" style="height:450px;">
                        <ul class="list-task todo-list list-group mb-0" data-role="tasklist">
                            <li class="list-group-item todo-item" data-role="task">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck">
                                    <label class="form-check-label w-100 mb-0 todo-label" for="customCheck">
                                        <span class="todo-desc fw-normal">Lorem Ipsum is simply dummy text of the
                                            printing and typesetting industry.</span> <span
                                            class="badge rounded-pill bg-danger float-end">Today</span>
                                    </label>
                                </div>
                                <ul class="list-style-none assignedto">
                                    <li class="assignee"><img class="rounded-circle" width="40"
                                            src="{{ asset('assets/images/users/1.jpg') }}" alt="user"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Steave"></li>
                                    <li class="assignee"><img class="rounded-circle" width="40"
                                            src="{{ asset('assets/images/users/2.jpg') }}" alt="user"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Jessica"></li>
                                    <li class="assignee"><img class="rounded-circle" width="40"
                                            src="{{ asset('assets/images/users/3.jpg') }}" alt="user"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Priyanka"></li>
                                    <li class="assignee"><img class="rounded-circle" width="40"
                                            src="{{ asset('assets/images/users/4.jpg') }}" alt="user"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Selina"></li>
                                </ul>
                            </li>
                            <li class="list-group-item todo-item" data-role="task">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck1">
                                    <label class="form-check-label w-100 mb-0 todo-label" for="customCheck1">
                                        <span class="todo-desc fw-normal">Lorem Ipsum is simply dummy text of the
                                            printing</span><span
                                            class="badge rounded-pill bg-primary float-end">1 week
                                        </span>
                                    </label>
                                </div>
                                <div class="item-date"> 26 jun 2021</div>
                            </li>
                            <li class="list-group-item todo-item" data-role="task">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck2">
                                    <label class="form-check-label w-100 mb-0 todo-label" for="customCheck2">
                                        <span class="todo-desc fw-normal">Give Purchase report to</span> <span
                                            class="badge rounded-pill bg-info float-end">Yesterday</span>
                                    </label>
                                </div>
                                <ul class="list-style-none assignedto">
                                    <li class="assignee"><img class="rounded-circle" width="40"
                                            src="{{ asset('assets/images/users/3.jpg') }}" alt="user"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Priyanka"></li>
                                    <li class="assignee"><img class="rounded-circle" width="40"
                                            src="{{ asset('assets/images/users/4.jpg') }}" alt="user"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Selina"></li>
                                </ul>
                            </li>
                            <li class="list-group-item todo-item" data-role="task">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck3">
                                    <label class="form-check-label w-100 mb-0 todo-label" for="customCheck3">
                                        <span class="todo-desc fw-normal">Lorem Ipsum is simply dummy text of the
                                            printing </span> <span
                                            class="badge rounded-pill bg-warning float-end">2
                                            weeks</span>
                                    </label>
                                </div>
                                <div class="item-date"> 26 jun 2021</div>
                            </li>
                            <li class="list-group-item todo-item" data-role="task">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck4">
                                    <label class="form-check-label w-100 mb-0 todo-label" for="customCheck4">
                                        <span class="todo-desc fw-normal">Give Purchase report to</span> <span
                                            class="badge rounded-pill bg-info float-end">Yesterday</span>
                                    </label>
                                </div>
                                <ul class="list-style-none assignedto">
                                    <li class="assignee"><img class="rounded-circle" width="40"
                                            src="{{ asset('assets/images/users/3.jpg') }}" alt="user"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Priyanka"></li>
                                    <li class="assignee"><img class="rounded-circle" width="40"
                                            src="{{ asset('assets/images/users/4.jpg') }}" alt="user"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Selina"></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->

        <div class="col-lg-6">
            <!-- Card -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">To Do List</h4>
                    <div class="todo-widget scrollable" style="height:450px;">
                        <ul class="list-task todo-list list-group mb-0" data-role="tasklist">
                            <li class="list-group-item todo-item" data-role="task">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck">
                                    <label class="form-check-label w-100 mb-0 todo-label" for="customCheck">
                                        <span class="todo-desc fw-normal">Lorem Ipsum is simply dummy text of the
                                            printing and typesetting industry.</span> <span
                                            class="badge rounded-pill bg-danger float-end">Today</span>
                                    </label>
                                </div>
                                <ul class="list-style-none assignedto">
                                    <li class="assignee"><img class="rounded-circle" width="40"
                                            src="{{ asset('assets/images/users/1.jpg') }}" alt="user"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Steave"></li>
                                    <li class="assignee"><img class="rounded-circle" width="40"
                                            src="{{ asset('assets/images/users/2.jpg') }}" alt="user"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Jessica"></li>
                                    <li class="assignee"><img class="rounded-circle" width="40"
                                            src="{{ asset('assets/images/users/3.jpg') }}" alt="user"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Priyanka"></li>
                                    <li class="assignee"><img class="rounded-circle" width="40"
                                            src="{{ asset('assets/images/users/4.jpg') }}" alt="user"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Selina"></li>
                                </ul>
                            </li>
                            <li class="list-group-item todo-item" data-role="task">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck1">
                                    <label class="form-check-label w-100 mb-0 todo-label" for="customCheck1">
                                        <span class="todo-desc fw-normal">Lorem Ipsum is simply dummy text of the
                                            printing</span><span
                                            class="badge rounded-pill bg-primary float-end">1 week
                                        </span>
                                    </label>
                                </div>
                                <div class="item-date"> 26 jun 2021</div>
                            </li>
                            <li class="list-group-item todo-item" data-role="task">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck2">
                                    <label class="form-check-label w-100 mb-0 todo-label" for="customCheck2">
                                        <span class="todo-desc fw-normal">Give Purchase report to</span> <span
                                            class="badge rounded-pill bg-info float-end">Yesterday</span>
                                    </label>
                                </div>
                                <ul class="list-style-none assignedto">
                                    <li class="assignee"><img class="rounded-circle" width="40"
                                            src="{{ asset('assets/images/users/3.jpg') }}" alt="user"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Priyanka"></li>
                                    <li class="assignee"><img class="rounded-circle" width="40"
                                            src="{{ asset('assets/images/users/4.jpg') }}" alt="user"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Selina"></li>
                                </ul>
                            </li>
                            <li class="list-group-item todo-item" data-role="task">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck3">
                                    <label class="form-check-label w-100 mb-0 todo-label" for="customCheck3">
                                        <span class="todo-desc fw-normal">Lorem Ipsum is simply dummy text of the
                                            printing </span> <span
                                            class="badge rounded-pill bg-warning float-end">2
                                            weeks</span>
                                    </label>
                                </div>
                                <div class="item-date"> 26 jun 2021</div>
                            </li>
                            <li class="list-group-item todo-item" data-role="task">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck4">
                                    <label class="form-check-label w-100 mb-0 todo-label" for="customCheck4">
                                        <span class="todo-desc fw-normal">Give Purchase report to</span> <span
                                            class="badge rounded-pill bg-info float-end">Yesterday</span>
                                    </label>
                                </div>
                                <ul class="list-style-none assignedto">
                                    <li class="assignee"><img class="rounded-circle" width="40"
                                            src="{{ asset('assets/images/users/3.jpg') }}" alt="user"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Priyanka"></li>
                                    <li class="assignee"><img class="rounded-circle" width="40"
                                            src="{{ asset('assets/images/users/4.jpg') }}" alt="user"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Selina"></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- card -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">To Do List</h4>
                    <div class="todo-widget scrollable" style="height:450px;">
                        <ul class="list-task todo-list list-group mb-0" data-role="tasklist">
                            <li class="list-group-item todo-item" data-role="task">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck">
                                    <label class="form-check-label w-100 mb-0 todo-label" for="customCheck">
                                        <span class="todo-desc fw-normal">Lorem Ipsum is simply dummy text of the
                                            printing and typesetting industry.</span> <span
                                            class="badge rounded-pill bg-danger float-end">Today</span>
                                    </label>
                                </div>
                                <ul class="list-style-none assignedto">
                                    <li class="assignee"><img class="rounded-circle" width="40"
                                            src="{{ asset('assets/images/users/1.jpg') }}" alt="user"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Steave"></li>
                                    <li class="assignee"><img class="rounded-circle" width="40"
                                            src="{{ asset('assets/images/users/2.jpg') }}" alt="user"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Jessica"></li>
                                    <li class="assignee"><img class="rounded-circle" width="40"
                                            src="{{ asset('assets/images/users/3.jpg') }}" alt="user"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Priyanka"></li>
                                    <li class="assignee"><img class="rounded-circle" width="40"
                                            src="{{ asset('assets/images/users/4.jpg') }}" alt="user"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Selina"></li>
                                </ul>
                            </li>
                            <li class="list-group-item todo-item" data-role="task">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck1">
                                    <label class="form-check-label w-100 mb-0 todo-label" for="customCheck1">
                                        <span class="todo-desc fw-normal">Lorem Ipsum is simply dummy text of the
                                            printing</span><span
                                            class="badge rounded-pill bg-primary float-end">1 week
                                        </span>
                                    </label>
                                </div>
                                <div class="item-date"> 26 jun 2021</div>
                            </li>
                            <li class="list-group-item todo-item" data-role="task">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck2">
                                    <label class="form-check-label w-100 mb-0 todo-label" for="customCheck2">
                                        <span class="todo-desc fw-normal">Give Purchase report to</span> <span
                                            class="badge rounded-pill bg-info float-end">Yesterday</span>
                                    </label>
                                </div>
                                <ul class="list-style-none assignedto">
                                    <li class="assignee"><img class="rounded-circle" width="40"
                                            src="{{ asset('assets/images/users/3.jpg') }}" alt="user"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Priyanka"></li>
                                    <li class="assignee"><img class="rounded-circle" width="40"
                                            src="{{ asset('assets/images/users/4.jpg') }}" alt="user"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Selina"></li>
                                </ul>
                            </li>
                            <li class="list-group-item todo-item" data-role="task">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck3">
                                    <label class="form-check-label w-100 mb-0 todo-label" for="customCheck3">
                                        <span class="todo-desc fw-normal">Lorem Ipsum is simply dummy text of the
                                            printing </span> <span
                                            class="badge rounded-pill bg-warning float-end">2
                                            weeks</span>
                                    </label>
                                </div>
                                <div class="item-date"> 26 jun 2021</div>
                            </li>
                            <li class="list-group-item todo-item" data-role="task">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck4">
                                    <label class="form-check-label w-100 mb-0 todo-label" for="customCheck4">
                                        <span class="todo-desc fw-normal">Give Purchase report to</span> <span
                                            class="badge rounded-pill bg-info float-end">Yesterday</span>
                                    </label>
                                </div>
                                <ul class="list-style-none assignedto">
                                    <li class="assignee"><img class="rounded-circle" width="40"
                                            src="{{ asset('assets/images/users/3.jpg') }}" alt="user"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Priyanka"></li>
                                    <li class="assignee"><img class="rounded-circle" width="40"
                                            src="{{ asset('assets/images/users/4.jpg') }}" alt="user"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Selina"></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Recent comment and chats -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
@endsection

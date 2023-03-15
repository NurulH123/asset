<div class="card-inner position-relative card-tools-toggle pt-0">
    <div class="nk-block-between g-3">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title title">Admin List</h4>
        </div><!-- .nk-block-head-content -->
        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">
                        <li><a href="#" class="btn btn-white btn-outline-light"><em class="icon ni ni-download-cloud"></em><span>Export</span></a></li>
                        <li class="nk-block-tools-opt"><a data-bs-toggle="modal" href="#addAdmin" class="btn text-white bg-primary"><em class="icon ni ni-plus"></em><span>Add Admin</span></a></li>
                    </ul>
                </div>
            </div><!-- .toggle-wrap -->
        </div><!-- .nk-block-head-content -->
    </div><!-- .nk-block-between -->
</div>

@include('dashboard.settings.tabs.admin_list.navbar_top')

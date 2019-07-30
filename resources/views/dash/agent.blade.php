<div id="youtube">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if(session('flash_message'))
                    <div class="alert alert-primary" role="alert">
                        {{ session('flash_message') }}
                    </div>
                @endif
            </div>

            <div class="col-md-12">
                @include('dash.videos')
            </div>
        </div>
    </div>
</div>
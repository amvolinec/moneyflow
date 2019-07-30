<div id="youtube">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if(session('flash_message'))
                    <div class="alert alert-primary" role="alert">
                        {{ session('flash_message') }}
                    </div>
                @endif

                <form method="POST" action="/home" onkeydown="return event.key != 'Enter';" ref="form">
                    @method('post')
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="link">{{ __('messages.link') }}</label>
                            <div class="input-group">
                                <input class="form-control" id="link" ref="link" v-on:change="linkChanged"
                                       name="link" value="{{ old('link') }}" required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" v-on:click="linkChanged">
                                        Check
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div v-html="result"></div>
                        <button class="btn btn-success mt-3" type="submit"
                                v-bind:disabled="disabled">{{ __('messages.add') }}</button>
                    </div>
                </form>
            </div>

            <div class="col-md-12">
                @include('dash.videos')
            </div>
        </div>
    </div>
</div>
@section('page-script')
    <script src="{{ URL::to('js/custom.js') }}?v={{ env('APP_VERSION') }}" defer></script>
@endsection

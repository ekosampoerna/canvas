@extends('canvas::index')

@section('actions')
    <a href="{{ route('canvas.tag.create') }}" class="btn btn-sm btn-outline-primary my-auto mx-3">
        New tag
    </a>
@endsection

@section('content')
    <tag-list :models="{{ $data['tags'] }}" inline-template>
        <div class="container" v-cloak>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="d-flex justify-content-between">
                        <h1 class="mb-4 mt-2">Tags</h1>
                        <div class="dropdown my-auto">
                            <a href="#" id="navbarDropdown" class="nav-link px-0 text-secondary pt-0" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                               style="margin-top: -8px">
                                <i class="fas fa-search"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right py-0" aria-labelledby="dropdownMenuButton">
                                <form class="pl-2 pr-4 mr-5">
                                    <div class="form-group mb-0">
                                        <input v-model="search"
                                               type="text"
                                               class="form-control border-0 px-0 py-0"
                                               id="search"
                                               placeholder="Search..."
                                               autofocus>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    @if(count($data['tags']))
                        <div class="d-flex border-top py-3 align-items-center" v-for="tag in filteredList">
                            <div class="mr-auto">
                                <p class="mb-0 py-1">
                                    <a :href="'/canvas/tags/' + tag.id + '/edit'"
                                       class="font-weight-bold lead">@{{ tag.name }}</a>
                                </p>
                            </div>
                            <div class="ml-auto">
                                <span class="text-muted mr-3">@{{ tag.posts_count }} Post(s)</span>
                                Created @{{ moment(tag.created_at).fromNow() }}
                            </div>
                        </div>

                        <p class="mt-4" v-if="!filteredList.length">No tags matched the given search criteria.</p>
                    @else
                        <p class="mt-4">No tags were found, start by <a href="{{ route('canvas.tag.create') }}">adding a new tag</a>.</p>
                    @endif
                </div>
            </div>
        </div>
    </tag-list>
@endsection
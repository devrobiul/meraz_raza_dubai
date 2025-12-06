@extends('admin.layout.app')
@section('title')
    {{ ucfirst($type) }} Page SEO
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-dark">
                    {{ ucfirst($type) }} Page SEO & Social Meta Settings
                </div>


                <div class="card-body">
            
                    <form action="{{ route('admin.setting.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <!-- General SEO -->
                        <h5 class="mb-3">General SEO</h5>
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Robots <small class="text-muted">(Control search engine
                                        indexing)</small></label>
                                <select name="robots_{{ $type }}" class="form-select">
                                    <option value="index, follow"
                                        {{ setting('robots_' . $type) == 'index, follow' ? 'selected' : '' }}>Index, Follow</option>
                                    <option value="noindex, follow"
                                        {{ setting('robots_' . $type) == 'noindex, follow' ? 'selected' : '' }}>No Index, Follow
                                    </option>
                                    <option value="index, nofollow"
                                        {{ setting('robots_' . $type) == 'index, nofollow' ? 'selected' : '' }}>Index, No Follow
                                    </option>
                                    <option value="noindex, nofollow"
                                        {{ setting('robots_' . $type) == 'noindex, nofollow' ? 'selected' : '' }}>No Index, No
                                        Follow</option>
                                </select>
                            </div>
                        </div>

                        <!-- SEO Meta -->
                        <h5 class="mt-4 mb-3">SEO Meta</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Meta Title <small class="text-muted">(50–60 chars, primary keyword
                                        included)</small></label>
                                <input type="text" name="meta_title_{{ $type }}"
                                    value="{{ setting('meta_title_' . $type) }}" class="form-control"
                                    placeholder="Enter meta title">
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Meta Description <small class="text-muted">(150–160 chars, summary
                                        of page content)</small></label>
                                <textarea name="meta_description_{{ $type }}" class="form-control" rows="3"
                                    placeholder="Enter meta description">{{ setting('meta_description_' . $type) }}</textarea>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Meta Keywords <small class="text-muted">(Optional: 5–10 keywords
                                        separated by commas)</small></label>
                                <input type="text" name="meta_keywords_{{ $type }}"
                                    value="{{ setting('meta_keywords_' . $type) }}" class="form-control"
                                    placeholder="keyword1, keyword2, keyword3">
                            </div>
                        </div>

                        <!-- Open Graph -->
                        <h5 class="mt-4 mb-3">Open Graph (OG) <small class="text-muted">(Facebook & social preview)</small>
                        </h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">OG Title <small class="text-muted">(Title for social
                                        preview)</small></label>
                                <input type="text" name="og_title_{{ $type }}"
                                    value="{{ setting('og_title_' . $type) }}" class="form-control" placeholder="OG title">
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">OG Description <small class="text-muted">(Summary for social
                                        preview)</small></label>
                                <textarea name="og_description_{{ $type }}" class="form-control" rows="3" placeholder="OG description">{{ setting('og_description_' . $type) }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">OG Image <small class="text-muted">(Recommended
                                        1200x630px)</small></label>
                                <input type="file" name="og_image" class="form-control">
                                @if (setting('og_image'))
                                    <img src="{{ asset(setting('og_image')) }}" alt="OG Image" class="img-thumbnail mt-2"
                                        width="150">
                                    <input type="text" name="og_image_alt_{{ $type }}"
                                        value="{{ setting('og_image_alt_' . $type) }}" class="form-control mt-2"
                                        placeholder="OG Image Alt Text">
                                @endif
                            </div>
                        </div>

                        <!-- Twitter Meta -->
                        <h5 class="mt-4 mb-3">Twitter Meta <small class="text-muted">(Preview for Twitter card)</small></h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Twitter Title <small class="text-muted">(Title for Twitter
                                        card)</small></label>
                                <input type="text" name="twitter_title_{{ $type }}"
                                    value="{{ setting('twitter_title_' . $type) }}" class="form-control"
                                    placeholder="Twitter title">
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Twitter Description <small class="text-muted">(Summary for Twitter
                                        card)</small></label>
                                <textarea name="twitter_description_{{ $type }}" class="form-control" rows="3"
                                    placeholder="Twitter description">{{ setting('twitter_description_' . $type) }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Twitter Image <small class="text-muted">(Recommended
                                        1200x630px)</small></label>
                                <input type="file" name="twitter_image_{{ $type }}" class="form-control">
                                @if (setting('twitter_image_' . $type))
                                    <img src="{{ asset(setting('twitter_image_' . $type)) }}" alt="Twitter Image"
                                        class="img-thumbnail mt-2" width="150">
                                    <input type="text" name="twitter_image_alt_{{ $type }}"
                                        value="{{ setting('twitter_image_alt_' . $type) }}" class="form-control mt-2"
                                        placeholder="Twitter Image Alt Text">
                                @endif
                            </div>
                        </div>

                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-primary">
                                Save SEO Settings
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

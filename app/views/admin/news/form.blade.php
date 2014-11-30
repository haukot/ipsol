{{ Former::string('title')->required() }}
{{ Former::string('slug') }}
@include('components.image_upload_input', ["object" => $news, "image" => 'preview'])
@include('components.image_upload_input', ["object" => $news, "image" => 'big_preview'])
{{ Former::textarea('content')->addClass('ckeditor')->required() }}
{{ Former::string('meta_title') }}
{{ Former::string('meta_description') }}
{{ Former::string('meta_keywords') }}


{{ Former::actions()
            ->large_primary_submit(Lang::get('validation.attributes.submit')) }}
